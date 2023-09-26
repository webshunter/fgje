<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class User extends CI_Controller {

	private $table1 = 'user';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/user/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","username","password","status","login stat", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/user/view', $data);
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
                        'row' => ["username","password","status","login_stat"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_user',
                        'data' => ["username","password","status","login_stat"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_user', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"username", "2"=>"password", "3"=>"status", "4"=>"login_stat"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_user = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/user/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_user = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/user/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $username = post("username");
$password = post("password");
$status = post("status");
$login_stat = post("login_stat");

        

        $simpan = $this->db->query("
            INSERT INTO user
            (username,password,status,login_stat) VALUES ('$username','$password','$status','$login_stat')
        ");
    

        if($simpan){
            redirect('admin/user');
        }
    }

    public function update(){
          $key = post('id_user'); $username = post("username");
$password = post("password");
$status = post("status");
$login_stat = post("login_stat");

        $simpan = $this->db->query("
            UPDATE user SET  username = '$username', password = '$password', status = '$status', login_stat = '$login_stat' WHERE id_user = '$key'
            ");
    

        if($simpan){
            redirect('admin/user');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-user.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","username","password","status","login stat", "action"];

        $calldata = ["username","password","status","login_stat"];

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
