<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin_laporan_formulir_wintrust_detail extends CI_Controller {

	private $table1 = 'admin_laporan_formulir_wintrust_detail';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/admin_laporan_formulir_wintrust_detail/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","idbio","agen id","penerima id","ntd","formulir wintrust id","date created", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/admin_laporan_formulir_wintrust_detail/view', $data);
        $this->load->view('templateadmin/footer');
	}

	public function table_show($action = 'show', $keyword = '')
	{
		if ($action == "show") {
        
            if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ''; endif;

            $this->Datatable_gugus->datatable(
                [
                    "table" => $this->table1,
                    "select" => [
						"*"
					],
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["idbio","agen_id","penerima_id","ntd","formulir_wintrust_id","date_created"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["idbio","agen_id","penerima_id","ntd","formulir_wintrust_id","date_created"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"idbio", "2"=>"agen_id", "3"=>"penerima_id", "4"=>"ntd", "5"=>"formulir_wintrust_id", "6"=>"date_created"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/admin_laporan_formulir_wintrust_detail/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/admin_laporan_formulir_wintrust_detail/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $idbio = post("idbio");
$agen_id = post("agen_id");
$penerima_id = post("penerima_id");
$ntd = post("ntd");
$formulir_wintrust_id = post("formulir_wintrust_id");
$date_created = post("date_created");

        

        $simpan = $this->db->query("
            INSERT INTO admin_laporan_formulir_wintrust_detail
            (idbio,agen_id,penerima_id,ntd,formulir_wintrust_id,date_created) VALUES ('$idbio','$agen_id','$penerima_id','$ntd','$formulir_wintrust_id','$date_created')
        ");
    

        if($simpan){
            redirect('admin/admin_laporan_formulir_wintrust_detail');
        }
    }

    public function update(){
          $key = post('id'); $idbio = post("idbio");
$agen_id = post("agen_id");
$penerima_id = post("penerima_id");
$ntd = post("ntd");
$formulir_wintrust_id = post("formulir_wintrust_id");
$date_created = post("date_created");

        $simpan = $this->db->query("
            UPDATE admin_laporan_formulir_wintrust_detail SET  idbio = '$idbio', agen_id = '$agen_id', penerima_id = '$penerima_id', ntd = '$ntd', formulir_wintrust_id = '$formulir_wintrust_id', date_created = '$date_created' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/admin_laporan_formulir_wintrust_detail');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-admin_laporan_formulir_wintrust_detail.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","idbio","agen id","penerima id","ntd","formulir wintrust id","date created", "action"];

        $calldata = ["idbio","agen_id","penerima_id","ntd","formulir_wintrust_id","date_created"];

        for ($i = 0, $l = sizeof($headers); $i < $l; $i++) {
            $sheet->setCellValueByColumnAndRow($i + 1, 1, $headers[$i]);
        }
        
        $qr = $this->db->query("SELECT * FROM $this->table1")->result();

        foreach($qr as $i => $vv){
            $j = 1;
            $sheet->setCellValueByColumnAndRow(0 + 1, ($i + 1 + 1), $i + 1);
            foreach ($calldata as $k => $v) { // column $j
                $sheet->setCellValueByColumnAndRow($j + 1, ($i + 1 + 1), $vv->$v);
                $j++;
            }
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
        $writer->save('php://output');

    }


}
