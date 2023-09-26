<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Invoice extends CI_Controller {

	private $table1 = 'invoice';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/invoice/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","ip","tgl diisi","date modified","bulan","tahun","pnbp","sidik jari","foto","online","kesehatan","visa","asuransi","skck","id","transport","tiket","airport","ujk","akomodasi","konsumsi","ins honor","ins transport","buku baju","alat praktek","atk","fee pl", "action"]);
        $this->Createtable->order_set('0, 26');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/invoice/view', $data);
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
                        'row' => ["ip","tgl_diisi","date_modified","bulan","tahun","pnbp","sidik_jari","foto","online","kesehatan","visa","asuransi","skck","id","transport","tiket","airport","ujk","akomodasi","konsumsi","ins_honor","ins_transport","buku_baju","alat_praktek","atk","fee_pl"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_invoice',
                        'data' => ["ip","tgl_diisi","date_modified","bulan","tahun","pnbp","sidik_jari","foto","online","kesehatan","visa","asuransi","skck","id","transport","tiket","airport","ujk","akomodasi","konsumsi","ins_honor","ins_transport","buku_baju","alat_praktek","atk","fee_pl"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_invoice', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"ip", "2"=>"tgl_diisi", "3"=>"date_modified", "4"=>"bulan", "5"=>"tahun", "6"=>"pnbp", "7"=>"sidik_jari", "8"=>"foto", "9"=>"online", "10"=>"kesehatan", "11"=>"visa", "12"=>"asuransi", "13"=>"skck", "14"=>"id", "15"=>"transport", "16"=>"tiket", "17"=>"airport", "18"=>"ujk", "19"=>"akomodasi", "20"=>"konsumsi", "21"=>"ins_honor", "22"=>"ins_transport", "23"=>"buku_baju", "24"=>"alat_praktek", "25"=>"atk", "26"=>"fee_pl"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_invoice = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/invoice/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_invoice = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/invoice/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $ip = post("ip");
$tgl_diisi = post("tgl_diisi");
$date_modified = post("date_modified");
$bulan = post("bulan");
$tahun = post("tahun");
$pnbp = post("pnbp");
$sidik_jari = post("sidik_jari");
$foto = post("foto");
$online = post("online");
$kesehatan = post("kesehatan");
$visa = post("visa");
$asuransi = post("asuransi");
$skck = post("skck");
$id = post("id");
$transport = post("transport");
$tiket = post("tiket");
$airport = post("airport");
$ujk = post("ujk");
$akomodasi = post("akomodasi");
$konsumsi = post("konsumsi");
$ins_honor = post("ins_honor");
$ins_transport = post("ins_transport");
$buku_baju = post("buku_baju");
$alat_praktek = post("alat_praktek");
$atk = post("atk");
$fee_pl = post("fee_pl");

        

        $simpan = $this->db->query("
            INSERT INTO invoice
            (ip,tgl_diisi,date_modified,bulan,tahun,pnbp,sidik_jari,foto,online,kesehatan,visa,asuransi,skck,id,transport,tiket,airport,ujk,akomodasi,konsumsi,ins_honor,ins_transport,buku_baju,alat_praktek,atk,fee_pl) VALUES ('$ip','$tgl_diisi','$date_modified','$bulan','$tahun','$pnbp','$sidik_jari','$foto','$online','$kesehatan','$visa','$asuransi','$skck','$id','$transport','$tiket','$airport','$ujk','$akomodasi','$konsumsi','$ins_honor','$ins_transport','$buku_baju','$alat_praktek','$atk','$fee_pl')
        ");
    

        if($simpan){
            redirect('admin/invoice');
        }
    }

    public function update(){
          $key = post('id_invoice'); $ip = post("ip");
$tgl_diisi = post("tgl_diisi");
$date_modified = post("date_modified");
$bulan = post("bulan");
$tahun = post("tahun");
$pnbp = post("pnbp");
$sidik_jari = post("sidik_jari");
$foto = post("foto");
$online = post("online");
$kesehatan = post("kesehatan");
$visa = post("visa");
$asuransi = post("asuransi");
$skck = post("skck");
$id = post("id");
$transport = post("transport");
$tiket = post("tiket");
$airport = post("airport");
$ujk = post("ujk");
$akomodasi = post("akomodasi");
$konsumsi = post("konsumsi");
$ins_honor = post("ins_honor");
$ins_transport = post("ins_transport");
$buku_baju = post("buku_baju");
$alat_praktek = post("alat_praktek");
$atk = post("atk");
$fee_pl = post("fee_pl");

        $simpan = $this->db->query("
            UPDATE invoice SET  ip = '$ip', tgl_diisi = '$tgl_diisi', date_modified = '$date_modified', bulan = '$bulan', tahun = '$tahun', pnbp = '$pnbp', sidik_jari = '$sidik_jari', foto = '$foto', online = '$online', kesehatan = '$kesehatan', visa = '$visa', asuransi = '$asuransi', skck = '$skck', id = '$id', transport = '$transport', tiket = '$tiket', airport = '$airport', ujk = '$ujk', akomodasi = '$akomodasi', konsumsi = '$konsumsi', ins_honor = '$ins_honor', ins_transport = '$ins_transport', buku_baju = '$buku_baju', alat_praktek = '$alat_praktek', atk = '$atk', fee_pl = '$fee_pl' WHERE id_invoice = '$key'
            ");
    

        if($simpan){
            redirect('admin/invoice');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-invoice.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","ip","tgl diisi","date modified","bulan","tahun","pnbp","sidik jari","foto","online","kesehatan","visa","asuransi","skck","id","transport","tiket","airport","ujk","akomodasi","konsumsi","ins honor","ins transport","buku baju","alat praktek","atk","fee pl", "action"];

        $calldata = ["ip","tgl_diisi","date_modified","bulan","tahun","pnbp","sidik_jari","foto","online","kesehatan","visa","asuransi","skck","id","transport","tiket","airport","ujk","akomodasi","konsumsi","ins_honor","ins_transport","buku_baju","alat_praktek","atk","fee_pl"];

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
