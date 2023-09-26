<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Adm_saldo_awal_delete_history extends CI_Controller {

	private $table1 = 'adm_saldo_awal_delete_history';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/adm_saldo_awal_delete_history/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id saldo awal","nominal saldo awal","tahun saldo awal","keterangan","user modified","ip modified","date modified","time modified","adm saldo awal id", "action"]);
        $this->Createtable->order_set('0, 8');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/adm_saldo_awal_delete_history/view', $data);
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
                        'row' => ["nominal_saldo_awal","tahun_saldo_awal","keterangan","user_modified","ip_modified","date_modified","time_modified","adm_saldo_awal_id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => '',
                        'data' => ["nominal_saldo_awal","tahun_saldo_awal","keterangan","user_modified","ip_modified","date_modified","time_modified","adm_saldo_awal_id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nominal_saldo_awal", "2"=>"tahun_saldo_awal", "3"=>"keterangan", "4"=>"user_modified", "5"=>"ip_modified", "6"=>"date_modified", "7"=>"time_modified", "8"=>"adm_saldo_awal_id"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE  = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/adm_saldo_awal_delete_history/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE  = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/adm_saldo_awal_delete_history/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_saldo_awal = post("id_saldo_awal");
$nominal_saldo_awal = post("nominal_saldo_awal");
$tahun_saldo_awal = post("tahun_saldo_awal");
$keterangan = post("keterangan");
$user_modified = post("user_modified");
$ip_modified = post("ip_modified");
$date_modified = post("date_modified");
$time_modified = post("time_modified");
$adm_saldo_awal_id = post("adm_saldo_awal_id");

        

        $simpan = $this->db->query("
            INSERT INTO adm_saldo_awal_delete_history
            (id_saldo_awal,nominal_saldo_awal,tahun_saldo_awal,keterangan,user_modified,ip_modified,date_modified,time_modified,adm_saldo_awal_id) VALUES ('$id_saldo_awal','$nominal_saldo_awal','$tahun_saldo_awal','$keterangan','$user_modified','$ip_modified','$date_modified','$time_modified','$adm_saldo_awal_id')
        ");
    

        if($simpan){
            redirect('admin/adm_saldo_awal_delete_history');
        }
    }

    public function update(){
          $key = post(''); $id_saldo_awal = post("id_saldo_awal");
$nominal_saldo_awal = post("nominal_saldo_awal");
$tahun_saldo_awal = post("tahun_saldo_awal");
$keterangan = post("keterangan");
$user_modified = post("user_modified");
$ip_modified = post("ip_modified");
$date_modified = post("date_modified");
$time_modified = post("time_modified");
$adm_saldo_awal_id = post("adm_saldo_awal_id");

        $simpan = $this->db->query("
            UPDATE adm_saldo_awal_delete_history SET  id_saldo_awal = '$id_saldo_awal', nominal_saldo_awal = '$nominal_saldo_awal', tahun_saldo_awal = '$tahun_saldo_awal', keterangan = '$keterangan', user_modified = '$user_modified', ip_modified = '$ip_modified', date_modified = '$date_modified', time_modified = '$time_modified', adm_saldo_awal_id = '$adm_saldo_awal_id' WHERE  = '$key'
            ");
    

        if($simpan){
            redirect('admin/adm_saldo_awal_delete_history');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-adm_saldo_awal_delete_history.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["id saldo awal","nominal saldo awal","tahun saldo awal","keterangan","user modified","ip modified","date modified","time modified","adm saldo awal id", "action"];

        $calldata = ["nominal_saldo_awal","tahun_saldo_awal","keterangan","user_modified","ip_modified","date_modified","time_modified","adm_saldo_awal_id"];

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
