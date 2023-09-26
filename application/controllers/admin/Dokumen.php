<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dokumen extends CI_Controller {

	private $table1 = 'dokumen';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/dokumen/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","ktp","terakhir ktp","kk","terakhir kk","akte","terakhir akte","ijazah","terakhir ijazah","si","terakhir si","sn","terakhir sn","paspor","terakhir paspor","arc","terakhir arc","asuransi","terakhir asuransi","medikal1","terakhir medikal1","medikal2","terakhir medikal2","medikal3","terakhir medikal3","skck","terakhir skck","fingerprint","terakhir fingerprint","visa","terakhir visa","pap","terakhir pap", "action"]);
        $this->Createtable->order_set('0, 33');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/dokumen/view', $data);
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
                        'row' => ["id_biodata","ktp","terakhir_ktp","kk","terakhir_kk","akte","terakhir_akte","ijazah","terakhir_ijazah","si","terakhir_si","sn","terakhir_sn","paspor","terakhir_paspor","arc","terakhir_arc","asuransi","terakhir_asuransi","medikal1","terakhir_medikal1","medikal2","terakhir_medikal2","medikal3","terakhir_medikal3","skck","terakhir_skck","fingerprint","terakhir_fingerprint","visa","terakhir_visa","pap","terakhir_pap"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_dokumen',
                        'data' => ["id_biodata","ktp","terakhir_ktp","kk","terakhir_kk","akte","terakhir_akte","ijazah","terakhir_ijazah","si","terakhir_si","sn","terakhir_sn","paspor","terakhir_paspor","arc","terakhir_arc","asuransi","terakhir_asuransi","medikal1","terakhir_medikal1","medikal2","terakhir_medikal2","medikal3","terakhir_medikal3","skck","terakhir_skck","fingerprint","terakhir_fingerprint","visa","terakhir_visa","pap","terakhir_pap"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_dokumen', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"ktp", "3"=>"terakhir_ktp", "4"=>"kk", "5"=>"terakhir_kk", "6"=>"akte", "7"=>"terakhir_akte", "8"=>"ijazah", "9"=>"terakhir_ijazah", "10"=>"si", "11"=>"terakhir_si", "12"=>"sn", "13"=>"terakhir_sn", "14"=>"paspor", "15"=>"terakhir_paspor", "16"=>"arc", "17"=>"terakhir_arc", "18"=>"asuransi", "19"=>"terakhir_asuransi", "20"=>"medikal1", "21"=>"terakhir_medikal1", "22"=>"medikal2", "23"=>"terakhir_medikal2", "24"=>"medikal3", "25"=>"terakhir_medikal3", "26"=>"skck", "27"=>"terakhir_skck", "28"=>"fingerprint", "29"=>"terakhir_fingerprint", "30"=>"visa", "31"=>"terakhir_visa", "32"=>"pap", "33"=>"terakhir_pap"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_dokumen = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/dokumen/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_dokumen = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/dokumen/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$ktp = post("ktp");
$terakhir_ktp = post("terakhir_ktp");
$kk = post("kk");
$terakhir_kk = post("terakhir_kk");
$akte = post("akte");
$terakhir_akte = post("terakhir_akte");
$ijazah = post("ijazah");
$terakhir_ijazah = post("terakhir_ijazah");
$si = post("si");
$terakhir_si = post("terakhir_si");
$sn = post("sn");
$terakhir_sn = post("terakhir_sn");
$paspor = post("paspor");
$terakhir_paspor = post("terakhir_paspor");
$arc = post("arc");
$terakhir_arc = post("terakhir_arc");
$asuransi = post("asuransi");
$terakhir_asuransi = post("terakhir_asuransi");
$medikal1 = post("medikal1");
$terakhir_medikal1 = post("terakhir_medikal1");
$medikal2 = post("medikal2");
$terakhir_medikal2 = post("terakhir_medikal2");
$medikal3 = post("medikal3");
$terakhir_medikal3 = post("terakhir_medikal3");
$skck = post("skck");
$terakhir_skck = post("terakhir_skck");
$fingerprint = post("fingerprint");
$terakhir_fingerprint = post("terakhir_fingerprint");
$visa = post("visa");
$terakhir_visa = post("terakhir_visa");
$pap = post("pap");
$terakhir_pap = post("terakhir_pap");

        

        $simpan = $this->db->query("
            INSERT INTO dokumen
            (id_biodata,ktp,terakhir_ktp,kk,terakhir_kk,akte,terakhir_akte,ijazah,terakhir_ijazah,si,terakhir_si,sn,terakhir_sn,paspor,terakhir_paspor,arc,terakhir_arc,asuransi,terakhir_asuransi,medikal1,terakhir_medikal1,medikal2,terakhir_medikal2,medikal3,terakhir_medikal3,skck,terakhir_skck,fingerprint,terakhir_fingerprint,visa,terakhir_visa,pap,terakhir_pap) VALUES ('$id_biodata','$ktp','$terakhir_ktp','$kk','$terakhir_kk','$akte','$terakhir_akte','$ijazah','$terakhir_ijazah','$si','$terakhir_si','$sn','$terakhir_sn','$paspor','$terakhir_paspor','$arc','$terakhir_arc','$asuransi','$terakhir_asuransi','$medikal1','$terakhir_medikal1','$medikal2','$terakhir_medikal2','$medikal3','$terakhir_medikal3','$skck','$terakhir_skck','$fingerprint','$terakhir_fingerprint','$visa','$terakhir_visa','$pap','$terakhir_pap')
        ");
    

        if($simpan){
            redirect('admin/dokumen');
        }
    }

    public function update(){
          $key = post('id_dokumen'); $id_biodata = post("id_biodata");
$ktp = post("ktp");
$terakhir_ktp = post("terakhir_ktp");
$kk = post("kk");
$terakhir_kk = post("terakhir_kk");
$akte = post("akte");
$terakhir_akte = post("terakhir_akte");
$ijazah = post("ijazah");
$terakhir_ijazah = post("terakhir_ijazah");
$si = post("si");
$terakhir_si = post("terakhir_si");
$sn = post("sn");
$terakhir_sn = post("terakhir_sn");
$paspor = post("paspor");
$terakhir_paspor = post("terakhir_paspor");
$arc = post("arc");
$terakhir_arc = post("terakhir_arc");
$asuransi = post("asuransi");
$terakhir_asuransi = post("terakhir_asuransi");
$medikal1 = post("medikal1");
$terakhir_medikal1 = post("terakhir_medikal1");
$medikal2 = post("medikal2");
$terakhir_medikal2 = post("terakhir_medikal2");
$medikal3 = post("medikal3");
$terakhir_medikal3 = post("terakhir_medikal3");
$skck = post("skck");
$terakhir_skck = post("terakhir_skck");
$fingerprint = post("fingerprint");
$terakhir_fingerprint = post("terakhir_fingerprint");
$visa = post("visa");
$terakhir_visa = post("terakhir_visa");
$pap = post("pap");
$terakhir_pap = post("terakhir_pap");

        $simpan = $this->db->query("
            UPDATE dokumen SET  id_biodata = '$id_biodata', ktp = '$ktp', terakhir_ktp = '$terakhir_ktp', kk = '$kk', terakhir_kk = '$terakhir_kk', akte = '$akte', terakhir_akte = '$terakhir_akte', ijazah = '$ijazah', terakhir_ijazah = '$terakhir_ijazah', si = '$si', terakhir_si = '$terakhir_si', sn = '$sn', terakhir_sn = '$terakhir_sn', paspor = '$paspor', terakhir_paspor = '$terakhir_paspor', arc = '$arc', terakhir_arc = '$terakhir_arc', asuransi = '$asuransi', terakhir_asuransi = '$terakhir_asuransi', medikal1 = '$medikal1', terakhir_medikal1 = '$terakhir_medikal1', medikal2 = '$medikal2', terakhir_medikal2 = '$terakhir_medikal2', medikal3 = '$medikal3', terakhir_medikal3 = '$terakhir_medikal3', skck = '$skck', terakhir_skck = '$terakhir_skck', fingerprint = '$fingerprint', terakhir_fingerprint = '$terakhir_fingerprint', visa = '$visa', terakhir_visa = '$terakhir_visa', pap = '$pap', terakhir_pap = '$terakhir_pap' WHERE id_dokumen = '$key'
            ");
    

        if($simpan){
            redirect('admin/dokumen');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-dokumen.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","ktp","terakhir ktp","kk","terakhir kk","akte","terakhir akte","ijazah","terakhir ijazah","si","terakhir si","sn","terakhir sn","paspor","terakhir paspor","arc","terakhir arc","asuransi","terakhir asuransi","medikal1","terakhir medikal1","medikal2","terakhir medikal2","medikal3","terakhir medikal3","skck","terakhir skck","fingerprint","terakhir fingerprint","visa","terakhir visa","pap","terakhir pap", "action"];

        $calldata = ["id_biodata","ktp","terakhir_ktp","kk","terakhir_kk","akte","terakhir_akte","ijazah","terakhir_ijazah","si","terakhir_si","sn","terakhir_sn","paspor","terakhir_paspor","arc","terakhir_arc","asuransi","terakhir_asuransi","medikal1","terakhir_medikal1","medikal2","terakhir_medikal2","medikal3","terakhir_medikal3","skck","terakhir_skck","fingerprint","terakhir_fingerprint","visa","terakhir_visa","pap","terakhir_pap"];

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
