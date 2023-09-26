<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_invoice_pelatihan extends CI_Controller {

	private $table1 = 'blk_invoice_pelatihan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_invoice_pelatihan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id invoice pelatihan","noinvoice pelatihan","tglsurat","blk pemilik","biaya","id laporan bulanan", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_invoice_pelatihan/view', $data);
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
                        'row' => ["noinvoice_pelatihan","tglsurat","blk_pemilik","biaya","id_laporan_bulanan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => '',
                        'data' => ["noinvoice_pelatihan","tglsurat","blk_pemilik","biaya","id_laporan_bulanan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"noinvoice_pelatihan", "2"=>"tglsurat", "3"=>"blk_pemilik", "4"=>"biaya", "5"=>"id_laporan_bulanan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE  = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_invoice_pelatihan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE  = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_invoice_pelatihan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_invoice_pelatihan = post("id_invoice_pelatihan");
$noinvoice_pelatihan = post("noinvoice_pelatihan");
$tglsurat = post("tglsurat");
$blk_pemilik = post("blk_pemilik");
$biaya = post("biaya");
$id_laporan_bulanan = post("id_laporan_bulanan");

        

        $simpan = $this->db->query("
            INSERT INTO blk_invoice_pelatihan
            (id_invoice_pelatihan,noinvoice_pelatihan,tglsurat,blk_pemilik,biaya,id_laporan_bulanan) VALUES ('$id_invoice_pelatihan','$noinvoice_pelatihan','$tglsurat','$blk_pemilik','$biaya','$id_laporan_bulanan')
        ");
    

        if($simpan){
            redirect('admin/blk_invoice_pelatihan');
        }
    }

    public function update(){
          $key = post(''); $id_invoice_pelatihan = post("id_invoice_pelatihan");
$noinvoice_pelatihan = post("noinvoice_pelatihan");
$tglsurat = post("tglsurat");
$blk_pemilik = post("blk_pemilik");
$biaya = post("biaya");
$id_laporan_bulanan = post("id_laporan_bulanan");

        $simpan = $this->db->query("
            UPDATE blk_invoice_pelatihan SET  id_invoice_pelatihan = '$id_invoice_pelatihan', noinvoice_pelatihan = '$noinvoice_pelatihan', tglsurat = '$tglsurat', blk_pemilik = '$blk_pemilik', biaya = '$biaya', id_laporan_bulanan = '$id_laporan_bulanan' WHERE  = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_invoice_pelatihan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_invoice_pelatihan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["id invoice pelatihan","noinvoice pelatihan","tglsurat","blk pemilik","biaya","id laporan bulanan", "action"];

        $calldata = ["noinvoice_pelatihan","tglsurat","blk_pemilik","biaya","id_laporan_bulanan"];

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
