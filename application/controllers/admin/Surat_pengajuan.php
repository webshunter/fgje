<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Surat_pengajuan extends CI_Controller {

	private $table1 = 'surat_pengajuan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/surat_pengajuan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","pptkis","lembaga","no surat","tanggal", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/surat_pengajuan/view', $data);
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
                        'row' => ["pptkis","lembaga","no_surat","tanggal"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_surat_aju',
                        'data' => ["pptkis","lembaga","no_surat","tanggal"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_surat_aju', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"pptkis", "2"=>"lembaga", "3"=>"no_surat", "4"=>"tanggal"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_surat_aju = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/surat_pengajuan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_surat_aju = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/surat_pengajuan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $pptkis = post("pptkis");
$lembaga = post("lembaga");
$no_surat = post("no_surat");
$tanggal = post("tanggal");

        

        $simpan = $this->db->query("
            INSERT INTO surat_pengajuan
            (pptkis,lembaga,no_surat,tanggal) VALUES ('$pptkis','$lembaga','$no_surat','$tanggal')
        ");
    

        if($simpan){
            redirect('admin/surat_pengajuan');
        }
    }

    public function update(){
          $key = post('id_surat_aju'); $pptkis = post("pptkis");
$lembaga = post("lembaga");
$no_surat = post("no_surat");
$tanggal = post("tanggal");

        $simpan = $this->db->query("
            UPDATE surat_pengajuan SET  pptkis = '$pptkis', lembaga = '$lembaga', no_surat = '$no_surat', tanggal = '$tanggal' WHERE id_surat_aju = '$key'
            ");
    

        if($simpan){
            redirect('admin/surat_pengajuan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-surat_pengajuan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","pptkis","lembaga","no surat","tanggal", "action"];

        $calldata = ["pptkis","lembaga","no_surat","tanggal"];

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
