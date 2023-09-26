<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Demo_user extends CI_Controller {

	private $table1 = 'demo_user';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/demo_user/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","user name","nama","nama mandarin", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/demo_user/view', $data);
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
                        'row' => ["user_name","nama","nama_mandarin"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'user_id',
                        'data' => ["user_name","nama","nama_mandarin"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['user_id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"user_name", "2"=>"nama", "3"=>"nama_mandarin"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE user_id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/demo_user/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE user_id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/demo_user/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $user_name = post("user_name");
$nama = post("nama");
$nama_mandarin = post("nama_mandarin");

        

        $simpan = $this->db->query("
            INSERT INTO demo_user
            (user_name,nama,nama_mandarin) VALUES ('$user_name','$nama','$nama_mandarin')
        ");
    

        if($simpan){
            redirect('admin/demo_user');
        }
    }

    public function update(){
          $key = post('user_id'); $user_name = post("user_name");
$nama = post("nama");
$nama_mandarin = post("nama_mandarin");

        $simpan = $this->db->query("
            UPDATE demo_user SET  user_name = '$user_name', nama = '$nama', nama_mandarin = '$nama_mandarin' WHERE user_id = '$key'
            ");
    

        if($simpan){
            redirect('admin/demo_user');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-demo_user.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","user name","nama","nama mandarin", "action"];

        $calldata = ["user_name","nama","nama_mandarin"];

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
