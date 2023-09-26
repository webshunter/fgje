<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Disnaker_backup extends CI_Controller {

	private $table1 = 'disnaker_backup';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/disnaker_backup/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","nodisnaker","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","propinsi","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","tglonline","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir ktp","kuasa","terakhir kuasa","nyata","terakhir nyata","legal","terakhir legal","keluarga","terakhir keluarga","tglbuat","tglterima","alamatortu","tglnoktp","date created","ztipe","ip","data registrasi","tempatnoktp","propinsi tipe","namadisnaker id", "action"]);
        $this->Createtable->order_set('0, 57');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/disnaker_backup/view', $data);
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
                        'row' => ["id_biodata","nodisnaker","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","propinsi","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","tglonline","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir_ktp","kuasa","terakhir_kuasa","nyata","terakhir_nyata","legal","terakhir_legal","keluarga","terakhir_keluarga","tglbuat","tglterima","alamatortu","tglnoktp","date_created","ztipe","ip","data_registrasi","tempatnoktp","propinsi_tipe","namadisnaker_id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_disnaker',
                        'data' => ["id_biodata","nodisnaker","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","propinsi","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","tglonline","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir_ktp","kuasa","terakhir_kuasa","nyata","terakhir_nyata","legal","terakhir_legal","keluarga","terakhir_keluarga","tglbuat","tglterima","alamatortu","tglnoktp","date_created","ztipe","ip","data_registrasi","tempatnoktp","propinsi_tipe","namadisnaker_id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_disnaker', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"nodisnaker", "3"=>"nama", "4"=>"tempatlahir", "5"=>"tanggallahir", "6"=>"noktp", "7"=>"jeniskelamin", "8"=>"agama", "9"=>"status", "10"=>"pendidikan", "11"=>"alamat", "12"=>"propinsi", "13"=>"namaayah", "14"=>"namaibu", "15"=>"namaahli", "16"=>"namakontak", "17"=>"alamatkontak", "18"=>"telpkontak", "19"=>"hubkontak", "20"=>"namapasangan", "21"=>"alamatpasangan", "22"=>"tglonline", "23"=>"perkiraan", "24"=>"negara", "25"=>"jabatan", "26"=>"ahliwaris", "27"=>"jmlanak", "28"=>"agency", "29"=>"matauang", "30"=>"sektorusaha", "31"=>"gaji", "32"=>"nopaspor", "33"=>"masaberlaku", "34"=>"masahabis", "35"=>"tglberangkat", "36"=>"tgltiba", "37"=>"ktp", "38"=>"terakhir_ktp", "39"=>"kuasa", "40"=>"terakhir_kuasa", "41"=>"nyata", "42"=>"terakhir_nyata", "43"=>"legal", "44"=>"terakhir_legal", "45"=>"keluarga", "46"=>"terakhir_keluarga", "47"=>"tglbuat", "48"=>"tglterima", "49"=>"alamatortu", "50"=>"tglnoktp", "51"=>"date_created", "52"=>"ztipe", "53"=>"ip", "54"=>"data_registrasi", "55"=>"tempatnoktp", "56"=>"propinsi_tipe", "57"=>"namadisnaker_id"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_disnaker = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/disnaker_backup/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_disnaker = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/disnaker_backup/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$nodisnaker = post("nodisnaker");
$nama = post("nama");
$tempatlahir = post("tempatlahir");
$tanggallahir = post("tanggallahir");
$noktp = post("noktp");
$jeniskelamin = post("jeniskelamin");
$agama = post("agama");
$status = post("status");
$pendidikan = post("pendidikan");
$alamat = post("alamat");
$propinsi = post("propinsi");
$namaayah = post("namaayah");
$namaibu = post("namaibu");
$namaahli = post("namaahli");
$namakontak = post("namakontak");
$alamatkontak = post("alamatkontak");
$telpkontak = post("telpkontak");
$hubkontak = post("hubkontak");
$namapasangan = post("namapasangan");
$alamatpasangan = post("alamatpasangan");
$tglonline = post("tglonline");
$perkiraan = post("perkiraan");
$negara = post("negara");
$jabatan = post("jabatan");
$ahliwaris = post("ahliwaris");
$jmlanak = post("jmlanak");
$agency = post("agency");
$matauang = post("matauang");
$sektorusaha = post("sektorusaha");
$gaji = post("gaji");
$nopaspor = post("nopaspor");
$masaberlaku = post("masaberlaku");
$masahabis = post("masahabis");
$tglberangkat = post("tglberangkat");
$tgltiba = post("tgltiba");
$ktp = post("ktp");
$terakhir_ktp = post("terakhir_ktp");
$kuasa = post("kuasa");
$terakhir_kuasa = post("terakhir_kuasa");
$nyata = post("nyata");
$terakhir_nyata = post("terakhir_nyata");
$legal = post("legal");
$terakhir_legal = post("terakhir_legal");
$keluarga = post("keluarga");
$terakhir_keluarga = post("terakhir_keluarga");
$tglbuat = post("tglbuat");
$tglterima = post("tglterima");
$alamatortu = post("alamatortu");
$tglnoktp = post("tglnoktp");
$date_created = post("date_created");
$ztipe = post("ztipe");
$ip = post("ip");
$data_registrasi = post("data_registrasi");
$tempatnoktp = post("tempatnoktp");
$propinsi_tipe = post("propinsi_tipe");
$namadisnaker_id = post("namadisnaker_id");

        

        $simpan = $this->db->query("
            INSERT INTO disnaker_backup
            (id_biodata,nodisnaker,nama,tempatlahir,tanggallahir,noktp,jeniskelamin,agama,status,pendidikan,alamat,propinsi,namaayah,namaibu,namaahli,namakontak,alamatkontak,telpkontak,hubkontak,namapasangan,alamatpasangan,tglonline,perkiraan,negara,jabatan,ahliwaris,jmlanak,agency,matauang,sektorusaha,gaji,nopaspor,masaberlaku,masahabis,tglberangkat,tgltiba,ktp,terakhir_ktp,kuasa,terakhir_kuasa,nyata,terakhir_nyata,legal,terakhir_legal,keluarga,terakhir_keluarga,tglbuat,tglterima,alamatortu,tglnoktp,date_created,ztipe,ip,data_registrasi,tempatnoktp,propinsi_tipe,namadisnaker_id) VALUES ('$id_biodata','$nodisnaker','$nama','$tempatlahir','$tanggallahir','$noktp','$jeniskelamin','$agama','$status','$pendidikan','$alamat','$propinsi','$namaayah','$namaibu','$namaahli','$namakontak','$alamatkontak','$telpkontak','$hubkontak','$namapasangan','$alamatpasangan','$tglonline','$perkiraan','$negara','$jabatan','$ahliwaris','$jmlanak','$agency','$matauang','$sektorusaha','$gaji','$nopaspor','$masaberlaku','$masahabis','$tglberangkat','$tgltiba','$ktp','$terakhir_ktp','$kuasa','$terakhir_kuasa','$nyata','$terakhir_nyata','$legal','$terakhir_legal','$keluarga','$terakhir_keluarga','$tglbuat','$tglterima','$alamatortu','$tglnoktp','$date_created','$ztipe','$ip','$data_registrasi','$tempatnoktp','$propinsi_tipe','$namadisnaker_id')
        ");
    

        if($simpan){
            redirect('admin/disnaker_backup');
        }
    }

    public function update(){
          $key = post('id_disnaker'); $id_biodata = post("id_biodata");
$nodisnaker = post("nodisnaker");
$nama = post("nama");
$tempatlahir = post("tempatlahir");
$tanggallahir = post("tanggallahir");
$noktp = post("noktp");
$jeniskelamin = post("jeniskelamin");
$agama = post("agama");
$status = post("status");
$pendidikan = post("pendidikan");
$alamat = post("alamat");
$propinsi = post("propinsi");
$namaayah = post("namaayah");
$namaibu = post("namaibu");
$namaahli = post("namaahli");
$namakontak = post("namakontak");
$alamatkontak = post("alamatkontak");
$telpkontak = post("telpkontak");
$hubkontak = post("hubkontak");
$namapasangan = post("namapasangan");
$alamatpasangan = post("alamatpasangan");
$tglonline = post("tglonline");
$perkiraan = post("perkiraan");
$negara = post("negara");
$jabatan = post("jabatan");
$ahliwaris = post("ahliwaris");
$jmlanak = post("jmlanak");
$agency = post("agency");
$matauang = post("matauang");
$sektorusaha = post("sektorusaha");
$gaji = post("gaji");
$nopaspor = post("nopaspor");
$masaberlaku = post("masaberlaku");
$masahabis = post("masahabis");
$tglberangkat = post("tglberangkat");
$tgltiba = post("tgltiba");
$ktp = post("ktp");
$terakhir_ktp = post("terakhir_ktp");
$kuasa = post("kuasa");
$terakhir_kuasa = post("terakhir_kuasa");
$nyata = post("nyata");
$terakhir_nyata = post("terakhir_nyata");
$legal = post("legal");
$terakhir_legal = post("terakhir_legal");
$keluarga = post("keluarga");
$terakhir_keluarga = post("terakhir_keluarga");
$tglbuat = post("tglbuat");
$tglterima = post("tglterima");
$alamatortu = post("alamatortu");
$tglnoktp = post("tglnoktp");
$date_created = post("date_created");
$ztipe = post("ztipe");
$ip = post("ip");
$data_registrasi = post("data_registrasi");
$tempatnoktp = post("tempatnoktp");
$propinsi_tipe = post("propinsi_tipe");
$namadisnaker_id = post("namadisnaker_id");

        $simpan = $this->db->query("
            UPDATE disnaker_backup SET  id_biodata = '$id_biodata', nodisnaker = '$nodisnaker', nama = '$nama', tempatlahir = '$tempatlahir', tanggallahir = '$tanggallahir', noktp = '$noktp', jeniskelamin = '$jeniskelamin', agama = '$agama', status = '$status', pendidikan = '$pendidikan', alamat = '$alamat', propinsi = '$propinsi', namaayah = '$namaayah', namaibu = '$namaibu', namaahli = '$namaahli', namakontak = '$namakontak', alamatkontak = '$alamatkontak', telpkontak = '$telpkontak', hubkontak = '$hubkontak', namapasangan = '$namapasangan', alamatpasangan = '$alamatpasangan', tglonline = '$tglonline', perkiraan = '$perkiraan', negara = '$negara', jabatan = '$jabatan', ahliwaris = '$ahliwaris', jmlanak = '$jmlanak', agency = '$agency', matauang = '$matauang', sektorusaha = '$sektorusaha', gaji = '$gaji', nopaspor = '$nopaspor', masaberlaku = '$masaberlaku', masahabis = '$masahabis', tglberangkat = '$tglberangkat', tgltiba = '$tgltiba', ktp = '$ktp', terakhir_ktp = '$terakhir_ktp', kuasa = '$kuasa', terakhir_kuasa = '$terakhir_kuasa', nyata = '$nyata', terakhir_nyata = '$terakhir_nyata', legal = '$legal', terakhir_legal = '$terakhir_legal', keluarga = '$keluarga', terakhir_keluarga = '$terakhir_keluarga', tglbuat = '$tglbuat', tglterima = '$tglterima', alamatortu = '$alamatortu', tglnoktp = '$tglnoktp', date_created = '$date_created', ztipe = '$ztipe', ip = '$ip', data_registrasi = '$data_registrasi', tempatnoktp = '$tempatnoktp', propinsi_tipe = '$propinsi_tipe', namadisnaker_id = '$namadisnaker_id' WHERE id_disnaker = '$key'
            ");
    

        if($simpan){
            redirect('admin/disnaker_backup');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-disnaker_backup.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","nodisnaker","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","propinsi","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","tglonline","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir ktp","kuasa","terakhir kuasa","nyata","terakhir nyata","legal","terakhir legal","keluarga","terakhir keluarga","tglbuat","tglterima","alamatortu","tglnoktp","date created","ztipe","ip","data registrasi","tempatnoktp","propinsi tipe","namadisnaker id", "action"];

        $calldata = ["id_biodata","nodisnaker","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","propinsi","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","tglonline","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir_ktp","kuasa","terakhir_kuasa","nyata","terakhir_nyata","legal","terakhir_legal","keluarga","terakhir_keluarga","tglbuat","tglterima","alamatortu","tglnoktp","date_created","ztipe","ip","data_registrasi","tempatnoktp","propinsi_tipe","namadisnaker_id"];

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
