<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_no_ranjang_history extends CI_Controller {

	private $table1 = 'blk_no_ranjang_history';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_no_ranjang_history/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nodaftar","ranjangno","tanggal mulai","tanggal selesai", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_no_ranjang_history/view', $data);
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
                        'row' => ["nodaftar","ranjangno","tanggal_mulai","tanggal_selesai"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_history',
                        'data' => ["nodaftar","ranjangno","tanggal_mulai","tanggal_selesai"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_history', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nodaftar", "2"=>"ranjangno", "3"=>"tanggal_mulai", "4"=>"tanggal_selesai"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_history = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_no_ranjang_history/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_history = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_no_ranjang_history/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nodaftar = post("nodaftar");
$ranjangno = post("ranjangno");
$tanggal_mulai = post("tanggal_mulai");
$tanggal_selesai = post("tanggal_selesai");

        

        $simpan = $this->db->query("
            INSERT INTO blk_no_ranjang_history
            (nodaftar,ranjangno,tanggal_mulai,tanggal_selesai) VALUES ('$nodaftar','$ranjangno','$tanggal_mulai','$tanggal_selesai')
        ");
    

        if($simpan){
            redirect('admin/blk_no_ranjang_history');
        }
    }

    public function update(){
          $key = post('id_history'); $nodaftar = post("nodaftar");
$ranjangno = post("ranjangno");
$tanggal_mulai = post("tanggal_mulai");
$tanggal_selesai = post("tanggal_selesai");

        $simpan = $this->db->query("
            UPDATE blk_no_ranjang_history SET  nodaftar = '$nodaftar', ranjangno = '$ranjangno', tanggal_mulai = '$tanggal_mulai', tanggal_selesai = '$tanggal_selesai' WHERE id_history = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_no_ranjang_history');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_no_ranjang_history.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nodaftar","ranjangno","tanggal mulai","tanggal selesai", "action"];

        $calldata = ["nodaftar","ranjangno","tanggal_mulai","tanggal_selesai"];

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
