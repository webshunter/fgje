<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_waktu extends CI_Controller {

	private $table1 = 'blk_waktu';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_waktu/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode waktu","waktu","ket", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_waktu/view', $data);
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
                        'row' => ["kode_waktu","waktu","ket"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_waktu',
                        'data' => ["kode_waktu","waktu","ket"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_waktu', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_waktu", "2"=>"waktu", "3"=>"ket"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_waktu = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_waktu/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_waktu = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_waktu/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_waktu = post("kode_waktu");
$waktu = post("waktu");
$ket = post("ket");

        

        $simpan = $this->db->query("
            INSERT INTO blk_waktu
            (kode_waktu,waktu,ket) VALUES ('$kode_waktu','$waktu','$ket')
        ");
    

        if($simpan){
            redirect('admin/blk_waktu');
        }
    }

    public function update(){
          $key = post('id_waktu'); $kode_waktu = post("kode_waktu");
$waktu = post("waktu");
$ket = post("ket");

        $simpan = $this->db->query("
            UPDATE blk_waktu SET  kode_waktu = '$kode_waktu', waktu = '$waktu', ket = '$ket' WHERE id_waktu = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_waktu');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_waktu.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode waktu","waktu","ket", "action"];

        $calldata = ["kode_waktu","waktu","ket"];

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
