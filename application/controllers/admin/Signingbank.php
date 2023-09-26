<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Signingbank extends CI_Controller {

	private $table1 = 'signingbank';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/signingbank/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","nama bank","tgl bank","tgl tki ttd","idkredit","tglapplycs","tglterimacs","statustglterimacs","tglapplyleg","tgltrmleg","statustgltrmleg","tgldokbank","norektki","tanggal input","pribadi","karantina", "action"]);
        $this->Createtable->order_set('0, 16');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/signingbank/view', $data);
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
                        'row' => ["id_biodata","nama_bank","tgl_bank","tgl_tki_ttd","idkredit","tglapplycs","tglterimacs","statustglterimacs","tglapplyleg","tgltrmleg","statustgltrmleg","tgldokbank","norektki","tanggal_input","pribadi","karantina"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_signing',
                        'data' => ["id_biodata","nama_bank","tgl_bank","tgl_tki_ttd","idkredit","tglapplycs","tglterimacs","statustglterimacs","tglapplyleg","tgltrmleg","statustgltrmleg","tgldokbank","norektki","tanggal_input","pribadi","karantina"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_signing', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"nama_bank", "3"=>"tgl_bank", "4"=>"tgl_tki_ttd", "5"=>"idkredit", "6"=>"tglapplycs", "7"=>"tglterimacs", "8"=>"statustglterimacs", "9"=>"tglapplyleg", "10"=>"tgltrmleg", "11"=>"statustgltrmleg", "12"=>"tgldokbank", "13"=>"norektki", "14"=>"tanggal_input", "15"=>"pribadi", "16"=>"karantina"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_signing = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/signingbank/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_signing = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/signingbank/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$nama_bank = post("nama_bank");
$tgl_bank = post("tgl_bank");
$tgl_tki_ttd = post("tgl_tki_ttd");
$idkredit = post("idkredit");
$tglapplycs = post("tglapplycs");
$tglterimacs = post("tglterimacs");
$statustglterimacs = post("statustglterimacs");
$tglapplyleg = post("tglapplyleg");
$tgltrmleg = post("tgltrmleg");
$statustgltrmleg = post("statustgltrmleg");
$tgldokbank = post("tgldokbank");
$norektki = post("norektki");
$tanggal_input = post("tanggal_input");
$pribadi = post("pribadi");
$karantina = post("karantina");

        

        $simpan = $this->db->query("
            INSERT INTO signingbank
            (id_biodata,nama_bank,tgl_bank,tgl_tki_ttd,idkredit,tglapplycs,tglterimacs,statustglterimacs,tglapplyleg,tgltrmleg,statustgltrmleg,tgldokbank,norektki,tanggal_input,pribadi,karantina) VALUES ('$id_biodata','$nama_bank','$tgl_bank','$tgl_tki_ttd','$idkredit','$tglapplycs','$tglterimacs','$statustglterimacs','$tglapplyleg','$tgltrmleg','$statustgltrmleg','$tgldokbank','$norektki','$tanggal_input','$pribadi','$karantina')
        ");
    

        if($simpan){
            redirect('admin/signingbank');
        }
    }

    public function update(){
          $key = post('id_signing'); $id_biodata = post("id_biodata");
$nama_bank = post("nama_bank");
$tgl_bank = post("tgl_bank");
$tgl_tki_ttd = post("tgl_tki_ttd");
$idkredit = post("idkredit");
$tglapplycs = post("tglapplycs");
$tglterimacs = post("tglterimacs");
$statustglterimacs = post("statustglterimacs");
$tglapplyleg = post("tglapplyleg");
$tgltrmleg = post("tgltrmleg");
$statustgltrmleg = post("statustgltrmleg");
$tgldokbank = post("tgldokbank");
$norektki = post("norektki");
$tanggal_input = post("tanggal_input");
$pribadi = post("pribadi");
$karantina = post("karantina");

        $simpan = $this->db->query("
            UPDATE signingbank SET  id_biodata = '$id_biodata', nama_bank = '$nama_bank', tgl_bank = '$tgl_bank', tgl_tki_ttd = '$tgl_tki_ttd', idkredit = '$idkredit', tglapplycs = '$tglapplycs', tglterimacs = '$tglterimacs', statustglterimacs = '$statustglterimacs', tglapplyleg = '$tglapplyleg', tgltrmleg = '$tgltrmleg', statustgltrmleg = '$statustgltrmleg', tgldokbank = '$tgldokbank', norektki = '$norektki', tanggal_input = '$tanggal_input', pribadi = '$pribadi', karantina = '$karantina' WHERE id_signing = '$key'
            ");
    

        if($simpan){
            redirect('admin/signingbank');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-signingbank.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","nama bank","tgl bank","tgl tki ttd","idkredit","tglapplycs","tglterimacs","statustglterimacs","tglapplyleg","tgltrmleg","statustgltrmleg","tgldokbank","norektki","tanggal input","pribadi","karantina", "action"];

        $calldata = ["id_biodata","nama_bank","tgl_bank","tgl_tki_ttd","idkredit","tglapplycs","tglterimacs","statustglterimacs","tglapplyleg","tgltrmleg","statustgltrmleg","tgldokbank","norektki","tanggal_input","pribadi","karantina"];

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
