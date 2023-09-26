<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class List_komputer extends CI_Controller {

	private $table1 = 'list_komputer';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/list_komputer/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id komputer","ip","nama", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/list_komputer/view', $data);
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
                        'row' => ["ip","nama"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_komputer',
                        'data' => ["ip","nama"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_komputer', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"ip", "2"=>"nama"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_komputer = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/list_komputer/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_komputer = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/list_komputer/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_komputer = post("id_komputer");
$ip = post("ip");
$nama = post("nama");

        

        $simpan = $this->db->query("
            INSERT INTO list_komputer
            (id_komputer,ip,nama) VALUES ('$id_komputer','$ip','$nama')
        ");
    

        if($simpan){
            redirect('admin/list_komputer');
        }
    }

    public function update(){
          $key = post('id_komputer'); $id_komputer = post("id_komputer");
$ip = post("ip");
$nama = post("nama");

        $simpan = $this->db->query("
            UPDATE list_komputer SET  id_komputer = '$id_komputer', ip = '$ip', nama = '$nama' WHERE id_komputer = '$key'
            ");
    

        if($simpan){
            redirect('admin/list_komputer');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-list_komputer.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["id komputer","ip","nama", "action"];

        $calldata = ["ip","nama"];

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
