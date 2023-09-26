<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dataagen_promosi extends CI_Controller {

	private $table1 = 'dataagen_promosi';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/dataagen_promosi/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","tgl transfer doku","agen id","bank id","data","date created","softDelete", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/dataagen_promosi/view', $data);
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
                        'row' => ["tgl_transfer_doku","agen_id","bank_id","data","date_created","softDelete"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["tgl_transfer_doku","agen_id","bank_id","data","date_created","softDelete"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tgl_transfer_doku", "2"=>"agen_id", "3"=>"bank_id", "4"=>"data", "5"=>"date_created", "6"=>"softDelete"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/dataagen_promosi/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/dataagen_promosi/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $tgl_transfer_doku = post("tgl_transfer_doku");
$agen_id = post("agen_id");
$bank_id = post("bank_id");
$data = post("data");
$date_created = post("date_created");
$softDelete = post("softDelete");

        

        $simpan = $this->db->query("
            INSERT INTO dataagen_promosi
            (tgl_transfer_doku,agen_id,bank_id,data,date_created,softDelete) VALUES ('$tgl_transfer_doku','$agen_id','$bank_id','$data','$date_created','$softDelete')
        ");
    

        if($simpan){
            redirect('admin/dataagen_promosi');
        }
    }

    public function update(){
          $key = post('id'); $tgl_transfer_doku = post("tgl_transfer_doku");
$agen_id = post("agen_id");
$bank_id = post("bank_id");
$data = post("data");
$date_created = post("date_created");
$softDelete = post("softDelete");

        $simpan = $this->db->query("
            UPDATE dataagen_promosi SET  tgl_transfer_doku = '$tgl_transfer_doku', agen_id = '$agen_id', bank_id = '$bank_id', data = '$data', date_created = '$date_created', softDelete = '$softDelete' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/dataagen_promosi');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-dataagen_promosi.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","tgl transfer doku","agen id","bank id","data","date created","softDelete", "action"];

        $calldata = ["tgl_transfer_doku","agen_id","bank_id","data","date_created","softDelete"];

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
