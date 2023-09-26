<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Alumni extends CI_Controller {

	private $table1 = 'alumni';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/alumni/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama","alamat","ttl","id angkatan","no hp","foto","id pilihan","id tempat","username","password","status","status ol", "action"]);
        $this->Createtable->order_set('0, 12');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/alumni/view', $data);
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
                        'row' => ["nama","alamat","ttl","id_angkatan","no_hp","foto","id_pilihan","id_tempat","username","password","status","status_ol"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_alumni',
                        'data' => ["nama","alamat","ttl","id_angkatan","no_hp","foto","id_pilihan","id_tempat","username","password","status","status_ol"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_alumni', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama", "2"=>"alamat", "3"=>"ttl", "4"=>"id_angkatan", "5"=>"no_hp", "6"=>"foto", "7"=>"id_pilihan", "8"=>"id_tempat", "9"=>"username", "10"=>"password", "11"=>"status", "12"=>"status_ol"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_alumni = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/alumni/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_alumni = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/alumni/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nama = post("nama");
$alamat = post("alamat");
$ttl = post("ttl");
$id_angkatan = post("id_angkatan");
$no_hp = post("no_hp");
$foto = post("foto");
$id_pilihan = post("id_pilihan");
$id_tempat = post("id_tempat");
$username = post("username");
$password = post("password");
$status = post("status");
$status_ol = post("status_ol");

        

        $simpan = $this->db->query("
            INSERT INTO alumni
            (nama,alamat,ttl,id_angkatan,no_hp,foto,id_pilihan,id_tempat,username,password,status,status_ol) VALUES ('$nama','$alamat','$ttl','$id_angkatan','$no_hp','$foto','$id_pilihan','$id_tempat','$username','$password','$status','$status_ol')
        ");
    

        if($simpan){
            redirect('admin/alumni');
        }
    }

    public function update(){
          $key = post('id_alumni'); $nama = post("nama");
$alamat = post("alamat");
$ttl = post("ttl");
$id_angkatan = post("id_angkatan");
$no_hp = post("no_hp");
$foto = post("foto");
$id_pilihan = post("id_pilihan");
$id_tempat = post("id_tempat");
$username = post("username");
$password = post("password");
$status = post("status");
$status_ol = post("status_ol");

        $simpan = $this->db->query("
            UPDATE alumni SET  nama = '$nama', alamat = '$alamat', ttl = '$ttl', id_angkatan = '$id_angkatan', no_hp = '$no_hp', foto = '$foto', id_pilihan = '$id_pilihan', id_tempat = '$id_tempat', username = '$username', password = '$password', status = '$status', status_ol = '$status_ol' WHERE id_alumni = '$key'
            ");
    

        if($simpan){
            redirect('admin/alumni');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-alumni.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nama","alamat","ttl","id angkatan","no hp","foto","id pilihan","id tempat","username","password","status","status ol", "action"];

        $calldata = ["nama","alamat","ttl","id_angkatan","no_hp","foto","id_pilihan","id_tempat","username","password","status","status_ol"];

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
