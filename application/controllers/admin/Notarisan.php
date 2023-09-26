<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Notarisan extends CI_Controller {

	private $table1 = 'notarisan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/notarisan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tgl nota","nama nota","hub nota","notelp","khusus nota", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/notarisan/view', $data);
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
                        'row' => ["id_biodata","tgl_nota","nama_nota","hub_nota","notelp","khusus_nota"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_notarisan',
                        'data' => ["id_biodata","tgl_nota","nama_nota","hub_nota","notelp","khusus_nota"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_notarisan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tgl_nota", "3"=>"nama_nota", "4"=>"hub_nota", "5"=>"notelp", "6"=>"khusus_nota"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_notarisan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/notarisan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_notarisan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/notarisan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tgl_nota = post("tgl_nota");
$nama_nota = post("nama_nota");
$hub_nota = post("hub_nota");
$notelp = post("notelp");
$khusus_nota = post("khusus_nota");

        

        $simpan = $this->db->query("
            INSERT INTO notarisan
            (id_biodata,tgl_nota,nama_nota,hub_nota,notelp,khusus_nota) VALUES ('$id_biodata','$tgl_nota','$nama_nota','$hub_nota','$notelp','$khusus_nota')
        ");
    

        if($simpan){
            redirect('admin/notarisan');
        }
    }

    public function update(){
          $key = post('id_notarisan'); $id_biodata = post("id_biodata");
$tgl_nota = post("tgl_nota");
$nama_nota = post("nama_nota");
$hub_nota = post("hub_nota");
$notelp = post("notelp");
$khusus_nota = post("khusus_nota");

        $simpan = $this->db->query("
            UPDATE notarisan SET  id_biodata = '$id_biodata', tgl_nota = '$tgl_nota', nama_nota = '$nama_nota', hub_nota = '$hub_nota', notelp = '$notelp', khusus_nota = '$khusus_nota' WHERE id_notarisan = '$key'
            ");
    

        if($simpan){
            redirect('admin/notarisan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-notarisan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tgl nota","nama nota","hub nota","notelp","khusus nota", "action"];

        $calldata = ["id_biodata","tgl_nota","nama_nota","hub_nota","notelp","khusus_nota"];

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
