<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class 0blk_setting_tipe_pengeluaran_edit_history extends CI_Controller {

	private $table1 = '0blk_setting_tipe_pengeluaran_edit_history';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/0blk_setting_tipe_pengeluaran_edit_history/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id tipe pengeluaran","nama tipe pengeluaran","user created id","tanggal created","jam created","ip created", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/0blk_setting_tipe_pengeluaran_edit_history/view', $data);
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
                        'row' => ["nama_tipe_pengeluaran","user_created_id","tanggal_created","jam_created","ip_created"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => '',
                        'data' => ["nama_tipe_pengeluaran","user_created_id","tanggal_created","jam_created","ip_created"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama_tipe_pengeluaran", "2"=>"user_created_id", "3"=>"tanggal_created", "4"=>"jam_created", "5"=>"ip_created"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE  = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/0blk_setting_tipe_pengeluaran_edit_history/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE  = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/0blk_setting_tipe_pengeluaran_edit_history/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_tipe_pengeluaran = post("id_tipe_pengeluaran");
$nama_tipe_pengeluaran = post("nama_tipe_pengeluaran");
$user_created_id = post("user_created_id");
$tanggal_created = post("tanggal_created");
$jam_created = post("jam_created");
$ip_created = post("ip_created");

        

        $simpan = $this->db->query("
            INSERT INTO 0blk_setting_tipe_pengeluaran_edit_history
            (id_tipe_pengeluaran,nama_tipe_pengeluaran,user_created_id,tanggal_created,jam_created,ip_created) VALUES ('$id_tipe_pengeluaran','$nama_tipe_pengeluaran','$user_created_id','$tanggal_created','$jam_created','$ip_created')
        ");
    

        if($simpan){
            redirect('admin/0blk_setting_tipe_pengeluaran_edit_history');
        }
    }

    public function update(){
          $key = post(''); $id_tipe_pengeluaran = post("id_tipe_pengeluaran");
$nama_tipe_pengeluaran = post("nama_tipe_pengeluaran");
$user_created_id = post("user_created_id");
$tanggal_created = post("tanggal_created");
$jam_created = post("jam_created");
$ip_created = post("ip_created");

        $simpan = $this->db->query("
            UPDATE 0blk_setting_tipe_pengeluaran_edit_history SET  id_tipe_pengeluaran = '$id_tipe_pengeluaran', nama_tipe_pengeluaran = '$nama_tipe_pengeluaran', user_created_id = '$user_created_id', tanggal_created = '$tanggal_created', jam_created = '$jam_created', ip_created = '$ip_created' WHERE  = '$key'
            ");
    

        if($simpan){
            redirect('admin/0blk_setting_tipe_pengeluaran_edit_history');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-0blk_setting_tipe_pengeluaran_edit_history.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["id tipe pengeluaran","nama tipe pengeluaran","user created id","tanggal created","jam created","ip created", "action"];

        $calldata = ["nama_tipe_pengeluaran","user_created_id","tanggal_created","jam_created","ip_created"];

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
