<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dataagen_pass_history extends CI_Controller {

	private $table1 = 'dataagen_pass_history';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/dataagen_pass_history/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","first pass","second pass","h tgl","h jam","h ip","h user", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/dataagen_pass_history/view', $data);
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
                        'row' => ["first_pass","second_pass","h_tgl","h_jam","h_ip","h_user"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_agen_pass',
                        'data' => ["first_pass","second_pass","h_tgl","h_jam","h_ip","h_user"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_agen_pass', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"first_pass", "2"=>"second_pass", "3"=>"h_tgl", "4"=>"h_jam", "5"=>"h_ip", "6"=>"h_user"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_agen_pass = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/dataagen_pass_history/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_agen_pass = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/dataagen_pass_history/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $first_pass = post("first_pass");
$second_pass = post("second_pass");
$h_tgl = post("h_tgl");
$h_jam = post("h_jam");
$h_ip = post("h_ip");
$h_user = post("h_user");

        

        $simpan = $this->db->query("
            INSERT INTO dataagen_pass_history
            (first_pass,second_pass,h_tgl,h_jam,h_ip,h_user) VALUES ('$first_pass','$second_pass','$h_tgl','$h_jam','$h_ip','$h_user')
        ");
    

        if($simpan){
            redirect('admin/dataagen_pass_history');
        }
    }

    public function update(){
          $key = post('id_agen_pass'); $first_pass = post("first_pass");
$second_pass = post("second_pass");
$h_tgl = post("h_tgl");
$h_jam = post("h_jam");
$h_ip = post("h_ip");
$h_user = post("h_user");

        $simpan = $this->db->query("
            UPDATE dataagen_pass_history SET  first_pass = '$first_pass', second_pass = '$second_pass', h_tgl = '$h_tgl', h_jam = '$h_jam', h_ip = '$h_ip', h_user = '$h_user' WHERE id_agen_pass = '$key'
            ");
    

        if($simpan){
            redirect('admin/dataagen_pass_history');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-dataagen_pass_history.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","first pass","second pass","h tgl","h jam","h ip","h user", "action"];

        $calldata = ["first_pass","second_pass","h_tgl","h_jam","h_ip","h_user"];

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
