<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Personal_stat_history extends CI_Controller {

	private $table1 = 'personal_stat_history';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/personal_stat_history/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tanggal ganti","status", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/personal_stat_history/view', $data);
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
                        'row' => ["id_biodata","tanggal_ganti","status"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_personal_stat_history',
                        'data' => ["id_biodata","tanggal_ganti","status"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_personal_stat_history', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tanggal_ganti", "3"=>"status"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_personal_stat_history = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/personal_stat_history/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_personal_stat_history = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/personal_stat_history/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tanggal_ganti = post("tanggal_ganti");
$status = post("status");

        

        $simpan = $this->db->query("
            INSERT INTO personal_stat_history
            (id_biodata,tanggal_ganti,status) VALUES ('$id_biodata','$tanggal_ganti','$status')
        ");
    

        if($simpan){
            redirect('admin/personal_stat_history');
        }
    }

    public function update(){
          $key = post('id_personal_stat_history'); $id_biodata = post("id_biodata");
$tanggal_ganti = post("tanggal_ganti");
$status = post("status");

        $simpan = $this->db->query("
            UPDATE personal_stat_history SET  id_biodata = '$id_biodata', tanggal_ganti = '$tanggal_ganti', status = '$status' WHERE id_personal_stat_history = '$key'
            ");
    

        if($simpan){
            redirect('admin/personal_stat_history');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-personal_stat_history.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tanggal ganti","status", "action"];

        $calldata = ["id_biodata","tanggal_ganti","status"];

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
