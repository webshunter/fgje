<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Personal extends CI_Controller {

	private $table1 = 'personal';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/personal/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","negara1","negara2","calling","skill1","skill2","skill3","kode proses","kode sponsor","kode agen","nama","nama mandarin","jeniskelamin","notelp","notelpkel","tanggaldaftar","tinggi","berat","hp","hpkel","warganegara","tempatlahir","tgllahir","agama","status","tglmenikah","pendidikan","alamat","alamatlengkap","provinsi","mandarin","taiyu","inggris","cantonese","hakka","foto","statusaktif","indukagen","kirimbio","pk","pap","remark","datafoto","keterangan","keterangan2","lokasikerja","idpemilik","statterbang","ketdok","ketadm","ip created","ip modified","perkiraan manual","keterangan perkiraan manual","tgl pk","status pk","statuspendidikan","terima pk","tglpksisko","tglspbgtaiwan","email", "action"]);
        $this->Createtable->order_set('0, 61');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/personal/view', $data);
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
                        'row' => ["id_biodata","negara1","negara2","calling","skill1","skill2","skill3","kode_proses","kode_sponsor","kode_agen","nama","nama_mandarin","jeniskelamin","notelp","notelpkel","tanggaldaftar","tinggi","berat","hp","hpkel","warganegara","tempatlahir","tgllahir","agama","status","tglmenikah","pendidikan","alamat","alamatlengkap","provinsi","mandarin","taiyu","inggris","cantonese","hakka","foto","statusaktif","indukagen","kirimbio","pk","pap","remark","datafoto","keterangan","keterangan2","lokasikerja","idpemilik","statterbang","ketdok","ketadm","ip_created","ip_modified","perkiraan_manual","keterangan_perkiraan_manual","tgl_pk","status_pk","statuspendidikan","terima_pk","tglpksisko","tglspbgtaiwan","email"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_personal',
                        'data' => ["id_biodata","negara1","negara2","calling","skill1","skill2","skill3","kode_proses","kode_sponsor","kode_agen","nama","nama_mandarin","jeniskelamin","notelp","notelpkel","tanggaldaftar","tinggi","berat","hp","hpkel","warganegara","tempatlahir","tgllahir","agama","status","tglmenikah","pendidikan","alamat","alamatlengkap","provinsi","mandarin","taiyu","inggris","cantonese","hakka","foto","statusaktif","indukagen","kirimbio","pk","pap","remark","datafoto","keterangan","keterangan2","lokasikerja","idpemilik","statterbang","ketdok","ketadm","ip_created","ip_modified","perkiraan_manual","keterangan_perkiraan_manual","tgl_pk","status_pk","statuspendidikan","terima_pk","tglpksisko","tglspbgtaiwan","email"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_personal', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"negara1", "3"=>"negara2", "4"=>"calling", "5"=>"skill1", "6"=>"skill2", "7"=>"skill3", "8"=>"kode_proses", "9"=>"kode_sponsor", "10"=>"kode_agen", "11"=>"nama", "12"=>"nama_mandarin", "13"=>"jeniskelamin", "14"=>"notelp", "15"=>"notelpkel", "16"=>"tanggaldaftar", "17"=>"tinggi", "18"=>"berat", "19"=>"hp", "20"=>"hpkel", "21"=>"warganegara", "22"=>"tempatlahir", "23"=>"tgllahir", "24"=>"agama", "25"=>"status", "26"=>"tglmenikah", "27"=>"pendidikan", "28"=>"alamat", "29"=>"alamatlengkap", "30"=>"provinsi", "31"=>"mandarin", "32"=>"taiyu", "33"=>"inggris", "34"=>"cantonese", "35"=>"hakka", "36"=>"foto", "37"=>"statusaktif", "38"=>"indukagen", "39"=>"kirimbio", "40"=>"pk", "41"=>"pap", "42"=>"remark", "43"=>"datafoto", "44"=>"keterangan", "45"=>"keterangan2", "46"=>"lokasikerja", "47"=>"idpemilik", "48"=>"statterbang", "49"=>"ketdok", "50"=>"ketadm", "51"=>"ip_created", "52"=>"ip_modified", "53"=>"perkiraan_manual", "54"=>"keterangan_perkiraan_manual", "55"=>"tgl_pk", "56"=>"status_pk", "57"=>"statuspendidikan", "58"=>"terima_pk", "59"=>"tglpksisko", "60"=>"tglspbgtaiwan", "61"=>"email"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_personal = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/personal/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_personal = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/personal/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$negara1 = post("negara1");
$negara2 = post("negara2");
$calling = post("calling");
$skill1 = post("skill1");
$skill2 = post("skill2");
$skill3 = post("skill3");
$kode_proses = post("kode_proses");
$kode_sponsor = post("kode_sponsor");
$kode_agen = post("kode_agen");
$nama = post("nama");
$nama_mandarin = post("nama_mandarin");
$jeniskelamin = post("jeniskelamin");
$notelp = post("notelp");
$notelpkel = post("notelpkel");
$tanggaldaftar = post("tanggaldaftar");
$tinggi = post("tinggi");
$berat = post("berat");
$hp = post("hp");
$hpkel = post("hpkel");
$warganegara = post("warganegara");
$tempatlahir = post("tempatlahir");
$tgllahir = post("tgllahir");
$agama = post("agama");
$status = post("status");
$tglmenikah = post("tglmenikah");
$pendidikan = post("pendidikan");
$alamat = post("alamat");
$alamatlengkap = post("alamatlengkap");
$provinsi = post("provinsi");
$mandarin = post("mandarin");
$taiyu = post("taiyu");
$inggris = post("inggris");
$cantonese = post("cantonese");
$hakka = post("hakka");
$foto = post("foto");
$statusaktif = post("statusaktif");
$indukagen = post("indukagen");
$kirimbio = post("kirimbio");
$pk = post("pk");
$pap = post("pap");
$remark = post("remark");
$datafoto = post("datafoto");
$keterangan = post("keterangan");
$keterangan2 = post("keterangan2");
$lokasikerja = post("lokasikerja");
$idpemilik = post("idpemilik");
$statterbang = post("statterbang");
$ketdok = post("ketdok");
$ketadm = post("ketadm");
$ip_created = post("ip_created");
$ip_modified = post("ip_modified");
$perkiraan_manual = post("perkiraan_manual");
$keterangan_perkiraan_manual = post("keterangan_perkiraan_manual");
$tgl_pk = post("tgl_pk");
$status_pk = post("status_pk");
$statuspendidikan = post("statuspendidikan");
$terima_pk = post("terima_pk");
$tglpksisko = post("tglpksisko");
$tglspbgtaiwan = post("tglspbgtaiwan");
$email = post("email");

        

        $simpan = $this->db->query("
            INSERT INTO personal
            (id_biodata,negara1,negara2,calling,skill1,skill2,skill3,kode_proses,kode_sponsor,kode_agen,nama,nama_mandarin,jeniskelamin,notelp,notelpkel,tanggaldaftar,tinggi,berat,hp,hpkel,warganegara,tempatlahir,tgllahir,agama,status,tglmenikah,pendidikan,alamat,alamatlengkap,provinsi,mandarin,taiyu,inggris,cantonese,hakka,foto,statusaktif,indukagen,kirimbio,pk,pap,remark,datafoto,keterangan,keterangan2,lokasikerja,idpemilik,statterbang,ketdok,ketadm,ip_created,ip_modified,perkiraan_manual,keterangan_perkiraan_manual,tgl_pk,status_pk,statuspendidikan,terima_pk,tglpksisko,tglspbgtaiwan,email) VALUES ('$id_biodata','$negara1','$negara2','$calling','$skill1','$skill2','$skill3','$kode_proses','$kode_sponsor','$kode_agen','$nama','$nama_mandarin','$jeniskelamin','$notelp','$notelpkel','$tanggaldaftar','$tinggi','$berat','$hp','$hpkel','$warganegara','$tempatlahir','$tgllahir','$agama','$status','$tglmenikah','$pendidikan','$alamat','$alamatlengkap','$provinsi','$mandarin','$taiyu','$inggris','$cantonese','$hakka','$foto','$statusaktif','$indukagen','$kirimbio','$pk','$pap','$remark','$datafoto','$keterangan','$keterangan2','$lokasikerja','$idpemilik','$statterbang','$ketdok','$ketadm','$ip_created','$ip_modified','$perkiraan_manual','$keterangan_perkiraan_manual','$tgl_pk','$status_pk','$statuspendidikan','$terima_pk','$tglpksisko','$tglspbgtaiwan','$email')
        ");
    

        if($simpan){
            redirect('admin/personal');
        }
    }

    public function update(){
          $key = post('id_personal'); $id_biodata = post("id_biodata");
$negara1 = post("negara1");
$negara2 = post("negara2");
$calling = post("calling");
$skill1 = post("skill1");
$skill2 = post("skill2");
$skill3 = post("skill3");
$kode_proses = post("kode_proses");
$kode_sponsor = post("kode_sponsor");
$kode_agen = post("kode_agen");
$nama = post("nama");
$nama_mandarin = post("nama_mandarin");
$jeniskelamin = post("jeniskelamin");
$notelp = post("notelp");
$notelpkel = post("notelpkel");
$tanggaldaftar = post("tanggaldaftar");
$tinggi = post("tinggi");
$berat = post("berat");
$hp = post("hp");
$hpkel = post("hpkel");
$warganegara = post("warganegara");
$tempatlahir = post("tempatlahir");
$tgllahir = post("tgllahir");
$agama = post("agama");
$status = post("status");
$tglmenikah = post("tglmenikah");
$pendidikan = post("pendidikan");
$alamat = post("alamat");
$alamatlengkap = post("alamatlengkap");
$provinsi = post("provinsi");
$mandarin = post("mandarin");
$taiyu = post("taiyu");
$inggris = post("inggris");
$cantonese = post("cantonese");
$hakka = post("hakka");
$foto = post("foto");
$statusaktif = post("statusaktif");
$indukagen = post("indukagen");
$kirimbio = post("kirimbio");
$pk = post("pk");
$pap = post("pap");
$remark = post("remark");
$datafoto = post("datafoto");
$keterangan = post("keterangan");
$keterangan2 = post("keterangan2");
$lokasikerja = post("lokasikerja");
$idpemilik = post("idpemilik");
$statterbang = post("statterbang");
$ketdok = post("ketdok");
$ketadm = post("ketadm");
$ip_created = post("ip_created");
$ip_modified = post("ip_modified");
$perkiraan_manual = post("perkiraan_manual");
$keterangan_perkiraan_manual = post("keterangan_perkiraan_manual");
$tgl_pk = post("tgl_pk");
$status_pk = post("status_pk");
$statuspendidikan = post("statuspendidikan");
$terima_pk = post("terima_pk");
$tglpksisko = post("tglpksisko");
$tglspbgtaiwan = post("tglspbgtaiwan");
$email = post("email");

        $simpan = $this->db->query("
            UPDATE personal SET  id_biodata = '$id_biodata', negara1 = '$negara1', negara2 = '$negara2', calling = '$calling', skill1 = '$skill1', skill2 = '$skill2', skill3 = '$skill3', kode_proses = '$kode_proses', kode_sponsor = '$kode_sponsor', kode_agen = '$kode_agen', nama = '$nama', nama_mandarin = '$nama_mandarin', jeniskelamin = '$jeniskelamin', notelp = '$notelp', notelpkel = '$notelpkel', tanggaldaftar = '$tanggaldaftar', tinggi = '$tinggi', berat = '$berat', hp = '$hp', hpkel = '$hpkel', warganegara = '$warganegara', tempatlahir = '$tempatlahir', tgllahir = '$tgllahir', agama = '$agama', status = '$status', tglmenikah = '$tglmenikah', pendidikan = '$pendidikan', alamat = '$alamat', alamatlengkap = '$alamatlengkap', provinsi = '$provinsi', mandarin = '$mandarin', taiyu = '$taiyu', inggris = '$inggris', cantonese = '$cantonese', hakka = '$hakka', foto = '$foto', statusaktif = '$statusaktif', indukagen = '$indukagen', kirimbio = '$kirimbio', pk = '$pk', pap = '$pap', remark = '$remark', datafoto = '$datafoto', keterangan = '$keterangan', keterangan2 = '$keterangan2', lokasikerja = '$lokasikerja', idpemilik = '$idpemilik', statterbang = '$statterbang', ketdok = '$ketdok', ketadm = '$ketadm', ip_created = '$ip_created', ip_modified = '$ip_modified', perkiraan_manual = '$perkiraan_manual', keterangan_perkiraan_manual = '$keterangan_perkiraan_manual', tgl_pk = '$tgl_pk', status_pk = '$status_pk', statuspendidikan = '$statuspendidikan', terima_pk = '$terima_pk', tglpksisko = '$tglpksisko', tglspbgtaiwan = '$tglspbgtaiwan', email = '$email' WHERE id_personal = '$key'
            ");
    

        if($simpan){
            redirect('admin/personal');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-personal.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","negara1","negara2","calling","skill1","skill2","skill3","kode proses","kode sponsor","kode agen","nama","nama mandarin","jeniskelamin","notelp","notelpkel","tanggaldaftar","tinggi","berat","hp","hpkel","warganegara","tempatlahir","tgllahir","agama","status","tglmenikah","pendidikan","alamat","alamatlengkap","provinsi","mandarin","taiyu","inggris","cantonese","hakka","foto","statusaktif","indukagen","kirimbio","pk","pap","remark","datafoto","keterangan","keterangan2","lokasikerja","idpemilik","statterbang","ketdok","ketadm","ip created","ip modified","perkiraan manual","keterangan perkiraan manual","tgl pk","status pk","statuspendidikan","terima pk","tglpksisko","tglspbgtaiwan","email", "action"];

        $calldata = ["id_biodata","negara1","negara2","calling","skill1","skill2","skill3","kode_proses","kode_sponsor","kode_agen","nama","nama_mandarin","jeniskelamin","notelp","notelpkel","tanggaldaftar","tinggi","berat","hp","hpkel","warganegara","tempatlahir","tgllahir","agama","status","tglmenikah","pendidikan","alamat","alamatlengkap","provinsi","mandarin","taiyu","inggris","cantonese","hakka","foto","statusaktif","indukagen","kirimbio","pk","pap","remark","datafoto","keterangan","keterangan2","lokasikerja","idpemilik","statterbang","ketdok","ketadm","ip_created","ip_modified","perkiraan_manual","keterangan_perkiraan_manual","tgl_pk","status_pk","statuspendidikan","terima_pk","tglpksisko","tglspbgtaiwan","email"];

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
