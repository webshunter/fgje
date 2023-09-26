<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datagroup extends CI_Controller {

	private $table1 = 'datagroup';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datagroup/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode group","nama","hp","email","alamat","status","username","password","namamandarin","alamatmandarin","direktur","notelp","nofax","tanggungnama","tanggungline","komnama","komline","komskype","komhp","agenbergabung","keterangan", "action"]);
        $this->Createtable->order_set('0, 21');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datagroup/view', $data);
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
                        'row' => ["kode_group","nama","hp","email","alamat","status","username","password","namamandarin","alamatmandarin","direktur","notelp","nofax","tanggungnama","tanggungline","komnama","komline","komskype","komhp","agenbergabung","keterangan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_group',
                        'data' => ["kode_group","nama","hp","email","alamat","status","username","password","namamandarin","alamatmandarin","direktur","notelp","nofax","tanggungnama","tanggungline","komnama","komline","komskype","komhp","agenbergabung","keterangan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_group', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_group", "2"=>"nama", "3"=>"hp", "4"=>"email", "5"=>"alamat", "6"=>"status", "7"=>"username", "8"=>"password", "9"=>"namamandarin", "10"=>"alamatmandarin", "11"=>"direktur", "12"=>"notelp", "13"=>"nofax", "14"=>"tanggungnama", "15"=>"tanggungline", "16"=>"komnama", "17"=>"komline", "18"=>"komskype", "19"=>"komhp", "20"=>"agenbergabung", "21"=>"keterangan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_group = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datagroup/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_group = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datagroup/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_group = post("kode_group");
$nama = post("nama");
$hp = post("hp");
$email = post("email");
$alamat = post("alamat");
$status = post("status");
$username = post("username");
$password = post("password");
$namamandarin = post("namamandarin");
$alamatmandarin = post("alamatmandarin");
$direktur = post("direktur");
$notelp = post("notelp");
$nofax = post("nofax");
$tanggungnama = post("tanggungnama");
$tanggungline = post("tanggungline");
$komnama = post("komnama");
$komline = post("komline");
$komskype = post("komskype");
$komhp = post("komhp");
$agenbergabung = post("agenbergabung");
$keterangan = post("keterangan");

        

        $simpan = $this->db->query("
            INSERT INTO datagroup
            (kode_group,nama,hp,email,alamat,status,username,password,namamandarin,alamatmandarin,direktur,notelp,nofax,tanggungnama,tanggungline,komnama,komline,komskype,komhp,agenbergabung,keterangan) VALUES ('$kode_group','$nama','$hp','$email','$alamat','$status','$username','$password','$namamandarin','$alamatmandarin','$direktur','$notelp','$nofax','$tanggungnama','$tanggungline','$komnama','$komline','$komskype','$komhp','$agenbergabung','$keterangan')
        ");
    

        if($simpan){
            redirect('admin/datagroup');
        }
    }

    public function update(){
          $key = post('id_group'); $kode_group = post("kode_group");
$nama = post("nama");
$hp = post("hp");
$email = post("email");
$alamat = post("alamat");
$status = post("status");
$username = post("username");
$password = post("password");
$namamandarin = post("namamandarin");
$alamatmandarin = post("alamatmandarin");
$direktur = post("direktur");
$notelp = post("notelp");
$nofax = post("nofax");
$tanggungnama = post("tanggungnama");
$tanggungline = post("tanggungline");
$komnama = post("komnama");
$komline = post("komline");
$komskype = post("komskype");
$komhp = post("komhp");
$agenbergabung = post("agenbergabung");
$keterangan = post("keterangan");

        $simpan = $this->db->query("
            UPDATE datagroup SET  kode_group = '$kode_group', nama = '$nama', hp = '$hp', email = '$email', alamat = '$alamat', status = '$status', username = '$username', password = '$password', namamandarin = '$namamandarin', alamatmandarin = '$alamatmandarin', direktur = '$direktur', notelp = '$notelp', nofax = '$nofax', tanggungnama = '$tanggungnama', tanggungline = '$tanggungline', komnama = '$komnama', komline = '$komline', komskype = '$komskype', komhp = '$komhp', agenbergabung = '$agenbergabung', keterangan = '$keterangan' WHERE id_group = '$key'
            ");
    

        if($simpan){
            redirect('admin/datagroup');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datagroup.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode group","nama","hp","email","alamat","status","username","password","namamandarin","alamatmandarin","direktur","notelp","nofax","tanggungnama","tanggungline","komnama","komline","komskype","komhp","agenbergabung","keterangan", "action"];

        $calldata = ["kode_group","nama","hp","email","alamat","status","username","password","namamandarin","alamatmandarin","direktur","notelp","nofax","tanggungnama","tanggungline","komnama","komline","komskype","komhp","agenbergabung","keterangan"];

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
