<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pasporlama extends CI_Controller {

	private $table1 = 'pasporlama';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/pasporlama/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","keterangan","nopaspor","office","tglterbit","berlaku","tglpengajuan","statuspengajuan","tglfoto","statusfoto","tglterima","statusterima","sampai", "action"]);
        $this->Createtable->order_set('0, 13');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pasporlama/view', $data);
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
                        'row' => ["id_biodata","keterangan","nopaspor","office","tglterbit","berlaku","tglpengajuan","statuspengajuan","tglfoto","statusfoto","tglterima","statusterima","sampai"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_paspor',
                        'data' => ["id_biodata","keterangan","nopaspor","office","tglterbit","berlaku","tglpengajuan","statuspengajuan","tglfoto","statusfoto","tglterima","statusterima","sampai"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_paspor', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"keterangan", "3"=>"nopaspor", "4"=>"office", "5"=>"tglterbit", "6"=>"berlaku", "7"=>"tglpengajuan", "8"=>"statuspengajuan", "9"=>"tglfoto", "10"=>"statusfoto", "11"=>"tglterima", "12"=>"statusterima", "13"=>"sampai"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_paspor = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/pasporlama/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_paspor = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pasporlama/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$keterangan = post("keterangan");
$nopaspor = post("nopaspor");
$office = post("office");
$tglterbit = post("tglterbit");
$berlaku = post("berlaku");
$tglpengajuan = post("tglpengajuan");
$statuspengajuan = post("statuspengajuan");
$tglfoto = post("tglfoto");
$statusfoto = post("statusfoto");
$tglterima = post("tglterima");
$statusterima = post("statusterima");
$sampai = post("sampai");

        

        $simpan = $this->db->query("
            INSERT INTO pasporlama
            (id_biodata,keterangan,nopaspor,office,tglterbit,berlaku,tglpengajuan,statuspengajuan,tglfoto,statusfoto,tglterima,statusterima,sampai) VALUES ('$id_biodata','$keterangan','$nopaspor','$office','$tglterbit','$berlaku','$tglpengajuan','$statuspengajuan','$tglfoto','$statusfoto','$tglterima','$statusterima','$sampai')
        ");
    

        if($simpan){
            redirect('admin/pasporlama');
        }
    }

    public function update(){
          $key = post('id_paspor'); $id_biodata = post("id_biodata");
$keterangan = post("keterangan");
$nopaspor = post("nopaspor");
$office = post("office");
$tglterbit = post("tglterbit");
$berlaku = post("berlaku");
$tglpengajuan = post("tglpengajuan");
$statuspengajuan = post("statuspengajuan");
$tglfoto = post("tglfoto");
$statusfoto = post("statusfoto");
$tglterima = post("tglterima");
$statusterima = post("statusterima");
$sampai = post("sampai");

        $simpan = $this->db->query("
            UPDATE pasporlama SET  id_biodata = '$id_biodata', keterangan = '$keterangan', nopaspor = '$nopaspor', office = '$office', tglterbit = '$tglterbit', berlaku = '$berlaku', tglpengajuan = '$tglpengajuan', statuspengajuan = '$statuspengajuan', tglfoto = '$tglfoto', statusfoto = '$statusfoto', tglterima = '$tglterima', statusterima = '$statusterima', sampai = '$sampai' WHERE id_paspor = '$key'
            ");
    

        if($simpan){
            redirect('admin/pasporlama');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-pasporlama.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","keterangan","nopaspor","office","tglterbit","berlaku","tglpengajuan","statuspengajuan","tglfoto","statusfoto","tglterima","statusterima","sampai", "action"];

        $calldata = ["id_biodata","keterangan","nopaspor","office","tglterbit","berlaku","tglpengajuan","statuspengajuan","tglfoto","statusfoto","tglterima","statusterima","sampai"];

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
