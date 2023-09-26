<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Ambilberkas extends CI_Controller {

	private $table1 = 'ambilberkas';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/ambilberkas/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tgl ambil dok","nama ambil dok","hub ambil dok","tel ambil dok","nama serah dok","dokdiserahkan","tanggal input", "action"]);
        $this->Createtable->order_set('0, 8');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/ambilberkas/view', $data);
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
                        'row' => ["id_biodata","tgl_ambil_dok","nama_ambil_dok","hub_ambil_dok","tel_ambil_dok","nama_serah_dok","dokdiserahkan","tanggal_input"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_ambilberkas',
                        'data' => ["id_biodata","tgl_ambil_dok","nama_ambil_dok","hub_ambil_dok","tel_ambil_dok","nama_serah_dok","dokdiserahkan","tanggal_input"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_ambilberkas', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tgl_ambil_dok", "3"=>"nama_ambil_dok", "4"=>"hub_ambil_dok", "5"=>"tel_ambil_dok", "6"=>"nama_serah_dok", "7"=>"dokdiserahkan", "8"=>"tanggal_input"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_ambilberkas = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/ambilberkas/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_ambilberkas = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/ambilberkas/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tgl_ambil_dok = post("tgl_ambil_dok");
$nama_ambil_dok = post("nama_ambil_dok");
$hub_ambil_dok = post("hub_ambil_dok");
$tel_ambil_dok = post("tel_ambil_dok");
$nama_serah_dok = post("nama_serah_dok");
$dokdiserahkan = post("dokdiserahkan");
$tanggal_input = post("tanggal_input");

        

        $simpan = $this->db->query("
            INSERT INTO ambilberkas
            (id_biodata,tgl_ambil_dok,nama_ambil_dok,hub_ambil_dok,tel_ambil_dok,nama_serah_dok,dokdiserahkan,tanggal_input) VALUES ('$id_biodata','$tgl_ambil_dok','$nama_ambil_dok','$hub_ambil_dok','$tel_ambil_dok','$nama_serah_dok','$dokdiserahkan','$tanggal_input')
        ");
    

        if($simpan){
            redirect('admin/ambilberkas');
        }
    }

    public function update(){
          $key = post('id_ambilberkas'); $id_biodata = post("id_biodata");
$tgl_ambil_dok = post("tgl_ambil_dok");
$nama_ambil_dok = post("nama_ambil_dok");
$hub_ambil_dok = post("hub_ambil_dok");
$tel_ambil_dok = post("tel_ambil_dok");
$nama_serah_dok = post("nama_serah_dok");
$dokdiserahkan = post("dokdiserahkan");
$tanggal_input = post("tanggal_input");

        $simpan = $this->db->query("
            UPDATE ambilberkas SET  id_biodata = '$id_biodata', tgl_ambil_dok = '$tgl_ambil_dok', nama_ambil_dok = '$nama_ambil_dok', hub_ambil_dok = '$hub_ambil_dok', tel_ambil_dok = '$tel_ambil_dok', nama_serah_dok = '$nama_serah_dok', dokdiserahkan = '$dokdiserahkan', tanggal_input = '$tanggal_input' WHERE id_ambilberkas = '$key'
            ");
    

        if($simpan){
            redirect('admin/ambilberkas');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-ambilberkas.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tgl ambil dok","nama ambil dok","hub ambil dok","tel ambil dok","nama serah dok","dokdiserahkan","tanggal input", "action"];

        $calldata = ["id_biodata","tgl_ambil_dok","nama_ambil_dok","hub_ambil_dok","tel_ambil_dok","nama_serah_dok","dokdiserahkan","tanggal_input"];

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
