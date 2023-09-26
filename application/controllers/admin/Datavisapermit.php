<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datavisapermit extends CI_Controller {

	private $table1 = 'datavisapermit';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datavisapermit/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id group","id agen","id majikan","id suhan","no visapermit","tglterbitvs","tglexpvs","tglterimavs","tglsimpanvs","tglbawavs","tglmintavs","quotavs","filevisapermit","tglexpext", "action"]);
        $this->Createtable->order_set('0, 14');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datavisapermit/view', $data);
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
                        'row' => ["id_group","id_agen","id_majikan","id_suhan","no_visapermit","tglterbitvs","tglexpvs","tglterimavs","tglsimpanvs","tglbawavs","tglmintavs","quotavs","filevisapermit","tglexpext"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_visapermit',
                        'data' => ["id_group","id_agen","id_majikan","id_suhan","no_visapermit","tglterbitvs","tglexpvs","tglterimavs","tglsimpanvs","tglbawavs","tglmintavs","quotavs","filevisapermit","tglexpext"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_visapermit', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_group", "2"=>"id_agen", "3"=>"id_majikan", "4"=>"id_suhan", "5"=>"no_visapermit", "6"=>"tglterbitvs", "7"=>"tglexpvs", "8"=>"tglterimavs", "9"=>"tglsimpanvs", "10"=>"tglbawavs", "11"=>"tglmintavs", "12"=>"quotavs", "13"=>"filevisapermit", "14"=>"tglexpext"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_visapermit = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datavisapermit/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_visapermit = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datavisapermit/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_group = post("id_group");
$id_agen = post("id_agen");
$id_majikan = post("id_majikan");
$id_suhan = post("id_suhan");
$no_visapermit = post("no_visapermit");
$tglterbitvs = post("tglterbitvs");
$tglexpvs = post("tglexpvs");
$tglterimavs = post("tglterimavs");
$tglsimpanvs = post("tglsimpanvs");
$tglbawavs = post("tglbawavs");
$tglmintavs = post("tglmintavs");
$quotavs = post("quotavs");
$filevisapermit = post("filevisapermit");
$tglexpext = post("tglexpext");

        

        $simpan = $this->db->query("
            INSERT INTO datavisapermit
            (id_group,id_agen,id_majikan,id_suhan,no_visapermit,tglterbitvs,tglexpvs,tglterimavs,tglsimpanvs,tglbawavs,tglmintavs,quotavs,filevisapermit,tglexpext) VALUES ('$id_group','$id_agen','$id_majikan','$id_suhan','$no_visapermit','$tglterbitvs','$tglexpvs','$tglterimavs','$tglsimpanvs','$tglbawavs','$tglmintavs','$quotavs','$filevisapermit','$tglexpext')
        ");
    

        if($simpan){
            redirect('admin/datavisapermit');
        }
    }

    public function update(){
          $key = post('id_visapermit'); $id_group = post("id_group");
$id_agen = post("id_agen");
$id_majikan = post("id_majikan");
$id_suhan = post("id_suhan");
$no_visapermit = post("no_visapermit");
$tglterbitvs = post("tglterbitvs");
$tglexpvs = post("tglexpvs");
$tglterimavs = post("tglterimavs");
$tglsimpanvs = post("tglsimpanvs");
$tglbawavs = post("tglbawavs");
$tglmintavs = post("tglmintavs");
$quotavs = post("quotavs");
$filevisapermit = post("filevisapermit");
$tglexpext = post("tglexpext");

        $simpan = $this->db->query("
            UPDATE datavisapermit SET  id_group = '$id_group', id_agen = '$id_agen', id_majikan = '$id_majikan', id_suhan = '$id_suhan', no_visapermit = '$no_visapermit', tglterbitvs = '$tglterbitvs', tglexpvs = '$tglexpvs', tglterimavs = '$tglterimavs', tglsimpanvs = '$tglsimpanvs', tglbawavs = '$tglbawavs', tglmintavs = '$tglmintavs', quotavs = '$quotavs', filevisapermit = '$filevisapermit', tglexpext = '$tglexpext' WHERE id_visapermit = '$key'
            ");
    

        if($simpan){
            redirect('admin/datavisapermit');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datavisapermit.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id group","id agen","id majikan","id suhan","no visapermit","tglterbitvs","tglexpvs","tglterimavs","tglsimpanvs","tglbawavs","tglmintavs","quotavs","filevisapermit","tglexpext", "action"];

        $calldata = ["id_group","id_agen","id_majikan","id_suhan","no_visapermit","tglterbitvs","tglexpvs","tglterimavs","tglsimpanvs","tglbawavs","tglmintavs","quotavs","filevisapermit","tglexpext"];

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
