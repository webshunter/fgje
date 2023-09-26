<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_materipkl extends CI_Controller {

	private $table1 = 'blk_materipkl';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_materipkl/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","materi","id aspek", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_materipkl/view', $data);
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
                        'row' => ["materi","id_aspek"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_materipkl',
                        'data' => ["materi","id_aspek"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_materipkl', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"materi", "2"=>"id_aspek"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_materipkl = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_materipkl/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_materipkl = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_materipkl/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $materi = post("materi");
$id_aspek = post("id_aspek");

        

        $simpan = $this->db->query("
            INSERT INTO blk_materipkl
            (materi,id_aspek) VALUES ('$materi','$id_aspek')
        ");
    

        if($simpan){
            redirect('admin/blk_materipkl');
        }
    }

    public function update(){
          $key = post('id_materipkl'); $materi = post("materi");
$id_aspek = post("id_aspek");

        $simpan = $this->db->query("
            UPDATE blk_materipkl SET  materi = '$materi', id_aspek = '$id_aspek' WHERE id_materipkl = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_materipkl');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_materipkl.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","materi","id aspek", "action"];

        $calldata = ["materi","id_aspek"];

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
