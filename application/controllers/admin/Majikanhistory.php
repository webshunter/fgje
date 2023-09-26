<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Majikanhistory extends CI_Controller {

	private $table1 = 'majikanhistory';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/majikanhistory/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","tgl dibuat","id majikan","id biodata","kode group","kode agen","kode majikan","kode suhan","kode visapermit","namamajikan","namataiwan","alamatmajikan","notelpmajikan","tglterpilih","statustglterbang","JD","tglterbang","id majikannya","id suhan","id visapermit","kode visa","tglpk","tglterbitsuhan","tglterimasuhan","tglterbitpermit","tglterimapermit","insterimasuhan","tglinfosuhan","tgltransaksisuhan","instransaksisuhan","insterimapermit","tglinfopermit","tgltransaksipermit","instransaksipermit","ketsuhan","ketpermit","simpansuhan","kirimsuhan","simpanvisapermit","kirimvisapermit","tglsimpansuhan","statsuhan","tglsimpanvp","statvp","bandaratuju","tanggal input","tgl scan ke indo","tgltrmspbg", "action"]);
        $this->Createtable->order_set('0, 47');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/majikanhistory/view', $data);
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
                        'row' => ["tgl_dibuat","id_majikan","id_biodata","kode_group","kode_agen","kode_majikan","kode_suhan","kode_visapermit","namamajikan","namataiwan","alamatmajikan","notelpmajikan","tglterpilih","statustglterbang","JD","tglterbang","id_majikannya","id_suhan","id_visapermit","kode_visa","tglpk","tglterbitsuhan","tglterimasuhan","tglterbitpermit","tglterimapermit","insterimasuhan","tglinfosuhan","tgltransaksisuhan","instransaksisuhan","insterimapermit","tglinfopermit","tgltransaksipermit","instransaksipermit","ketsuhan","ketpermit","simpansuhan","kirimsuhan","simpanvisapermit","kirimvisapermit","tglsimpansuhan","statsuhan","tglsimpanvp","statvp","bandaratuju","tanggal_input","tgl_scan_ke_indo","tgltrmspbg"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["tgl_dibuat","id_majikan","id_biodata","kode_group","kode_agen","kode_majikan","kode_suhan","kode_visapermit","namamajikan","namataiwan","alamatmajikan","notelpmajikan","tglterpilih","statustglterbang","JD","tglterbang","id_majikannya","id_suhan","id_visapermit","kode_visa","tglpk","tglterbitsuhan","tglterimasuhan","tglterbitpermit","tglterimapermit","insterimasuhan","tglinfosuhan","tgltransaksisuhan","instransaksisuhan","insterimapermit","tglinfopermit","tgltransaksipermit","instransaksipermit","ketsuhan","ketpermit","simpansuhan","kirimsuhan","simpanvisapermit","kirimvisapermit","tglsimpansuhan","statsuhan","tglsimpanvp","statvp","bandaratuju","tanggal_input","tgl_scan_ke_indo","tgltrmspbg"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tgl_dibuat", "2"=>"id_majikan", "3"=>"id_biodata", "4"=>"kode_group", "5"=>"kode_agen", "6"=>"kode_majikan", "7"=>"kode_suhan", "8"=>"kode_visapermit", "9"=>"namamajikan", "10"=>"namataiwan", "11"=>"alamatmajikan", "12"=>"notelpmajikan", "13"=>"tglterpilih", "14"=>"statustglterbang", "15"=>"JD", "16"=>"tglterbang", "17"=>"id_majikannya", "18"=>"id_suhan", "19"=>"id_visapermit", "20"=>"kode_visa", "21"=>"tglpk", "22"=>"tglterbitsuhan", "23"=>"tglterimasuhan", "24"=>"tglterbitpermit", "25"=>"tglterimapermit", "26"=>"insterimasuhan", "27"=>"tglinfosuhan", "28"=>"tgltransaksisuhan", "29"=>"instransaksisuhan", "30"=>"insterimapermit", "31"=>"tglinfopermit", "32"=>"tgltransaksipermit", "33"=>"instransaksipermit", "34"=>"ketsuhan", "35"=>"ketpermit", "36"=>"simpansuhan", "37"=>"kirimsuhan", "38"=>"simpanvisapermit", "39"=>"kirimvisapermit", "40"=>"tglsimpansuhan", "41"=>"statsuhan", "42"=>"tglsimpanvp", "43"=>"statvp", "44"=>"bandaratuju", "45"=>"tanggal_input", "46"=>"tgl_scan_ke_indo", "47"=>"tgltrmspbg"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/majikanhistory/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/majikanhistory/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $tgl_dibuat = post("tgl_dibuat");
$id_majikan = post("id_majikan");
$id_biodata = post("id_biodata");
$kode_group = post("kode_group");
$kode_agen = post("kode_agen");
$kode_majikan = post("kode_majikan");
$kode_suhan = post("kode_suhan");
$kode_visapermit = post("kode_visapermit");
$namamajikan = post("namamajikan");
$namataiwan = post("namataiwan");
$alamatmajikan = post("alamatmajikan");
$notelpmajikan = post("notelpmajikan");
$tglterpilih = post("tglterpilih");
$statustglterbang = post("statustglterbang");
$JD = post("JD");
$tglterbang = post("tglterbang");
$id_majikannya = post("id_majikannya");
$id_suhan = post("id_suhan");
$id_visapermit = post("id_visapermit");
$kode_visa = post("kode_visa");
$tglpk = post("tglpk");
$tglterbitsuhan = post("tglterbitsuhan");
$tglterimasuhan = post("tglterimasuhan");
$tglterbitpermit = post("tglterbitpermit");
$tglterimapermit = post("tglterimapermit");
$insterimasuhan = post("insterimasuhan");
$tglinfosuhan = post("tglinfosuhan");
$tgltransaksisuhan = post("tgltransaksisuhan");
$instransaksisuhan = post("instransaksisuhan");
$insterimapermit = post("insterimapermit");
$tglinfopermit = post("tglinfopermit");
$tgltransaksipermit = post("tgltransaksipermit");
$instransaksipermit = post("instransaksipermit");
$ketsuhan = post("ketsuhan");
$ketpermit = post("ketpermit");
$simpansuhan = post("simpansuhan");
$kirimsuhan = post("kirimsuhan");
$simpanvisapermit = post("simpanvisapermit");
$kirimvisapermit = post("kirimvisapermit");
$tglsimpansuhan = post("tglsimpansuhan");
$statsuhan = post("statsuhan");
$tglsimpanvp = post("tglsimpanvp");
$statvp = post("statvp");
$bandaratuju = post("bandaratuju");
$tanggal_input = post("tanggal_input");
$tgl_scan_ke_indo = post("tgl_scan_ke_indo");
$tgltrmspbg = post("tgltrmspbg");

        

        $simpan = $this->db->query("
            INSERT INTO majikanhistory
            (tgl_dibuat,id_majikan,id_biodata,kode_group,kode_agen,kode_majikan,kode_suhan,kode_visapermit,namamajikan,namataiwan,alamatmajikan,notelpmajikan,tglterpilih,statustglterbang,JD,tglterbang,id_majikannya,id_suhan,id_visapermit,kode_visa,tglpk,tglterbitsuhan,tglterimasuhan,tglterbitpermit,tglterimapermit,insterimasuhan,tglinfosuhan,tgltransaksisuhan,instransaksisuhan,insterimapermit,tglinfopermit,tgltransaksipermit,instransaksipermit,ketsuhan,ketpermit,simpansuhan,kirimsuhan,simpanvisapermit,kirimvisapermit,tglsimpansuhan,statsuhan,tglsimpanvp,statvp,bandaratuju,tanggal_input,tgl_scan_ke_indo,tgltrmspbg) VALUES ('$tgl_dibuat','$id_majikan','$id_biodata','$kode_group','$kode_agen','$kode_majikan','$kode_suhan','$kode_visapermit','$namamajikan','$namataiwan','$alamatmajikan','$notelpmajikan','$tglterpilih','$statustglterbang','$JD','$tglterbang','$id_majikannya','$id_suhan','$id_visapermit','$kode_visa','$tglpk','$tglterbitsuhan','$tglterimasuhan','$tglterbitpermit','$tglterimapermit','$insterimasuhan','$tglinfosuhan','$tgltransaksisuhan','$instransaksisuhan','$insterimapermit','$tglinfopermit','$tgltransaksipermit','$instransaksipermit','$ketsuhan','$ketpermit','$simpansuhan','$kirimsuhan','$simpanvisapermit','$kirimvisapermit','$tglsimpansuhan','$statsuhan','$tglsimpanvp','$statvp','$bandaratuju','$tanggal_input','$tgl_scan_ke_indo','$tgltrmspbg')
        ");
    

        if($simpan){
            redirect('admin/majikanhistory');
        }
    }

    public function update(){
          $key = post('id'); $tgl_dibuat = post("tgl_dibuat");
$id_majikan = post("id_majikan");
$id_biodata = post("id_biodata");
$kode_group = post("kode_group");
$kode_agen = post("kode_agen");
$kode_majikan = post("kode_majikan");
$kode_suhan = post("kode_suhan");
$kode_visapermit = post("kode_visapermit");
$namamajikan = post("namamajikan");
$namataiwan = post("namataiwan");
$alamatmajikan = post("alamatmajikan");
$notelpmajikan = post("notelpmajikan");
$tglterpilih = post("tglterpilih");
$statustglterbang = post("statustglterbang");
$JD = post("JD");
$tglterbang = post("tglterbang");
$id_majikannya = post("id_majikannya");
$id_suhan = post("id_suhan");
$id_visapermit = post("id_visapermit");
$kode_visa = post("kode_visa");
$tglpk = post("tglpk");
$tglterbitsuhan = post("tglterbitsuhan");
$tglterimasuhan = post("tglterimasuhan");
$tglterbitpermit = post("tglterbitpermit");
$tglterimapermit = post("tglterimapermit");
$insterimasuhan = post("insterimasuhan");
$tglinfosuhan = post("tglinfosuhan");
$tgltransaksisuhan = post("tgltransaksisuhan");
$instransaksisuhan = post("instransaksisuhan");
$insterimapermit = post("insterimapermit");
$tglinfopermit = post("tglinfopermit");
$tgltransaksipermit = post("tgltransaksipermit");
$instransaksipermit = post("instransaksipermit");
$ketsuhan = post("ketsuhan");
$ketpermit = post("ketpermit");
$simpansuhan = post("simpansuhan");
$kirimsuhan = post("kirimsuhan");
$simpanvisapermit = post("simpanvisapermit");
$kirimvisapermit = post("kirimvisapermit");
$tglsimpansuhan = post("tglsimpansuhan");
$statsuhan = post("statsuhan");
$tglsimpanvp = post("tglsimpanvp");
$statvp = post("statvp");
$bandaratuju = post("bandaratuju");
$tanggal_input = post("tanggal_input");
$tgl_scan_ke_indo = post("tgl_scan_ke_indo");
$tgltrmspbg = post("tgltrmspbg");

        $simpan = $this->db->query("
            UPDATE majikanhistory SET  tgl_dibuat = '$tgl_dibuat', id_majikan = '$id_majikan', id_biodata = '$id_biodata', kode_group = '$kode_group', kode_agen = '$kode_agen', kode_majikan = '$kode_majikan', kode_suhan = '$kode_suhan', kode_visapermit = '$kode_visapermit', namamajikan = '$namamajikan', namataiwan = '$namataiwan', alamatmajikan = '$alamatmajikan', notelpmajikan = '$notelpmajikan', tglterpilih = '$tglterpilih', statustglterbang = '$statustglterbang', JD = '$JD', tglterbang = '$tglterbang', id_majikannya = '$id_majikannya', id_suhan = '$id_suhan', id_visapermit = '$id_visapermit', kode_visa = '$kode_visa', tglpk = '$tglpk', tglterbitsuhan = '$tglterbitsuhan', tglterimasuhan = '$tglterimasuhan', tglterbitpermit = '$tglterbitpermit', tglterimapermit = '$tglterimapermit', insterimasuhan = '$insterimasuhan', tglinfosuhan = '$tglinfosuhan', tgltransaksisuhan = '$tgltransaksisuhan', instransaksisuhan = '$instransaksisuhan', insterimapermit = '$insterimapermit', tglinfopermit = '$tglinfopermit', tgltransaksipermit = '$tgltransaksipermit', instransaksipermit = '$instransaksipermit', ketsuhan = '$ketsuhan', ketpermit = '$ketpermit', simpansuhan = '$simpansuhan', kirimsuhan = '$kirimsuhan', simpanvisapermit = '$simpanvisapermit', kirimvisapermit = '$kirimvisapermit', tglsimpansuhan = '$tglsimpansuhan', statsuhan = '$statsuhan', tglsimpanvp = '$tglsimpanvp', statvp = '$statvp', bandaratuju = '$bandaratuju', tanggal_input = '$tanggal_input', tgl_scan_ke_indo = '$tgl_scan_ke_indo', tgltrmspbg = '$tgltrmspbg' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/majikanhistory');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-majikanhistory.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","tgl dibuat","id majikan","id biodata","kode group","kode agen","kode majikan","kode suhan","kode visapermit","namamajikan","namataiwan","alamatmajikan","notelpmajikan","tglterpilih","statustglterbang","JD","tglterbang","id majikannya","id suhan","id visapermit","kode visa","tglpk","tglterbitsuhan","tglterimasuhan","tglterbitpermit","tglterimapermit","insterimasuhan","tglinfosuhan","tgltransaksisuhan","instransaksisuhan","insterimapermit","tglinfopermit","tgltransaksipermit","instransaksipermit","ketsuhan","ketpermit","simpansuhan","kirimsuhan","simpanvisapermit","kirimvisapermit","tglsimpansuhan","statsuhan","tglsimpanvp","statvp","bandaratuju","tanggal input","tgl scan ke indo","tgltrmspbg", "action"];

        $calldata = ["tgl_dibuat","id_majikan","id_biodata","kode_group","kode_agen","kode_majikan","kode_suhan","kode_visapermit","namamajikan","namataiwan","alamatmajikan","notelpmajikan","tglterpilih","statustglterbang","JD","tglterbang","id_majikannya","id_suhan","id_visapermit","kode_visa","tglpk","tglterbitsuhan","tglterimasuhan","tglterbitpermit","tglterimapermit","insterimasuhan","tglinfosuhan","tgltransaksisuhan","instransaksisuhan","insterimapermit","tglinfopermit","tgltransaksipermit","instransaksipermit","ketsuhan","ketpermit","simpansuhan","kirimsuhan","simpanvisapermit","kirimvisapermit","tglsimpansuhan","statsuhan","tglsimpanvp","statvp","bandaratuju","tanggal_input","tgl_scan_ke_indo","tgltrmspbg"];

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
