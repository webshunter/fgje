<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dataagen_penerima_dana extends CI_Controller {

	private $table1 = 'dataagen_penerima_dana';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/dataagen_penerima_dana/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","agen id","penerima nama id","date created","softDelete", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/dataagen_penerima_dana/view', $data);
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
                        'row' => ["agen_id","penerima_nama_id","date_created","softDelete"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["agen_id","penerima_nama_id","date_created","softDelete"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"agen_id", "2"=>"penerima_nama_id", "3"=>"date_created", "4"=>"softDelete"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/dataagen_penerima_dana/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/dataagen_penerima_dana/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $agen_id = post("agen_id");
$penerima_nama_id = post("penerima_nama_id");
$date_created = post("date_created");
$softDelete = post("softDelete");

        

        $simpan = $this->db->query("
            INSERT INTO dataagen_penerima_dana
            (agen_id,penerima_nama_id,date_created,softDelete) VALUES ('$agen_id','$penerima_nama_id','$date_created','$softDelete')
        ");
    

        if($simpan){
            redirect('admin/dataagen_penerima_dana');
        }
    }

    public function update(){
          $key = post('id'); $agen_id = post("agen_id");
$penerima_nama_id = post("penerima_nama_id");
$date_created = post("date_created");
$softDelete = post("softDelete");

        $simpan = $this->db->query("
            UPDATE dataagen_penerima_dana SET  agen_id = '$agen_id', penerima_nama_id = '$penerima_nama_id', date_created = '$date_created', softDelete = '$softDelete' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/dataagen_penerima_dana');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-dataagen_penerima_dana.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","agen id","penerima nama id","date created","softDelete", "action"];

        $calldata = ["agen_id","penerima_nama_id","date_created","softDelete"];

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
