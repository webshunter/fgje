<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_setting_paket extends CI_Controller {

	private $table1 = 'blk_setting_paket';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_setting_paket/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama paket","source","source2", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_setting_paket/view', $data);
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
                        'row' => ["nama_paket","source","source2"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_setting_paket',
                        'data' => ["nama_paket","source","source2"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_setting_paket', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama_paket", "2"=>"source", "3"=>"source2"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_setting_paket = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_setting_paket/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_setting_paket = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_setting_paket/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nama_paket = post("nama_paket");
$source = post("source");
$source2 = post("source2");

        

        $simpan = $this->db->query("
            INSERT INTO blk_setting_paket
            (nama_paket,source,source2) VALUES ('$nama_paket','$source','$source2')
        ");
    

        if($simpan){
            redirect('admin/blk_setting_paket');
        }
    }

    public function update(){
          $key = post('id_setting_paket'); $nama_paket = post("nama_paket");
$source = post("source");
$source2 = post("source2");

        $simpan = $this->db->query("
            UPDATE blk_setting_paket SET  nama_paket = '$nama_paket', source = '$source', source2 = '$source2' WHERE id_setting_paket = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_setting_paket');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_setting_paket.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nama paket","source","source2", "action"];

        $calldata = ["nama_paket","source","source2"];

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
