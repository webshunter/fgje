<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Visa extends CI_Controller {

	private $table1 = 'visa';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/visa/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","novisa","negara","jabatan","kocokan","finger","terima","statuskocokan","statusfinger","statusterima","tglberlaku","tglsampai","pap","nopap","statuspap","ktkln","statusktkln","tanggalterbang","id terbang","statustgl","tiket","statusterbang","tglberangkat","airport","tglterimadok","statsuhandok","tempatsuhandok","statvpdok","tempatvpdok","jddok","arcdok","icdok","ketdok","ketdoksuhan","ketdokvp","suhanketdok","vpketdok","id biodata titipan","nama titipan","tgl terbang titipan","no suhan titipan","no vp titipan","id biodata dititipkan","nama dititipkan","tgl terbang dititipkan","no suhan dititipkan","id biodata dititipkan2","nama dititipkan2","tgl terbang dititipkan2","no vp dititipkan","isidok1","statdok1","isidok2","statdok2","isidok3","statdok3","isidok4","statdok4","isidok5","statdok5","isidok6","statdok6","isidok7","statdok7","isidok8","statdok8","apendik a","apendik b","apendik c","apendik d","tanggal input", "action"]);
        $this->Createtable->order_set('0, 71');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/visa/view', $data);
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
                        'row' => ["id_biodata","novisa","negara","jabatan","kocokan","finger","terima","statuskocokan","statusfinger","statusterima","tglberlaku","tglsampai","pap","nopap","statuspap","ktkln","statusktkln","tanggalterbang","id_terbang","statustgl","tiket","statusterbang","tglberangkat","airport","tglterimadok","statsuhandok","tempatsuhandok","statvpdok","tempatvpdok","jddok","arcdok","icdok","ketdok","ketdoksuhan","ketdokvp","suhanketdok","vpketdok","id_biodata_titipan","nama_titipan","tgl_terbang_titipan","no_suhan_titipan","no_vp_titipan","id_biodata_dititipkan","nama_dititipkan","tgl_terbang_dititipkan","no_suhan_dititipkan","id_biodata_dititipkan2","nama_dititipkan2","tgl_terbang_dititipkan2","no_vp_dititipkan","isidok1","statdok1","isidok2","statdok2","isidok3","statdok3","isidok4","statdok4","isidok5","statdok5","isidok6","statdok6","isidok7","statdok7","isidok8","statdok8","apendik_a","apendik_b","apendik_c","apendik_d","tanggal_input"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_visa',
                        'data' => ["id_biodata","novisa","negara","jabatan","kocokan","finger","terima","statuskocokan","statusfinger","statusterima","tglberlaku","tglsampai","pap","nopap","statuspap","ktkln","statusktkln","tanggalterbang","id_terbang","statustgl","tiket","statusterbang","tglberangkat","airport","tglterimadok","statsuhandok","tempatsuhandok","statvpdok","tempatvpdok","jddok","arcdok","icdok","ketdok","ketdoksuhan","ketdokvp","suhanketdok","vpketdok","id_biodata_titipan","nama_titipan","tgl_terbang_titipan","no_suhan_titipan","no_vp_titipan","id_biodata_dititipkan","nama_dititipkan","tgl_terbang_dititipkan","no_suhan_dititipkan","id_biodata_dititipkan2","nama_dititipkan2","tgl_terbang_dititipkan2","no_vp_dititipkan","isidok1","statdok1","isidok2","statdok2","isidok3","statdok3","isidok4","statdok4","isidok5","statdok5","isidok6","statdok6","isidok7","statdok7","isidok8","statdok8","apendik_a","apendik_b","apendik_c","apendik_d","tanggal_input"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_visa', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"novisa", "3"=>"negara", "4"=>"jabatan", "5"=>"kocokan", "6"=>"finger", "7"=>"terima", "8"=>"statuskocokan", "9"=>"statusfinger", "10"=>"statusterima", "11"=>"tglberlaku", "12"=>"tglsampai", "13"=>"pap", "14"=>"nopap", "15"=>"statuspap", "16"=>"ktkln", "17"=>"statusktkln", "18"=>"tanggalterbang", "19"=>"id_terbang", "20"=>"statustgl", "21"=>"tiket", "22"=>"statusterbang", "23"=>"tglberangkat", "24"=>"airport", "25"=>"tglterimadok", "26"=>"statsuhandok", "27"=>"tempatsuhandok", "28"=>"statvpdok", "29"=>"tempatvpdok", "30"=>"jddok", "31"=>"arcdok", "32"=>"icdok", "33"=>"ketdok", "34"=>"ketdoksuhan", "35"=>"ketdokvp", "36"=>"suhanketdok", "37"=>"vpketdok", "38"=>"id_biodata_titipan", "39"=>"nama_titipan", "40"=>"tgl_terbang_titipan", "41"=>"no_suhan_titipan", "42"=>"no_vp_titipan", "43"=>"id_biodata_dititipkan", "44"=>"nama_dititipkan", "45"=>"tgl_terbang_dititipkan", "46"=>"no_suhan_dititipkan", "47"=>"id_biodata_dititipkan2", "48"=>"nama_dititipkan2", "49"=>"tgl_terbang_dititipkan2", "50"=>"no_vp_dititipkan", "51"=>"isidok1", "52"=>"statdok1", "53"=>"isidok2", "54"=>"statdok2", "55"=>"isidok3", "56"=>"statdok3", "57"=>"isidok4", "58"=>"statdok4", "59"=>"isidok5", "60"=>"statdok5", "61"=>"isidok6", "62"=>"statdok6", "63"=>"isidok7", "64"=>"statdok7", "65"=>"isidok8", "66"=>"statdok8", "67"=>"apendik_a", "68"=>"apendik_b", "69"=>"apendik_c", "70"=>"apendik_d", "71"=>"tanggal_input"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_visa = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/visa/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_visa = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/visa/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$novisa = post("novisa");
$negara = post("negara");
$jabatan = post("jabatan");
$kocokan = post("kocokan");
$finger = post("finger");
$terima = post("terima");
$statuskocokan = post("statuskocokan");
$statusfinger = post("statusfinger");
$statusterima = post("statusterima");
$tglberlaku = post("tglberlaku");
$tglsampai = post("tglsampai");
$pap = post("pap");
$nopap = post("nopap");
$statuspap = post("statuspap");
$ktkln = post("ktkln");
$statusktkln = post("statusktkln");
$tanggalterbang = post("tanggalterbang");
$id_terbang = post("id_terbang");
$statustgl = post("statustgl");
$tiket = post("tiket");
$statusterbang = post("statusterbang");
$tglberangkat = post("tglberangkat");
$airport = post("airport");
$tglterimadok = post("tglterimadok");
$statsuhandok = post("statsuhandok");
$tempatsuhandok = post("tempatsuhandok");
$statvpdok = post("statvpdok");
$tempatvpdok = post("tempatvpdok");
$jddok = post("jddok");
$arcdok = post("arcdok");
$icdok = post("icdok");
$ketdok = post("ketdok");
$ketdoksuhan = post("ketdoksuhan");
$ketdokvp = post("ketdokvp");
$suhanketdok = post("suhanketdok");
$vpketdok = post("vpketdok");
$id_biodata_titipan = post("id_biodata_titipan");
$nama_titipan = post("nama_titipan");
$tgl_terbang_titipan = post("tgl_terbang_titipan");
$no_suhan_titipan = post("no_suhan_titipan");
$no_vp_titipan = post("no_vp_titipan");
$id_biodata_dititipkan = post("id_biodata_dititipkan");
$nama_dititipkan = post("nama_dititipkan");
$tgl_terbang_dititipkan = post("tgl_terbang_dititipkan");
$no_suhan_dititipkan = post("no_suhan_dititipkan");
$id_biodata_dititipkan2 = post("id_biodata_dititipkan2");
$nama_dititipkan2 = post("nama_dititipkan2");
$tgl_terbang_dititipkan2 = post("tgl_terbang_dititipkan2");
$no_vp_dititipkan = post("no_vp_dititipkan");
$isidok1 = post("isidok1");
$statdok1 = post("statdok1");
$isidok2 = post("isidok2");
$statdok2 = post("statdok2");
$isidok3 = post("isidok3");
$statdok3 = post("statdok3");
$isidok4 = post("isidok4");
$statdok4 = post("statdok4");
$isidok5 = post("isidok5");
$statdok5 = post("statdok5");
$isidok6 = post("isidok6");
$statdok6 = post("statdok6");
$isidok7 = post("isidok7");
$statdok7 = post("statdok7");
$isidok8 = post("isidok8");
$statdok8 = post("statdok8");
$apendik_a = post("apendik_a");
$apendik_b = post("apendik_b");
$apendik_c = post("apendik_c");
$apendik_d = post("apendik_d");
$tanggal_input = post("tanggal_input");

        

        $simpan = $this->db->query("
            INSERT INTO visa
            (id_biodata,novisa,negara,jabatan,kocokan,finger,terima,statuskocokan,statusfinger,statusterima,tglberlaku,tglsampai,pap,nopap,statuspap,ktkln,statusktkln,tanggalterbang,id_terbang,statustgl,tiket,statusterbang,tglberangkat,airport,tglterimadok,statsuhandok,tempatsuhandok,statvpdok,tempatvpdok,jddok,arcdok,icdok,ketdok,ketdoksuhan,ketdokvp,suhanketdok,vpketdok,id_biodata_titipan,nama_titipan,tgl_terbang_titipan,no_suhan_titipan,no_vp_titipan,id_biodata_dititipkan,nama_dititipkan,tgl_terbang_dititipkan,no_suhan_dititipkan,id_biodata_dititipkan2,nama_dititipkan2,tgl_terbang_dititipkan2,no_vp_dititipkan,isidok1,statdok1,isidok2,statdok2,isidok3,statdok3,isidok4,statdok4,isidok5,statdok5,isidok6,statdok6,isidok7,statdok7,isidok8,statdok8,apendik_a,apendik_b,apendik_c,apendik_d,tanggal_input) VALUES ('$id_biodata','$novisa','$negara','$jabatan','$kocokan','$finger','$terima','$statuskocokan','$statusfinger','$statusterima','$tglberlaku','$tglsampai','$pap','$nopap','$statuspap','$ktkln','$statusktkln','$tanggalterbang','$id_terbang','$statustgl','$tiket','$statusterbang','$tglberangkat','$airport','$tglterimadok','$statsuhandok','$tempatsuhandok','$statvpdok','$tempatvpdok','$jddok','$arcdok','$icdok','$ketdok','$ketdoksuhan','$ketdokvp','$suhanketdok','$vpketdok','$id_biodata_titipan','$nama_titipan','$tgl_terbang_titipan','$no_suhan_titipan','$no_vp_titipan','$id_biodata_dititipkan','$nama_dititipkan','$tgl_terbang_dititipkan','$no_suhan_dititipkan','$id_biodata_dititipkan2','$nama_dititipkan2','$tgl_terbang_dititipkan2','$no_vp_dititipkan','$isidok1','$statdok1','$isidok2','$statdok2','$isidok3','$statdok3','$isidok4','$statdok4','$isidok5','$statdok5','$isidok6','$statdok6','$isidok7','$statdok7','$isidok8','$statdok8','$apendik_a','$apendik_b','$apendik_c','$apendik_d','$tanggal_input')
        ");
    

        if($simpan){
            redirect('admin/visa');
        }
    }

    public function update(){
          $key = post('id_visa'); $id_biodata = post("id_biodata");
$novisa = post("novisa");
$negara = post("negara");
$jabatan = post("jabatan");
$kocokan = post("kocokan");
$finger = post("finger");
$terima = post("terima");
$statuskocokan = post("statuskocokan");
$statusfinger = post("statusfinger");
$statusterima = post("statusterima");
$tglberlaku = post("tglberlaku");
$tglsampai = post("tglsampai");
$pap = post("pap");
$nopap = post("nopap");
$statuspap = post("statuspap");
$ktkln = post("ktkln");
$statusktkln = post("statusktkln");
$tanggalterbang = post("tanggalterbang");
$id_terbang = post("id_terbang");
$statustgl = post("statustgl");
$tiket = post("tiket");
$statusterbang = post("statusterbang");
$tglberangkat = post("tglberangkat");
$airport = post("airport");
$tglterimadok = post("tglterimadok");
$statsuhandok = post("statsuhandok");
$tempatsuhandok = post("tempatsuhandok");
$statvpdok = post("statvpdok");
$tempatvpdok = post("tempatvpdok");
$jddok = post("jddok");
$arcdok = post("arcdok");
$icdok = post("icdok");
$ketdok = post("ketdok");
$ketdoksuhan = post("ketdoksuhan");
$ketdokvp = post("ketdokvp");
$suhanketdok = post("suhanketdok");
$vpketdok = post("vpketdok");
$id_biodata_titipan = post("id_biodata_titipan");
$nama_titipan = post("nama_titipan");
$tgl_terbang_titipan = post("tgl_terbang_titipan");
$no_suhan_titipan = post("no_suhan_titipan");
$no_vp_titipan = post("no_vp_titipan");
$id_biodata_dititipkan = post("id_biodata_dititipkan");
$nama_dititipkan = post("nama_dititipkan");
$tgl_terbang_dititipkan = post("tgl_terbang_dititipkan");
$no_suhan_dititipkan = post("no_suhan_dititipkan");
$id_biodata_dititipkan2 = post("id_biodata_dititipkan2");
$nama_dititipkan2 = post("nama_dititipkan2");
$tgl_terbang_dititipkan2 = post("tgl_terbang_dititipkan2");
$no_vp_dititipkan = post("no_vp_dititipkan");
$isidok1 = post("isidok1");
$statdok1 = post("statdok1");
$isidok2 = post("isidok2");
$statdok2 = post("statdok2");
$isidok3 = post("isidok3");
$statdok3 = post("statdok3");
$isidok4 = post("isidok4");
$statdok4 = post("statdok4");
$isidok5 = post("isidok5");
$statdok5 = post("statdok5");
$isidok6 = post("isidok6");
$statdok6 = post("statdok6");
$isidok7 = post("isidok7");
$statdok7 = post("statdok7");
$isidok8 = post("isidok8");
$statdok8 = post("statdok8");
$apendik_a = post("apendik_a");
$apendik_b = post("apendik_b");
$apendik_c = post("apendik_c");
$apendik_d = post("apendik_d");
$tanggal_input = post("tanggal_input");

        $simpan = $this->db->query("
            UPDATE visa SET  id_biodata = '$id_biodata', novisa = '$novisa', negara = '$negara', jabatan = '$jabatan', kocokan = '$kocokan', finger = '$finger', terima = '$terima', statuskocokan = '$statuskocokan', statusfinger = '$statusfinger', statusterima = '$statusterima', tglberlaku = '$tglberlaku', tglsampai = '$tglsampai', pap = '$pap', nopap = '$nopap', statuspap = '$statuspap', ktkln = '$ktkln', statusktkln = '$statusktkln', tanggalterbang = '$tanggalterbang', id_terbang = '$id_terbang', statustgl = '$statustgl', tiket = '$tiket', statusterbang = '$statusterbang', tglberangkat = '$tglberangkat', airport = '$airport', tglterimadok = '$tglterimadok', statsuhandok = '$statsuhandok', tempatsuhandok = '$tempatsuhandok', statvpdok = '$statvpdok', tempatvpdok = '$tempatvpdok', jddok = '$jddok', arcdok = '$arcdok', icdok = '$icdok', ketdok = '$ketdok', ketdoksuhan = '$ketdoksuhan', ketdokvp = '$ketdokvp', suhanketdok = '$suhanketdok', vpketdok = '$vpketdok', id_biodata_titipan = '$id_biodata_titipan', nama_titipan = '$nama_titipan', tgl_terbang_titipan = '$tgl_terbang_titipan', no_suhan_titipan = '$no_suhan_titipan', no_vp_titipan = '$no_vp_titipan', id_biodata_dititipkan = '$id_biodata_dititipkan', nama_dititipkan = '$nama_dititipkan', tgl_terbang_dititipkan = '$tgl_terbang_dititipkan', no_suhan_dititipkan = '$no_suhan_dititipkan', id_biodata_dititipkan2 = '$id_biodata_dititipkan2', nama_dititipkan2 = '$nama_dititipkan2', tgl_terbang_dititipkan2 = '$tgl_terbang_dititipkan2', no_vp_dititipkan = '$no_vp_dititipkan', isidok1 = '$isidok1', statdok1 = '$statdok1', isidok2 = '$isidok2', statdok2 = '$statdok2', isidok3 = '$isidok3', statdok3 = '$statdok3', isidok4 = '$isidok4', statdok4 = '$statdok4', isidok5 = '$isidok5', statdok5 = '$statdok5', isidok6 = '$isidok6', statdok6 = '$statdok6', isidok7 = '$isidok7', statdok7 = '$statdok7', isidok8 = '$isidok8', statdok8 = '$statdok8', apendik_a = '$apendik_a', apendik_b = '$apendik_b', apendik_c = '$apendik_c', apendik_d = '$apendik_d', tanggal_input = '$tanggal_input' WHERE id_visa = '$key'
            ");
    

        if($simpan){
            redirect('admin/visa');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-visa.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","novisa","negara","jabatan","kocokan","finger","terima","statuskocokan","statusfinger","statusterima","tglberlaku","tglsampai","pap","nopap","statuspap","ktkln","statusktkln","tanggalterbang","id terbang","statustgl","tiket","statusterbang","tglberangkat","airport","tglterimadok","statsuhandok","tempatsuhandok","statvpdok","tempatvpdok","jddok","arcdok","icdok","ketdok","ketdoksuhan","ketdokvp","suhanketdok","vpketdok","id biodata titipan","nama titipan","tgl terbang titipan","no suhan titipan","no vp titipan","id biodata dititipkan","nama dititipkan","tgl terbang dititipkan","no suhan dititipkan","id biodata dititipkan2","nama dititipkan2","tgl terbang dititipkan2","no vp dititipkan","isidok1","statdok1","isidok2","statdok2","isidok3","statdok3","isidok4","statdok4","isidok5","statdok5","isidok6","statdok6","isidok7","statdok7","isidok8","statdok8","apendik a","apendik b","apendik c","apendik d","tanggal input", "action"];

        $calldata = ["id_biodata","novisa","negara","jabatan","kocokan","finger","terima","statuskocokan","statusfinger","statusterima","tglberlaku","tglsampai","pap","nopap","statuspap","ktkln","statusktkln","tanggalterbang","id_terbang","statustgl","tiket","statusterbang","tglberangkat","airport","tglterimadok","statsuhandok","tempatsuhandok","statvpdok","tempatvpdok","jddok","arcdok","icdok","ketdok","ketdoksuhan","ketdokvp","suhanketdok","vpketdok","id_biodata_titipan","nama_titipan","tgl_terbang_titipan","no_suhan_titipan","no_vp_titipan","id_biodata_dititipkan","nama_dititipkan","tgl_terbang_dititipkan","no_suhan_dititipkan","id_biodata_dititipkan2","nama_dititipkan2","tgl_terbang_dititipkan2","no_vp_dititipkan","isidok1","statdok1","isidok2","statdok2","isidok3","statdok3","isidok4","statdok4","isidok5","statdok5","isidok6","statdok6","isidok7","statdok7","isidok8","statdok8","apendik_a","apendik_b","apendik_c","apendik_d","tanggal_input"];

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
