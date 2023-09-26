<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Setup_menu extends CI_Controller {

	private $table1 = 'setup_menu';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/setup_menu/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","title","link","judul","group menu", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/setup_menu/view', $data);
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
                        'row' => ["title","link","judul","group_menu"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'menu',
                        'data' => ["title","link","judul","group_menu"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['menu', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"title", "2"=>"link", "3"=>"judul", "4"=>"group_menu"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE menu = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/setup_menu/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE menu = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/setup_menu/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $title = post("title");
$link = post("link");
$judul = post("judul");
$group_menu = post("group_menu");

        

        $simpan = $this->db->query("
            INSERT INTO setup_menu
            (title,link,judul,group_menu) VALUES ('$title','$link','$judul','$group_menu')
        ");
    

        if($simpan){
            redirect('admin/setup_menu');
        }
    }

    public function update(){
          $key = post('menu'); $title = post("title");
$link = post("link");
$judul = post("judul");
$group_menu = post("group_menu");

        $simpan = $this->db->query("
            UPDATE setup_menu SET  title = '$title', link = '$link', judul = '$judul', group_menu = '$group_menu' WHERE menu = '$key'
            ");
    

        if($simpan){
            redirect('admin/setup_menu');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-setup_menu.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","title","link","judul","group menu", "action"];

        $calldata = ["title","link","judul","group_menu"];

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
