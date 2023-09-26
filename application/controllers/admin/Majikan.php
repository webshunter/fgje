<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Majikan extends CI_Controller {

	private $table1 = 'majikan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/majikan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","kode group","kode agen","kode majikan","kode suhan","kode visapermit","namamajikan","namataiwan","alamatmajikan","notelpmajikan","tglterpilih","statustglterbang","JD","tglterbang","id majikannya","id suhan","id visapermit","kode visa","tglpk","tglterbitsuhan","tglterimasuhan","tglterbitpermit","tglterimapermit","insterimasuhan","tglinfosuhan","tgltransaksisuhan","instransaksisuhan","insterimapermit","tglinfopermit","tgltransaksipermit","instransaksipermit","ketsuhan","ketpermit","simpansuhan","kirimsuhan","simpanvisapermit","kirimvisapermit","tglsimpansuhan","statsuhan","tglsimpanvp","statvp","bandaratuju","tanggal input","tgl scan ke indo","tgltrmspbg", "action"]);
        $this->Createtable->order_set('0, 45');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/majikan/view', $data);
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
                        'row' => ["id_biodata","kode_group","kode_agen","kode_majikan","kode_suhan","kode_visapermit","namamajikan","namataiwan","alamatmajikan","notelpmajikan","tglterpilih","statustglterbang","JD","tglterbang","id_majikannya","id_suhan","id_visapermit","kode_visa","tglpk","tglterbitsuhan","tglterimasuhan","tglterbitpermit","tglterimapermit","insterimasuhan","tglinfosuhan","tgltransaksisuhan","instransaksisuhan","insterimapermit","tglinfopermit","tgltransaksipermit","instransaksipermit","ketsuhan","ketpermit","simpansuhan","kirimsuhan","simpanvisapermit","kirimvisapermit","tglsimpansuhan","statsuhan","tglsimpanvp","statvp","bandaratuju","tanggal_input","tgl_scan_ke_indo","tgltrmspbg"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_majikan',
                        'data' => ["id_biodata","kode_group","kode_agen","kode_majikan","kode_suhan","kode_visapermit","namamajikan","namataiwan","alamatmajikan","notelpmajikan","tglterpilih","statustglterbang","JD","tglterbang","id_majikannya","id_suhan","id_visapermit","kode_visa","tglpk","tglterbitsuhan","tglterimasuhan","tglterbitpermit","tglterimapermit","insterimasuhan","tglinfosuhan","tgltransaksisuhan","instransaksisuhan","insterimapermit","tglinfopermit","tgltransaksipermit","instransaksipermit","ketsuhan","ketpermit","simpansuhan","kirimsuhan","simpanvisapermit","kirimvisapermit","tglsimpansuhan","statsuhan","tglsimpanvp","statvp","bandaratuju","tanggal_input","tgl_scan_ke_indo","tgltrmspbg"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_majikan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"kode_group", "3"=>"kode_agen", "4"=>"kode_majikan", "5"=>"kode_suhan", "6"=>"kode_visapermit", "7"=>"namamajikan", "8"=>"namataiwan", "9"=>"alamatmajikan", "10"=>"notelpmajikan", "11"=>"tglterpilih", "12"=>"statustglterbang", "13"=>"JD", "14"=>"tglterbang", "15"=>"id_majikannya", "16"=>"id_suhan", "17"=>"id_visapermit", "18"=>"kode_visa", "19"=>"tglpk", "20"=>"tglterbitsuhan", "21"=>"tglterimasuhan", "22"=>"tglterbitpermit", "23"=>"tglterimapermit", "24"=>"insterimasuhan", "25"=>"tglinfosuhan", "26"=>"tgltransaksisuhan", "27"=>"instransaksisuhan", "28"=>"insterimapermit", "29"=>"tglinfopermit", "30"=>"tgltransaksipermit", "31"=>"instransaksipermit", "32"=>"ketsuhan", "33"=>"ketpermit", "34"=>"simpansuhan", "35"=>"kirimsuhan", "36"=>"simpanvisapermit", "37"=>"kirimvisapermit", "38"=>"tglsimpansuhan", "39"=>"statsuhan", "40"=>"tglsimpanvp", "41"=>"statvp", "42"=>"bandaratuju", "43"=>"tanggal_input", "44"=>"tgl_scan_ke_indo", "45"=>"tgltrmspbg"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_majikan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/majikan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_majikan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/majikan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
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
            INSERT INTO majikan
            (id_biodata,kode_group,kode_agen,kode_majikan,kode_suhan,kode_visapermit,namamajikan,namataiwan,alamatmajikan,notelpmajikan,tglterpilih,statustglterbang,JD,tglterbang,id_majikannya,id_suhan,id_visapermit,kode_visa,tglpk,tglterbitsuhan,tglterimasuhan,tglterbitpermit,tglterimapermit,insterimasuhan,tglinfosuhan,tgltransaksisuhan,instransaksisuhan,insterimapermit,tglinfopermit,tgltransaksipermit,instransaksipermit,ketsuhan,ketpermit,simpansuhan,kirimsuhan,simpanvisapermit,kirimvisapermit,tglsimpansuhan,statsuhan,tglsimpanvp,statvp,bandaratuju,tanggal_input,tgl_scan_ke_indo,tgltrmspbg) VALUES ('$id_biodata','$kode_group','$kode_agen','$kode_majikan','$kode_suhan','$kode_visapermit','$namamajikan','$namataiwan','$alamatmajikan','$notelpmajikan','$tglterpilih','$statustglterbang','$JD','$tglterbang','$id_majikannya','$id_suhan','$id_visapermit','$kode_visa','$tglpk','$tglterbitsuhan','$tglterimasuhan','$tglterbitpermit','$tglterimapermit','$insterimasuhan','$tglinfosuhan','$tgltransaksisuhan','$instransaksisuhan','$insterimapermit','$tglinfopermit','$tgltransaksipermit','$instransaksipermit','$ketsuhan','$ketpermit','$simpansuhan','$kirimsuhan','$simpanvisapermit','$kirimvisapermit','$tglsimpansuhan','$statsuhan','$tglsimpanvp','$statvp','$bandaratuju','$tanggal_input','$tgl_scan_ke_indo','$tgltrmspbg')
        ");
    

        if($simpan){
            redirect('admin/majikan');
        }
    }

    public function update(){
          $key = post('id_majikan'); $id_biodata = post("id_biodata");
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
            UPDATE majikan SET  id_biodata = '$id_biodata', kode_group = '$kode_group', kode_agen = '$kode_agen', kode_majikan = '$kode_majikan', kode_suhan = '$kode_suhan', kode_visapermit = '$kode_visapermit', namamajikan = '$namamajikan', namataiwan = '$namataiwan', alamatmajikan = '$alamatmajikan', notelpmajikan = '$notelpmajikan', tglterpilih = '$tglterpilih', statustglterbang = '$statustglterbang', JD = '$JD', tglterbang = '$tglterbang', id_majikannya = '$id_majikannya', id_suhan = '$id_suhan', id_visapermit = '$id_visapermit', kode_visa = '$kode_visa', tglpk = '$tglpk', tglterbitsuhan = '$tglterbitsuhan', tglterimasuhan = '$tglterimasuhan', tglterbitpermit = '$tglterbitpermit', tglterimapermit = '$tglterimapermit', insterimasuhan = '$insterimasuhan', tglinfosuhan = '$tglinfosuhan', tgltransaksisuhan = '$tgltransaksisuhan', instransaksisuhan = '$instransaksisuhan', insterimapermit = '$insterimapermit', tglinfopermit = '$tglinfopermit', tgltransaksipermit = '$tgltransaksipermit', instransaksipermit = '$instransaksipermit', ketsuhan = '$ketsuhan', ketpermit = '$ketpermit', simpansuhan = '$simpansuhan', kirimsuhan = '$kirimsuhan', simpanvisapermit = '$simpanvisapermit', kirimvisapermit = '$kirimvisapermit', tglsimpansuhan = '$tglsimpansuhan', statsuhan = '$statsuhan', tglsimpanvp = '$tglsimpanvp', statvp = '$statvp', bandaratuju = '$bandaratuju', tanggal_input = '$tanggal_input', tgl_scan_ke_indo = '$tgl_scan_ke_indo', tgltrmspbg = '$tgltrmspbg' WHERE id_majikan = '$key'
            ");
    

        if($simpan){
            redirect('admin/majikan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-majikan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","kode group","kode agen","kode majikan","kode suhan","kode visapermit","namamajikan","namataiwan","alamatmajikan","notelpmajikan","tglterpilih","statustglterbang","JD","tglterbang","id majikannya","id suhan","id visapermit","kode visa","tglpk","tglterbitsuhan","tglterimasuhan","tglterbitpermit","tglterimapermit","insterimasuhan","tglinfosuhan","tgltransaksisuhan","instransaksisuhan","insterimapermit","tglinfopermit","tgltransaksipermit","instransaksipermit","ketsuhan","ketpermit","simpansuhan","kirimsuhan","simpanvisapermit","kirimvisapermit","tglsimpansuhan","statsuhan","tglsimpanvp","statvp","bandaratuju","tanggal input","tgl scan ke indo","tgltrmspbg", "action"];

        $calldata = ["id_biodata","kode_group","kode_agen","kode_majikan","kode_suhan","kode_visapermit","namamajikan","namataiwan","alamatmajikan","notelpmajikan","tglterpilih","statustglterbang","JD","tglterbang","id_majikannya","id_suhan","id_visapermit","kode_visa","tglpk","tglterbitsuhan","tglterimasuhan","tglterbitpermit","tglterimapermit","insterimasuhan","tglinfosuhan","tgltransaksisuhan","instransaksisuhan","insterimapermit","tglinfopermit","tgltransaksipermit","instransaksipermit","ketsuhan","ketpermit","simpansuhan","kirimsuhan","simpanvisapermit","kirimvisapermit","tglsimpansuhan","statsuhan","tglsimpanvp","statvp","bandaratuju","tanggal_input","tgl_scan_ke_indo","tgltrmspbg"];

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
