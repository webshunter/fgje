<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Legalitas extends CI_Controller {

	private $table1 = 'legalitas';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/legalitas/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tgl legal","nama legal","hub legal","notelp","khusus legal", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/legalitas/view', $data);
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
                        'row' => ["id_biodata","tgl_legal","nama_legal","hub_legal","notelp","khusus_legal"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_legalitas',
                        'data' => ["id_biodata","tgl_legal","nama_legal","hub_legal","notelp","khusus_legal"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_legalitas', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tgl_legal", "3"=>"nama_legal", "4"=>"hub_legal", "5"=>"notelp", "6"=>"khusus_legal"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_legalitas = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/legalitas/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_legalitas = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/legalitas/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tgl_legal = post("tgl_legal");
$nama_legal = post("nama_legal");
$hub_legal = post("hub_legal");
$notelp = post("notelp");
$khusus_legal = post("khusus_legal");

        

        $simpan = $this->db->query("
            INSERT INTO legalitas
            (id_biodata,tgl_legal,nama_legal,hub_legal,notelp,khusus_legal) VALUES ('$id_biodata','$tgl_legal','$nama_legal','$hub_legal','$notelp','$khusus_legal')
        ");
    

        if($simpan){
            redirect('admin/legalitas');
        }
    }

    public function update(){
          $key = post('id_legalitas'); $id_biodata = post("id_biodata");
$tgl_legal = post("tgl_legal");
$nama_legal = post("nama_legal");
$hub_legal = post("hub_legal");
$notelp = post("notelp");
$khusus_legal = post("khusus_legal");

        $simpan = $this->db->query("
            UPDATE legalitas SET  id_biodata = '$id_biodata', tgl_legal = '$tgl_legal', nama_legal = '$nama_legal', hub_legal = '$hub_legal', notelp = '$notelp', khusus_legal = '$khusus_legal' WHERE id_legalitas = '$key'
            ");
    

        if($simpan){
            redirect('admin/legalitas');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-legalitas.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tgl legal","nama legal","hub legal","notelp","khusus legal", "action"];

        $calldata = ["id_biodata","tgl_legal","nama_legal","hub_legal","notelp","khusus_legal"];

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
