<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_data_pemasukan_edit_history extends CI_Controller {

	private $table1 = 'blk_data_pemasukan_edit_history';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_data_pemasukan_edit_history/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id edit pemasukan","tipe pemasukan","nominal pemasukan","tanggal pemasukan","pemilik pemasukan","tanggal input","jam input","user input","ip input","tanggal edit","jam edit","user edit","ip edit","pemasukan id","keterangan", "action"]);
        $this->Createtable->order_set('0, 14');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_data_pemasukan_edit_history/view', $data);
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
                        'row' => ["tipe_pemasukan","nominal_pemasukan","tanggal_pemasukan","pemilik_pemasukan","tanggal_input","jam_input","user_input","ip_input","tanggal_edit","jam_edit","user_edit","ip_edit","pemasukan_id","keterangan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_edit_pemasukan',
                        'data' => ["tipe_pemasukan","nominal_pemasukan","tanggal_pemasukan","pemilik_pemasukan","tanggal_input","jam_input","user_input","ip_input","tanggal_edit","jam_edit","user_edit","ip_edit","pemasukan_id","keterangan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_edit_pemasukan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tipe_pemasukan", "2"=>"nominal_pemasukan", "3"=>"tanggal_pemasukan", "4"=>"pemilik_pemasukan", "5"=>"tanggal_input", "6"=>"jam_input", "7"=>"user_input", "8"=>"ip_input", "9"=>"tanggal_edit", "10"=>"jam_edit", "11"=>"user_edit", "12"=>"ip_edit", "13"=>"pemasukan_id", "14"=>"keterangan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_edit_pemasukan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_data_pemasukan_edit_history/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_edit_pemasukan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_data_pemasukan_edit_history/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_edit_pemasukan = post("id_edit_pemasukan");
$tipe_pemasukan = post("tipe_pemasukan");
$nominal_pemasukan = post("nominal_pemasukan");
$tanggal_pemasukan = post("tanggal_pemasukan");
$pemilik_pemasukan = post("pemilik_pemasukan");
$tanggal_input = post("tanggal_input");
$jam_input = post("jam_input");
$user_input = post("user_input");
$ip_input = post("ip_input");
$tanggal_edit = post("tanggal_edit");
$jam_edit = post("jam_edit");
$user_edit = post("user_edit");
$ip_edit = post("ip_edit");
$pemasukan_id = post("pemasukan_id");
$keterangan = post("keterangan");

        

        $simpan = $this->db->query("
            INSERT INTO blk_data_pemasukan_edit_history
            (id_edit_pemasukan,tipe_pemasukan,nominal_pemasukan,tanggal_pemasukan,pemilik_pemasukan,tanggal_input,jam_input,user_input,ip_input,tanggal_edit,jam_edit,user_edit,ip_edit,pemasukan_id,keterangan) VALUES ('$id_edit_pemasukan','$tipe_pemasukan','$nominal_pemasukan','$tanggal_pemasukan','$pemilik_pemasukan','$tanggal_input','$jam_input','$user_input','$ip_input','$tanggal_edit','$jam_edit','$user_edit','$ip_edit','$pemasukan_id','$keterangan')
        ");
    

        if($simpan){
            redirect('admin/blk_data_pemasukan_edit_history');
        }
    }

    public function update(){
          $key = post(''); $id_edit_pemasukan = post("id_edit_pemasukan");
$tipe_pemasukan = post("tipe_pemasukan");
$nominal_pemasukan = post("nominal_pemasukan");
$tanggal_pemasukan = post("tanggal_pemasukan");
$pemilik_pemasukan = post("pemilik_pemasukan");
$tanggal_input = post("tanggal_input");
$jam_input = post("jam_input");
$user_input = post("user_input");
$ip_input = post("ip_input");
$tanggal_edit = post("tanggal_edit");
$jam_edit = post("jam_edit");
$user_edit = post("user_edit");
$ip_edit = post("ip_edit");
$pemasukan_id = post("pemasukan_id");
$keterangan = post("keterangan");

        $simpan = $this->db->query("
            UPDATE blk_data_pemasukan_edit_history SET  id_edit_pemasukan = '$id_edit_pemasukan', tipe_pemasukan = '$tipe_pemasukan', nominal_pemasukan = '$nominal_pemasukan', tanggal_pemasukan = '$tanggal_pemasukan', pemilik_pemasukan = '$pemilik_pemasukan', tanggal_input = '$tanggal_input', jam_input = '$jam_input', user_input = '$user_input', ip_input = '$ip_input', tanggal_edit = '$tanggal_edit', jam_edit = '$jam_edit', user_edit = '$user_edit', ip_edit = '$ip_edit', pemasukan_id = '$pemasukan_id', keterangan = '$keterangan' WHERE  = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_data_pemasukan_edit_history');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_data_pemasukan_edit_history.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["id edit pemasukan","tipe pemasukan","nominal pemasukan","tanggal pemasukan","pemilik pemasukan","tanggal input","jam input","user input","ip input","tanggal edit","jam edit","user edit","ip edit","pemasukan id","keterangan", "action"];

        $calldata = ["tipe_pemasukan","nominal_pemasukan","tanggal_pemasukan","pemilik_pemasukan","tanggal_input","jam_input","user_input","ip_input","tanggal_edit","jam_edit","user_edit","ip_edit","pemasukan_id","keterangan"];

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
