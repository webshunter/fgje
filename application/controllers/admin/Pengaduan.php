<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pengaduan extends CI_Controller {

	private $table1 = 'pengaduan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/pengaduan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","judul","isi","jenis peng","tanggal","id user","nm user", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pengaduan/view', $data);
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
                        'row' => ["judul","isi","jenis_peng","tanggal","id_user","nm_user"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_peng',
                        'data' => ["judul","isi","jenis_peng","tanggal","id_user","nm_user"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_peng', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"judul", "2"=>"isi", "3"=>"jenis_peng", "4"=>"tanggal", "5"=>"id_user", "6"=>"nm_user"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_peng = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/pengaduan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_peng = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pengaduan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $judul = post("judul");
$isi = post("isi");
$jenis_peng = post("jenis_peng");
$tanggal = post("tanggal");
$id_user = post("id_user");
$nm_user = post("nm_user");

        

        $simpan = $this->db->query("
            INSERT INTO pengaduan
            (judul,isi,jenis_peng,tanggal,id_user,nm_user) VALUES ('$judul','$isi','$jenis_peng','$tanggal','$id_user','$nm_user')
        ");
    

        if($simpan){
            redirect('admin/pengaduan');
        }
    }

    public function update(){
          $key = post('id_peng'); $judul = post("judul");
$isi = post("isi");
$jenis_peng = post("jenis_peng");
$tanggal = post("tanggal");
$id_user = post("id_user");
$nm_user = post("nm_user");

        $simpan = $this->db->query("
            UPDATE pengaduan SET  judul = '$judul', isi = '$isi', jenis_peng = '$jenis_peng', tanggal = '$tanggal', id_user = '$id_user', nm_user = '$nm_user' WHERE id_peng = '$key'
            ");
    

        if($simpan){
            redirect('admin/pengaduan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-pengaduan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","judul","isi","jenis peng","tanggal","id user","nm user", "action"];

        $calldata = ["judul","isi","jenis_peng","tanggal","id_user","nm_user"];

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
