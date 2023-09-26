<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Personalblk222 extends CI_Controller {

	private $table1 = 'personalblk222';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/personalblk222/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","pemilik","nodaftar","nama","sponsor","nodisnaker","tempatlahir","tanggallahir","jeniskelamin","alamat","notelp","pendidikan","noktp","negara","bahasa","eksnon","cluster","nopaspor","tglmedawal","tglmedfull","tglsidikjari","adm tglreg","foto","cektgl","cekins","cekket","ranjangtgl","ranjangno","statujk","statterbang","sektor tki", "action"]);
        $this->Createtable->order_set('0, 30');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/personalblk222/view', $data);
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
                        'row' => ["pemilik","nodaftar","nama","sponsor","nodisnaker","tempatlahir","tanggallahir","jeniskelamin","alamat","notelp","pendidikan","noktp","negara","bahasa","eksnon","cluster","nopaspor","tglmedawal","tglmedfull","tglsidikjari","adm_tglreg","foto","cektgl","cekins","cekket","ranjangtgl","ranjangno","statujk","statterbang","sektor_tki"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_personalblk',
                        'data' => ["pemilik","nodaftar","nama","sponsor","nodisnaker","tempatlahir","tanggallahir","jeniskelamin","alamat","notelp","pendidikan","noktp","negara","bahasa","eksnon","cluster","nopaspor","tglmedawal","tglmedfull","tglsidikjari","adm_tglreg","foto","cektgl","cekins","cekket","ranjangtgl","ranjangno","statujk","statterbang","sektor_tki"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_personalblk', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"pemilik", "2"=>"nodaftar", "3"=>"nama", "4"=>"sponsor", "5"=>"nodisnaker", "6"=>"tempatlahir", "7"=>"tanggallahir", "8"=>"jeniskelamin", "9"=>"alamat", "10"=>"notelp", "11"=>"pendidikan", "12"=>"noktp", "13"=>"negara", "14"=>"bahasa", "15"=>"eksnon", "16"=>"cluster", "17"=>"nopaspor", "18"=>"tglmedawal", "19"=>"tglmedfull", "20"=>"tglsidikjari", "21"=>"adm_tglreg", "22"=>"foto", "23"=>"cektgl", "24"=>"cekins", "25"=>"cekket", "26"=>"ranjangtgl", "27"=>"ranjangno", "28"=>"statujk", "29"=>"statterbang", "30"=>"sektor_tki"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_personalblk = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/personalblk222/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_personalblk = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/personalblk222/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $pemilik = post("pemilik");
$nodaftar = post("nodaftar");
$nama = post("nama");
$sponsor = post("sponsor");
$nodisnaker = post("nodisnaker");
$tempatlahir = post("tempatlahir");
$tanggallahir = post("tanggallahir");
$jeniskelamin = post("jeniskelamin");
$alamat = post("alamat");
$notelp = post("notelp");
$pendidikan = post("pendidikan");
$noktp = post("noktp");
$negara = post("negara");
$bahasa = post("bahasa");
$eksnon = post("eksnon");
$cluster = post("cluster");
$nopaspor = post("nopaspor");
$tglmedawal = post("tglmedawal");
$tglmedfull = post("tglmedfull");
$tglsidikjari = post("tglsidikjari");
$adm_tglreg = post("adm_tglreg");
$foto = post("foto");
$cektgl = post("cektgl");
$cekins = post("cekins");
$cekket = post("cekket");
$ranjangtgl = post("ranjangtgl");
$ranjangno = post("ranjangno");
$statujk = post("statujk");
$statterbang = post("statterbang");
$sektor_tki = post("sektor_tki");

        

        $simpan = $this->db->query("
            INSERT INTO personalblk222
            (pemilik,nodaftar,nama,sponsor,nodisnaker,tempatlahir,tanggallahir,jeniskelamin,alamat,notelp,pendidikan,noktp,negara,bahasa,eksnon,cluster,nopaspor,tglmedawal,tglmedfull,tglsidikjari,adm_tglreg,foto,cektgl,cekins,cekket,ranjangtgl,ranjangno,statujk,statterbang,sektor_tki) VALUES ('$pemilik','$nodaftar','$nama','$sponsor','$nodisnaker','$tempatlahir','$tanggallahir','$jeniskelamin','$alamat','$notelp','$pendidikan','$noktp','$negara','$bahasa','$eksnon','$cluster','$nopaspor','$tglmedawal','$tglmedfull','$tglsidikjari','$adm_tglreg','$foto','$cektgl','$cekins','$cekket','$ranjangtgl','$ranjangno','$statujk','$statterbang','$sektor_tki')
        ");
    

        if($simpan){
            redirect('admin/personalblk222');
        }
    }

    public function update(){
          $key = post('id_personalblk'); $pemilik = post("pemilik");
$nodaftar = post("nodaftar");
$nama = post("nama");
$sponsor = post("sponsor");
$nodisnaker = post("nodisnaker");
$tempatlahir = post("tempatlahir");
$tanggallahir = post("tanggallahir");
$jeniskelamin = post("jeniskelamin");
$alamat = post("alamat");
$notelp = post("notelp");
$pendidikan = post("pendidikan");
$noktp = post("noktp");
$negara = post("negara");
$bahasa = post("bahasa");
$eksnon = post("eksnon");
$cluster = post("cluster");
$nopaspor = post("nopaspor");
$tglmedawal = post("tglmedawal");
$tglmedfull = post("tglmedfull");
$tglsidikjari = post("tglsidikjari");
$adm_tglreg = post("adm_tglreg");
$foto = post("foto");
$cektgl = post("cektgl");
$cekins = post("cekins");
$cekket = post("cekket");
$ranjangtgl = post("ranjangtgl");
$ranjangno = post("ranjangno");
$statujk = post("statujk");
$statterbang = post("statterbang");
$sektor_tki = post("sektor_tki");

        $simpan = $this->db->query("
            UPDATE personalblk222 SET  pemilik = '$pemilik', nodaftar = '$nodaftar', nama = '$nama', sponsor = '$sponsor', nodisnaker = '$nodisnaker', tempatlahir = '$tempatlahir', tanggallahir = '$tanggallahir', jeniskelamin = '$jeniskelamin', alamat = '$alamat', notelp = '$notelp', pendidikan = '$pendidikan', noktp = '$noktp', negara = '$negara', bahasa = '$bahasa', eksnon = '$eksnon', cluster = '$cluster', nopaspor = '$nopaspor', tglmedawal = '$tglmedawal', tglmedfull = '$tglmedfull', tglsidikjari = '$tglsidikjari', adm_tglreg = '$adm_tglreg', foto = '$foto', cektgl = '$cektgl', cekins = '$cekins', cekket = '$cekket', ranjangtgl = '$ranjangtgl', ranjangno = '$ranjangno', statujk = '$statujk', statterbang = '$statterbang', sektor_tki = '$sektor_tki' WHERE id_personalblk = '$key'
            ");
    

        if($simpan){
            redirect('admin/personalblk222');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-personalblk222.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","pemilik","nodaftar","nama","sponsor","nodisnaker","tempatlahir","tanggallahir","jeniskelamin","alamat","notelp","pendidikan","noktp","negara","bahasa","eksnon","cluster","nopaspor","tglmedawal","tglmedfull","tglsidikjari","adm tglreg","foto","cektgl","cekins","cekket","ranjangtgl","ranjangno","statujk","statterbang","sektor tki", "action"];

        $calldata = ["pemilik","nodaftar","nama","sponsor","nodisnaker","tempatlahir","tanggallahir","jeniskelamin","alamat","notelp","pendidikan","noktp","negara","bahasa","eksnon","cluster","nopaspor","tglmedawal","tglmedfull","tglsidikjari","adm_tglreg","foto","cektgl","cekins","cekket","ranjangtgl","ranjangno","statujk","statterbang","sektor_tki"];

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
