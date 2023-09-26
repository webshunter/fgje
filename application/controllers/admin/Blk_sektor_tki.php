<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_sektor_tki extends CI_Controller {

	private $table1 = 'blk_sektor_tki';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_sektor_tki/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama sektor", "action"]);
        $this->Createtable->order_set('0, 1');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_sektor_tki/view', $data);
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
                        'row' => ["nama_sektor"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_sektor_tki',
                        'data' => ["nama_sektor"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_sektor_tki', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama_sektor"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_sektor_tki = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_sektor_tki/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_sektor_tki = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_sektor_tki/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nama_sektor = post("nama_sektor");

        

        $simpan = $this->db->query("
            INSERT INTO blk_sektor_tki
            (nama_sektor) VALUES ('$nama_sektor')
        ");
    

        if($simpan){
            redirect('admin/blk_sektor_tki');
        }
    }

    public function update(){
          $key = post('id_sektor_tki'); $nama_sektor = post("nama_sektor");

        $simpan = $this->db->query("
            UPDATE blk_sektor_tki SET  nama_sektor = '$nama_sektor' WHERE id_sektor_tki = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_sektor_tki');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_sektor_tki.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nama sektor", "action"];

        $calldata = ["nama_sektor"];

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
