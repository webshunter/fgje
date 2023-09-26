<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Disnaker2 extends CI_Controller {

	private $table1 = 'disnaker2';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/disnaker2/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","nodisnaker","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","tglonline","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir ktp","kuasa","terakhir kuasa","nyata","terakhir nyata","legal","terakhir legal","keluarga","terakhir keluarga","tglbuat","tglterima","alamatortu", "action"]);
        $this->Createtable->order_set('0, 48');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/disnaker2/view', $data);
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
                        'row' => ["id_biodata","nodisnaker","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","tglonline","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir_ktp","kuasa","terakhir_kuasa","nyata","terakhir_nyata","legal","terakhir_legal","keluarga","terakhir_keluarga","tglbuat","tglterima","alamatortu"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_disnaker',
                        'data' => ["id_biodata","nodisnaker","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","tglonline","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir_ktp","kuasa","terakhir_kuasa","nyata","terakhir_nyata","legal","terakhir_legal","keluarga","terakhir_keluarga","tglbuat","tglterima","alamatortu"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_disnaker', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"nodisnaker", "3"=>"nama", "4"=>"tempatlahir", "5"=>"tanggallahir", "6"=>"noktp", "7"=>"jeniskelamin", "8"=>"agama", "9"=>"status", "10"=>"pendidikan", "11"=>"alamat", "12"=>"namaayah", "13"=>"namaibu", "14"=>"namaahli", "15"=>"namakontak", "16"=>"alamatkontak", "17"=>"telpkontak", "18"=>"hubkontak", "19"=>"namapasangan", "20"=>"alamatpasangan", "21"=>"tglonline", "22"=>"perkiraan", "23"=>"negara", "24"=>"jabatan", "25"=>"ahliwaris", "26"=>"jmlanak", "27"=>"agency", "28"=>"matauang", "29"=>"sektorusaha", "30"=>"gaji", "31"=>"nopaspor", "32"=>"masaberlaku", "33"=>"masahabis", "34"=>"tglberangkat", "35"=>"tgltiba", "36"=>"ktp", "37"=>"terakhir_ktp", "38"=>"kuasa", "39"=>"terakhir_kuasa", "40"=>"nyata", "41"=>"terakhir_nyata", "42"=>"legal", "43"=>"terakhir_legal", "44"=>"keluarga", "45"=>"terakhir_keluarga", "46"=>"tglbuat", "47"=>"tglterima", "48"=>"alamatortu"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_disnaker = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/disnaker2/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_disnaker = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/disnaker2/tambah');
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

        

        $simpan = $this->db->query("
            INSERT INTO disnaker2
            (id_biodata,nodisnaker,nama,tempatlahir,tanggallahir,noktp,jeniskelamin,agama,status,pendidikan,alamat,namaayah,namaibu,namaahli,namakontak,alamatkontak,telpkontak,hubkontak,namapasangan,alamatpasangan,tglonline,perkiraan,negara,jabatan,ahliwaris,jmlanak,agency,matauang,sektorusaha,gaji,nopaspor,masaberlaku,masahabis,tglberangkat,tgltiba,ktp,terakhir_ktp,kuasa,terakhir_kuasa,nyata,terakhir_nyata,legal,terakhir_legal,keluarga,terakhir_keluarga,tglbuat,tglterima,alamatortu) VALUES ('$id_biodata','$nodisnaker','$nama','$tempatlahir','$tanggallahir','$noktp','$jeniskelamin','$agama','$status','$pendidikan','$alamat','$namaayah','$namaibu','$namaahli','$namakontak','$alamatkontak','$telpkontak','$hubkontak','$namapasangan','$alamatpasangan','$tglonline','$perkiraan','$negara','$jabatan','$ahliwaris','$jmlanak','$agency','$matauang','$sektorusaha','$gaji','$nopaspor','$masaberlaku','$masahabis','$tglberangkat','$tgltiba','$ktp','$terakhir_ktp','$kuasa','$terakhir_kuasa','$nyata','$terakhir_nyata','$legal','$terakhir_legal','$keluarga','$terakhir_keluarga','$tglbuat','$tglterima','$alamatortu')
        ");
    

        if($simpan){
            redirect('admin/disnaker2');
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

        $simpan = $this->db->query("
            UPDATE disnaker2 SET  id_biodata = '$id_biodata', nodisnaker = '$nodisnaker', nama = '$nama', tempatlahir = '$tempatlahir', tanggallahir = '$tanggallahir', noktp = '$noktp', jeniskelamin = '$jeniskelamin', agama = '$agama', status = '$status', pendidikan = '$pendidikan', alamat = '$alamat', namaayah = '$namaayah', namaibu = '$namaibu', namaahli = '$namaahli', namakontak = '$namakontak', alamatkontak = '$alamatkontak', telpkontak = '$telpkontak', hubkontak = '$hubkontak', namapasangan = '$namapasangan', alamatpasangan = '$alamatpasangan', tglonline = '$tglonline', perkiraan = '$perkiraan', negara = '$negara', jabatan = '$jabatan', ahliwaris = '$ahliwaris', jmlanak = '$jmlanak', agency = '$agency', matauang = '$matauang', sektorusaha = '$sektorusaha', gaji = '$gaji', nopaspor = '$nopaspor', masaberlaku = '$masaberlaku', masahabis = '$masahabis', tglberangkat = '$tglberangkat', tgltiba = '$tgltiba', ktp = '$ktp', terakhir_ktp = '$terakhir_ktp', kuasa = '$kuasa', terakhir_kuasa = '$terakhir_kuasa', nyata = '$nyata', terakhir_nyata = '$terakhir_nyata', legal = '$legal', terakhir_legal = '$terakhir_legal', keluarga = '$keluarga', terakhir_keluarga = '$terakhir_keluarga', tglbuat = '$tglbuat', tglterima = '$tglterima', alamatortu = '$alamatortu' WHERE id_disnaker = '$key'
            ");
    

        if($simpan){
            redirect('admin/disnaker2');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-disnaker2.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","nodisnaker","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","tglonline","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir ktp","kuasa","terakhir kuasa","nyata","terakhir nyata","legal","terakhir legal","keluarga","terakhir keluarga","tglbuat","tglterima","alamatortu", "action"];

        $calldata = ["id_biodata","nodisnaker","nama","tempatlahir","tanggallahir","noktp","jeniskelamin","agama","status","pendidikan","alamat","namaayah","namaibu","namaahli","namakontak","alamatkontak","telpkontak","hubkontak","namapasangan","alamatpasangan","tglonline","perkiraan","negara","jabatan","ahliwaris","jmlanak","agency","matauang","sektorusaha","gaji","nopaspor","masaberlaku","masahabis","tglberangkat","tgltiba","ktp","terakhir_ktp","kuasa","terakhir_kuasa","nyata","terakhir_nyata","legal","terakhir_legal","keluarga","terakhir_keluarga","tglbuat","tglterima","alamatortu"];

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
