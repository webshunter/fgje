<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Rekap_kabur_interminate_ambil_dok extends CI_Controller {

	private $table1 = 'rekap_kabur_interminate_ambil_dok';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/rekap_kabur_interminate_ambil_dok/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","tgl start","tgl end","kondisi", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/rekap_kabur_interminate_ambil_dok/view', $data);
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
                        'row' => ["tgl_start","tgl_end","kondisi"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["tgl_start","tgl_end","kondisi"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tgl_start", "2"=>"tgl_end", "3"=>"kondisi"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/rekap_kabur_interminate_ambil_dok/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/rekap_kabur_interminate_ambil_dok/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $tgl_start = post("tgl_start");
$tgl_end = post("tgl_end");
$kondisi = post("kondisi");

        

        $simpan = $this->db->query("
            INSERT INTO rekap_kabur_interminate_ambil_dok
            (tgl_start,tgl_end,kondisi) VALUES ('$tgl_start','$tgl_end','$kondisi')
        ");
    

        if($simpan){
            redirect('admin/rekap_kabur_interminate_ambil_dok');
        }
    }

    public function update(){
          $key = post('id'); $tgl_start = post("tgl_start");
$tgl_end = post("tgl_end");
$kondisi = post("kondisi");

        $simpan = $this->db->query("
            UPDATE rekap_kabur_interminate_ambil_dok SET  tgl_start = '$tgl_start', tgl_end = '$tgl_end', kondisi = '$kondisi' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/rekap_kabur_interminate_ambil_dok');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-rekap_kabur_interminate_ambil_dok.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","tgl start","tgl end","kondisi", "action"];

        $calldata = ["tgl_start","tgl_end","kondisi"];

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
