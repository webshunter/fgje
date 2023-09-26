<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Personal_angkatan extends CI_Controller {

	private $table1 = 'personal_angkatan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/personal_angkatan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","date angkatan","nodaftar", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/personal_angkatan/view', $data);
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
                        'row' => ["date_angkatan","nodaftar"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_angkatan',
                        'data' => ["date_angkatan","nodaftar"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_angkatan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"date_angkatan", "2"=>"nodaftar"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_angkatan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/personal_angkatan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_angkatan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/personal_angkatan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $date_angkatan = post("date_angkatan");
$nodaftar = post("nodaftar");

        

        $simpan = $this->db->query("
            INSERT INTO personal_angkatan
            (date_angkatan,nodaftar) VALUES ('$date_angkatan','$nodaftar')
        ");
    

        if($simpan){
            redirect('admin/personal_angkatan');
        }
    }

    public function update(){
          $key = post('id_angkatan'); $date_angkatan = post("date_angkatan");
$nodaftar = post("nodaftar");

        $simpan = $this->db->query("
            UPDATE personal_angkatan SET  date_angkatan = '$date_angkatan', nodaftar = '$nodaftar' WHERE id_angkatan = '$key'
            ");
    

        if($simpan){
            redirect('admin/personal_angkatan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-personal_angkatan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","date angkatan","nodaftar", "action"];

        $calldata = ["date_angkatan","nodaftar"];

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
