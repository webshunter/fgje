<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Email extends CI_Controller {

	private $table1 = 'email';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/email/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tgl email","ket email", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/email/view', $data);
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
                        'row' => ["id_biodata","tgl_email","ket_email"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_email',
                        'data' => ["id_biodata","tgl_email","ket_email"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_email', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tgl_email", "3"=>"ket_email"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_email = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/email/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_email = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/email/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tgl_email = post("tgl_email");
$ket_email = post("ket_email");

        

        $simpan = $this->db->query("
            INSERT INTO email
            (id_biodata,tgl_email,ket_email) VALUES ('$id_biodata','$tgl_email','$ket_email')
        ");
    

        if($simpan){
            redirect('admin/email');
        }
    }

    public function update(){
          $key = post('id_email'); $id_biodata = post("id_biodata");
$tgl_email = post("tgl_email");
$ket_email = post("ket_email");

        $simpan = $this->db->query("
            UPDATE email SET  id_biodata = '$id_biodata', tgl_email = '$tgl_email', ket_email = '$ket_email' WHERE id_email = '$key'
            ");
    

        if($simpan){
            redirect('admin/email');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-email.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tgl email","ket email", "action"];

        $calldata = ["id_biodata","tgl_email","ket_email"];

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