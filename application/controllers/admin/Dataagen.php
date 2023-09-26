<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dataagen extends CI_Controller {

	private $table1 = 'dataagen';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/dataagen/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode agen","kode group","nama","hp","email","alamat","status","username","password","namamandarin","alamatmandarin","notel","nofax","direktur","direktur2","nosiup","berlaku","selesai","jenisagre","jenisagre2","berlaku2","selesai2","jenisagre3","berlaku3","selesai3","noagree","noagree2","noagree3","tgl terimaagree","tgl terimaagree2","tgl terimaagree3","keterangan","komnama","komline","komskype","komhp","jabatan man","jabatan indo","statusnonaktif", "action"]);
        $this->Createtable->order_set('0, 39');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/dataagen/view', $data);
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
                        'row' => ["kode_agen","kode_group","nama","hp","email","alamat","status","username","password","namamandarin","alamatmandarin","notel","nofax","direktur","direktur2","nosiup","berlaku","selesai","jenisagre","jenisagre2","berlaku2","selesai2","jenisagre3","berlaku3","selesai3","noagree","noagree2","noagree3","tgl_terimaagree","tgl_terimaagree2","tgl_terimaagree3","keterangan","komnama","komline","komskype","komhp","jabatan_man","jabatan_indo","statusnonaktif"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_agen',
                        'data' => ["kode_agen","kode_group","nama","hp","email","alamat","status","username","password","namamandarin","alamatmandarin","notel","nofax","direktur","direktur2","nosiup","berlaku","selesai","jenisagre","jenisagre2","berlaku2","selesai2","jenisagre3","berlaku3","selesai3","noagree","noagree2","noagree3","tgl_terimaagree","tgl_terimaagree2","tgl_terimaagree3","keterangan","komnama","komline","komskype","komhp","jabatan_man","jabatan_indo","statusnonaktif"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_agen', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_agen", "2"=>"kode_group", "3"=>"nama", "4"=>"hp", "5"=>"email", "6"=>"alamat", "7"=>"status", "8"=>"username", "9"=>"password", "10"=>"namamandarin", "11"=>"alamatmandarin", "12"=>"notel", "13"=>"nofax", "14"=>"direktur", "15"=>"direktur2", "16"=>"nosiup", "17"=>"berlaku", "18"=>"selesai", "19"=>"jenisagre", "20"=>"jenisagre2", "21"=>"berlaku2", "22"=>"selesai2", "23"=>"jenisagre3", "24"=>"berlaku3", "25"=>"selesai3", "26"=>"noagree", "27"=>"noagree2", "28"=>"noagree3", "29"=>"tgl_terimaagree", "30"=>"tgl_terimaagree2", "31"=>"tgl_terimaagree3", "32"=>"keterangan", "33"=>"komnama", "34"=>"komline", "35"=>"komskype", "36"=>"komhp", "37"=>"jabatan_man", "38"=>"jabatan_indo", "39"=>"statusnonaktif"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_agen = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/dataagen/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_agen = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/dataagen/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_agen = post("kode_agen");
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
$notel = post("notel");
$nofax = post("nofax");
$direktur = post("direktur");
$direktur2 = post("direktur2");
$nosiup = post("nosiup");
$berlaku = post("berlaku");
$selesai = post("selesai");
$jenisagre = post("jenisagre");
$jenisagre2 = post("jenisagre2");
$berlaku2 = post("berlaku2");
$selesai2 = post("selesai2");
$jenisagre3 = post("jenisagre3");
$berlaku3 = post("berlaku3");
$selesai3 = post("selesai3");
$noagree = post("noagree");
$noagree2 = post("noagree2");
$noagree3 = post("noagree3");
$tgl_terimaagree = post("tgl_terimaagree");
$tgl_terimaagree2 = post("tgl_terimaagree2");
$tgl_terimaagree3 = post("tgl_terimaagree3");
$keterangan = post("keterangan");
$komnama = post("komnama");
$komline = post("komline");
$komskype = post("komskype");
$komhp = post("komhp");
$jabatan_man = post("jabatan_man");
$jabatan_indo = post("jabatan_indo");
$statusnonaktif = post("statusnonaktif");

        

        $simpan = $this->db->query("
            INSERT INTO dataagen
            (kode_agen,kode_group,nama,hp,email,alamat,status,username,password,namamandarin,alamatmandarin,notel,nofax,direktur,direktur2,nosiup,berlaku,selesai,jenisagre,jenisagre2,berlaku2,selesai2,jenisagre3,berlaku3,selesai3,noagree,noagree2,noagree3,tgl_terimaagree,tgl_terimaagree2,tgl_terimaagree3,keterangan,komnama,komline,komskype,komhp,jabatan_man,jabatan_indo,statusnonaktif) VALUES ('$kode_agen','$kode_group','$nama','$hp','$email','$alamat','$status','$username','$password','$namamandarin','$alamatmandarin','$notel','$nofax','$direktur','$direktur2','$nosiup','$berlaku','$selesai','$jenisagre','$jenisagre2','$berlaku2','$selesai2','$jenisagre3','$berlaku3','$selesai3','$noagree','$noagree2','$noagree3','$tgl_terimaagree','$tgl_terimaagree2','$tgl_terimaagree3','$keterangan','$komnama','$komline','$komskype','$komhp','$jabatan_man','$jabatan_indo','$statusnonaktif')
        ");
    

        if($simpan){
            redirect('admin/dataagen');
        }
    }

    public function update(){
          $key = post('id_agen'); $kode_agen = post("kode_agen");
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
$notel = post("notel");
$nofax = post("nofax");
$direktur = post("direktur");
$direktur2 = post("direktur2");
$nosiup = post("nosiup");
$berlaku = post("berlaku");
$selesai = post("selesai");
$jenisagre = post("jenisagre");
$jenisagre2 = post("jenisagre2");
$berlaku2 = post("berlaku2");
$selesai2 = post("selesai2");
$jenisagre3 = post("jenisagre3");
$berlaku3 = post("berlaku3");
$selesai3 = post("selesai3");
$noagree = post("noagree");
$noagree2 = post("noagree2");
$noagree3 = post("noagree3");
$tgl_terimaagree = post("tgl_terimaagree");
$tgl_terimaagree2 = post("tgl_terimaagree2");
$tgl_terimaagree3 = post("tgl_terimaagree3");
$keterangan = post("keterangan");
$komnama = post("komnama");
$komline = post("komline");
$komskype = post("komskype");
$komhp = post("komhp");
$jabatan_man = post("jabatan_man");
$jabatan_indo = post("jabatan_indo");
$statusnonaktif = post("statusnonaktif");

        $simpan = $this->db->query("
            UPDATE dataagen SET  kode_agen = '$kode_agen', kode_group = '$kode_group', nama = '$nama', hp = '$hp', email = '$email', alamat = '$alamat', status = '$status', username = '$username', password = '$password', namamandarin = '$namamandarin', alamatmandarin = '$alamatmandarin', notel = '$notel', nofax = '$nofax', direktur = '$direktur', direktur2 = '$direktur2', nosiup = '$nosiup', berlaku = '$berlaku', selesai = '$selesai', jenisagre = '$jenisagre', jenisagre2 = '$jenisagre2', berlaku2 = '$berlaku2', selesai2 = '$selesai2', jenisagre3 = '$jenisagre3', berlaku3 = '$berlaku3', selesai3 = '$selesai3', noagree = '$noagree', noagree2 = '$noagree2', noagree3 = '$noagree3', tgl_terimaagree = '$tgl_terimaagree', tgl_terimaagree2 = '$tgl_terimaagree2', tgl_terimaagree3 = '$tgl_terimaagree3', keterangan = '$keterangan', komnama = '$komnama', komline = '$komline', komskype = '$komskype', komhp = '$komhp', jabatan_man = '$jabatan_man', jabatan_indo = '$jabatan_indo', statusnonaktif = '$statusnonaktif' WHERE id_agen = '$key'
            ");
    

        if($simpan){
            redirect('admin/dataagen');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-dataagen.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode agen","kode group","nama","hp","email","alamat","status","username","password","namamandarin","alamatmandarin","notel","nofax","direktur","direktur2","nosiup","berlaku","selesai","jenisagre","jenisagre2","berlaku2","selesai2","jenisagre3","berlaku3","selesai3","noagree","noagree2","noagree3","tgl terimaagree","tgl terimaagree2","tgl terimaagree3","keterangan","komnama","komline","komskype","komhp","jabatan man","jabatan indo","statusnonaktif", "action"];

        $calldata = ["kode_agen","kode_group","nama","hp","email","alamat","status","username","password","namamandarin","alamatmandarin","notel","nofax","direktur","direktur2","nosiup","berlaku","selesai","jenisagre","jenisagre2","berlaku2","selesai2","jenisagre3","berlaku3","selesai3","noagree","noagree2","noagree3","tgl_terimaagree","tgl_terimaagree2","tgl_terimaagree3","keterangan","komnama","komline","komskype","komhp","jabatan_man","jabatan_indo","statusnonaktif"];

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
