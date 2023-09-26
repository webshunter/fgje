<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Disnaker extends CI_Controller {

	private $table1 = 'disnaker';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/disnaker/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","nodisnaker","tglonline","data registrasi","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","propinsi","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir ktp","kuasa","terakhir kuasa","nyata","terakhir nyata","legal","terakhir legal","keluarga","terakhir keluarga","tglbuat","tglterima","alamatortu","tglnoktp","tempatnoktp","propinsi tipe","namadisnaker id","d nosuratnikah","d nippencatat","d niksuamioristri","d noregistrasi","d tglsurat","d namakepaladesa","d nonikwali","d nokk","d nikkepala","d nipdidukcapil","d tglterbitkk","email", "action"]);
        $this->Createtable->order_set('0, 66');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/disnaker/view', $data);
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
                        'row' => ["id_biodata","nodisnaker","tglonline","data_registrasi","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","propinsi","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir_ktp","kuasa","terakhir_kuasa","nyata","terakhir_nyata","legal","terakhir_legal","keluarga","terakhir_keluarga","tglbuat","tglterima","alamatortu","tglnoktp","tempatnoktp","propinsi_tipe","namadisnaker_id","d_nosuratnikah","d_nippencatat","d_niksuamioristri","d_noregistrasi","d_tglsurat","d_namakepaladesa","d_nonikwali","d_nokk","d_nikkepala","d_nipdidukcapil","d_tglterbitkk","email"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_disnaker',
                        'data' => ["id_biodata","nodisnaker","tglonline","data_registrasi","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","propinsi","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir_ktp","kuasa","terakhir_kuasa","nyata","terakhir_nyata","legal","terakhir_legal","keluarga","terakhir_keluarga","tglbuat","tglterima","alamatortu","tglnoktp","tempatnoktp","propinsi_tipe","namadisnaker_id","d_nosuratnikah","d_nippencatat","d_niksuamioristri","d_noregistrasi","d_tglsurat","d_namakepaladesa","d_nonikwali","d_nokk","d_nikkepala","d_nipdidukcapil","d_tglterbitkk","email"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_disnaker', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"nodisnaker", "3"=>"tglonline", "4"=>"data_registrasi", "5"=>"nama", "6"=>"tempatlahir", "7"=>"tanggallahir", "8"=>"noktp", "9"=>"jeniskelamin", "10"=>"agama", "11"=>"status", "12"=>"pendidikan", "13"=>"alamat", "14"=>"propinsi", "15"=>"namaayah", "16"=>"namaibu", "17"=>"namaahli", "18"=>"namakontak", "19"=>"alamatkontak", "20"=>"telpkontak", "21"=>"hubkontak", "22"=>"namapasangan", "23"=>"alamatpasangan", "24"=>"perkiraan", "25"=>"negara", "26"=>"jabatan", "27"=>"ahliwaris", "28"=>"jmlanak", "29"=>"agency", "30"=>"matauang", "31"=>"sektorusaha", "32"=>"gaji", "33"=>"nopaspor", "34"=>"masaberlaku", "35"=>"masahabis", "36"=>"tglberangkat", "37"=>"tgltiba", "38"=>"ktp", "39"=>"terakhir_ktp", "40"=>"kuasa", "41"=>"terakhir_kuasa", "42"=>"nyata", "43"=>"terakhir_nyata", "44"=>"legal", "45"=>"terakhir_legal", "46"=>"keluarga", "47"=>"terakhir_keluarga", "48"=>"tglbuat", "49"=>"tglterima", "50"=>"alamatortu", "51"=>"tglnoktp", "52"=>"tempatnoktp", "53"=>"propinsi_tipe", "54"=>"namadisnaker_id", "55"=>"d_nosuratnikah", "56"=>"d_nippencatat", "57"=>"d_niksuamioristri", "58"=>"d_noregistrasi", "59"=>"d_tglsurat", "60"=>"d_namakepaladesa", "61"=>"d_nonikwali", "62"=>"d_nokk", "63"=>"d_nikkepala", "64"=>"d_nipdidukcapil", "65"=>"d_tglterbitkk", "66"=>"email"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_disnaker = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/disnaker/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_disnaker = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/disnaker/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$nodisnaker = post("nodisnaker");
$tglonline = post("tglonline");
$data_registrasi = post("data_registrasi");
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
$tempatnoktp = post("tempatnoktp");
$propinsi_tipe = post("propinsi_tipe");
$namadisnaker_id = post("namadisnaker_id");
$d_nosuratnikah = post("d_nosuratnikah");
$d_nippencatat = post("d_nippencatat");
$d_niksuamioristri = post("d_niksuamioristri");
$d_noregistrasi = post("d_noregistrasi");
$d_tglsurat = post("d_tglsurat");
$d_namakepaladesa = post("d_namakepaladesa");
$d_nonikwali = post("d_nonikwali");
$d_nokk = post("d_nokk");
$d_nikkepala = post("d_nikkepala");
$d_nipdidukcapil = post("d_nipdidukcapil");
$d_tglterbitkk = post("d_tglterbitkk");
$email = post("email");

        

        $simpan = $this->db->query("
            INSERT INTO disnaker
            (id_biodata,nodisnaker,tglonline,data_registrasi,nama,tempatlahir,tanggallahir,noktp,jeniskelamin,agama,status,pendidikan,alamat,propinsi,namaayah,namaibu,namaahli,namakontak,alamatkontak,telpkontak,hubkontak,namapasangan,alamatpasangan,perkiraan,negara,jabatan,ahliwaris,jmlanak,agency,matauang,sektorusaha,gaji,nopaspor,masaberlaku,masahabis,tglberangkat,tgltiba,ktp,terakhir_ktp,kuasa,terakhir_kuasa,nyata,terakhir_nyata,legal,terakhir_legal,keluarga,terakhir_keluarga,tglbuat,tglterima,alamatortu,tglnoktp,tempatnoktp,propinsi_tipe,namadisnaker_id,d_nosuratnikah,d_nippencatat,d_niksuamioristri,d_noregistrasi,d_tglsurat,d_namakepaladesa,d_nonikwali,d_nokk,d_nikkepala,d_nipdidukcapil,d_tglterbitkk,email) VALUES ('$id_biodata','$nodisnaker','$tglonline','$data_registrasi','$nama','$tempatlahir','$tanggallahir','$noktp','$jeniskelamin','$agama','$status','$pendidikan','$alamat','$propinsi','$namaayah','$namaibu','$namaahli','$namakontak','$alamatkontak','$telpkontak','$hubkontak','$namapasangan','$alamatpasangan','$perkiraan','$negara','$jabatan','$ahliwaris','$jmlanak','$agency','$matauang','$sektorusaha','$gaji','$nopaspor','$masaberlaku','$masahabis','$tglberangkat','$tgltiba','$ktp','$terakhir_ktp','$kuasa','$terakhir_kuasa','$nyata','$terakhir_nyata','$legal','$terakhir_legal','$keluarga','$terakhir_keluarga','$tglbuat','$tglterima','$alamatortu','$tglnoktp','$tempatnoktp','$propinsi_tipe','$namadisnaker_id','$d_nosuratnikah','$d_nippencatat','$d_niksuamioristri','$d_noregistrasi','$d_tglsurat','$d_namakepaladesa','$d_nonikwali','$d_nokk','$d_nikkepala','$d_nipdidukcapil','$d_tglterbitkk','$email')
        ");
    

        if($simpan){
            redirect('admin/disnaker');
        }
    }

    public function update(){
          $key = post('id_disnaker'); $id_biodata = post("id_biodata");
$nodisnaker = post("nodisnaker");
$tglonline = post("tglonline");
$data_registrasi = post("data_registrasi");
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
$tempatnoktp = post("tempatnoktp");
$propinsi_tipe = post("propinsi_tipe");
$namadisnaker_id = post("namadisnaker_id");
$d_nosuratnikah = post("d_nosuratnikah");
$d_nippencatat = post("d_nippencatat");
$d_niksuamioristri = post("d_niksuamioristri");
$d_noregistrasi = post("d_noregistrasi");
$d_tglsurat = post("d_tglsurat");
$d_namakepaladesa = post("d_namakepaladesa");
$d_nonikwali = post("d_nonikwali");
$d_nokk = post("d_nokk");
$d_nikkepala = post("d_nikkepala");
$d_nipdidukcapil = post("d_nipdidukcapil");
$d_tglterbitkk = post("d_tglterbitkk");
$email = post("email");

        $simpan = $this->db->query("
            UPDATE disnaker SET  id_biodata = '$id_biodata', nodisnaker = '$nodisnaker', tglonline = '$tglonline', data_registrasi = '$data_registrasi', nama = '$nama', tempatlahir = '$tempatlahir', tanggallahir = '$tanggallahir', noktp = '$noktp', jeniskelamin = '$jeniskelamin', agama = '$agama', status = '$status', pendidikan = '$pendidikan', alamat = '$alamat', propinsi = '$propinsi', namaayah = '$namaayah', namaibu = '$namaibu', namaahli = '$namaahli', namakontak = '$namakontak', alamatkontak = '$alamatkontak', telpkontak = '$telpkontak', hubkontak = '$hubkontak', namapasangan = '$namapasangan', alamatpasangan = '$alamatpasangan', perkiraan = '$perkiraan', negara = '$negara', jabatan = '$jabatan', ahliwaris = '$ahliwaris', jmlanak = '$jmlanak', agency = '$agency', matauang = '$matauang', sektorusaha = '$sektorusaha', gaji = '$gaji', nopaspor = '$nopaspor', masaberlaku = '$masaberlaku', masahabis = '$masahabis', tglberangkat = '$tglberangkat', tgltiba = '$tgltiba', ktp = '$ktp', terakhir_ktp = '$terakhir_ktp', kuasa = '$kuasa', terakhir_kuasa = '$terakhir_kuasa', nyata = '$nyata', terakhir_nyata = '$terakhir_nyata', legal = '$legal', terakhir_legal = '$terakhir_legal', keluarga = '$keluarga', terakhir_keluarga = '$terakhir_keluarga', tglbuat = '$tglbuat', tglterima = '$tglterima', alamatortu = '$alamatortu', tglnoktp = '$tglnoktp', tempatnoktp = '$tempatnoktp', propinsi_tipe = '$propinsi_tipe', namadisnaker_id = '$namadisnaker_id', d_nosuratnikah = '$d_nosuratnikah', d_nippencatat = '$d_nippencatat', d_niksuamioristri = '$d_niksuamioristri', d_noregistrasi = '$d_noregistrasi', d_tglsurat = '$d_tglsurat', d_namakepaladesa = '$d_namakepaladesa', d_nonikwali = '$d_nonikwali', d_nokk = '$d_nokk', d_nikkepala = '$d_nikkepala', d_nipdidukcapil = '$d_nipdidukcapil', d_tglterbitkk = '$d_tglterbitkk', email = '$email' WHERE id_disnaker = '$key'
            ");
    

        if($simpan){
            redirect('admin/disnaker');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-disnaker.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","nodisnaker","tglonline","data registrasi","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","propinsi","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir ktp","kuasa","terakhir kuasa","nyata","terakhir nyata","legal","terakhir legal","keluarga","terakhir keluarga","tglbuat","tglterima","alamatortu","tglnoktp","tempatnoktp","propinsi tipe","namadisnaker id","d nosuratnikah","d nippencatat","d niksuamioristri","d noregistrasi","d tglsurat","d namakepaladesa","d nonikwali","d nokk","d nikkepala","d nipdidukcapil","d tglterbitkk","email", "action"];

        $calldata = ["id_biodata","nodisnaker","tglonline","data_registrasi","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","propinsi","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir_ktp","kuasa","terakhir_kuasa","nyata","terakhir_nyata","legal","terakhir_legal","keluarga","terakhir_keluarga","tglbuat","tglterima","alamatortu","tglnoktp","tempatnoktp","propinsi_tipe","namadisnaker_id","d_nosuratnikah","d_nippencatat","d_niksuamioristri","d_noregistrasi","d_tglsurat","d_namakepaladesa","d_nonikwali","d_nokk","d_nikkepala","d_nipdidukcapil","d_tglterbitkk","email"];

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
