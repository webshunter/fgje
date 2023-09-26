<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Data_pengeluaran_delete_history extends CI_Controller {

	private $table1 = 'data_pengeluaran_delete_history';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/data_pengeluaran_delete_history/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id data pengeluaran","tipe pengeluaran","nominal pengeluaran","tanggal pengeluaran","tanggal input","jam input","user input","ip input","tanggal edit","jam edit","user edit","ip edit","tanggal delete","jam delete","user delete","ip delete","pengeluaran id","keterangan", "action"]);
        $this->Createtable->order_set('0, 17');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/data_pengeluaran_delete_history/view', $data);
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
                        'row' => ["tipe_pengeluaran","nominal_pengeluaran","tanggal_pengeluaran","tanggal_input","jam_input","user_input","ip_input","tanggal_edit","jam_edit","user_edit","ip_edit","tanggal_delete","jam_delete","user_delete","ip_delete","pengeluaran_id","keterangan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_data_pengeluaran',
                        'data' => ["tipe_pengeluaran","nominal_pengeluaran","tanggal_pengeluaran","tanggal_input","jam_input","user_input","ip_input","tanggal_edit","jam_edit","user_edit","ip_edit","tanggal_delete","jam_delete","user_delete","ip_delete","pengeluaran_id","keterangan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_data_pengeluaran', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tipe_pengeluaran", "2"=>"nominal_pengeluaran", "3"=>"tanggal_pengeluaran", "4"=>"tanggal_input", "5"=>"jam_input", "6"=>"user_input", "7"=>"ip_input", "8"=>"tanggal_edit", "9"=>"jam_edit", "10"=>"user_edit", "11"=>"ip_edit", "12"=>"tanggal_delete", "13"=>"jam_delete", "14"=>"user_delete", "15"=>"ip_delete", "16"=>"pengeluaran_id", "17"=>"keterangan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_data_pengeluaran = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/data_pengeluaran_delete_history/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_data_pengeluaran = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/data_pengeluaran_delete_history/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_data_pengeluaran = post("id_data_pengeluaran");
$tipe_pengeluaran = post("tipe_pengeluaran");
$nominal_pengeluaran = post("nominal_pengeluaran");
$tanggal_pengeluaran = post("tanggal_pengeluaran");
$tanggal_input = post("tanggal_input");
$jam_input = post("jam_input");
$user_input = post("user_input");
$ip_input = post("ip_input");
$tanggal_edit = post("tanggal_edit");
$jam_edit = post("jam_edit");
$user_edit = post("user_edit");
$ip_edit = post("ip_edit");
$tanggal_delete = post("tanggal_delete");
$jam_delete = post("jam_delete");
$user_delete = post("user_delete");
$ip_delete = post("ip_delete");
$pengeluaran_id = post("pengeluaran_id");
$keterangan = post("keterangan");

        

        $simpan = $this->db->query("
            INSERT INTO data_pengeluaran_delete_history
            (id_data_pengeluaran,tipe_pengeluaran,nominal_pengeluaran,tanggal_pengeluaran,tanggal_input,jam_input,user_input,ip_input,tanggal_edit,jam_edit,user_edit,ip_edit,tanggal_delete,jam_delete,user_delete,ip_delete,pengeluaran_id,keterangan) VALUES ('$id_data_pengeluaran','$tipe_pengeluaran','$nominal_pengeluaran','$tanggal_pengeluaran','$tanggal_input','$jam_input','$user_input','$ip_input','$tanggal_edit','$jam_edit','$user_edit','$ip_edit','$tanggal_delete','$jam_delete','$user_delete','$ip_delete','$pengeluaran_id','$keterangan')
        ");
    

        if($simpan){
            redirect('admin/data_pengeluaran_delete_history');
        }
    }

    public function update(){
          $key = post(''); $id_data_pengeluaran = post("id_data_pengeluaran");
$tipe_pengeluaran = post("tipe_pengeluaran");
$nominal_pengeluaran = post("nominal_pengeluaran");
$tanggal_pengeluaran = post("tanggal_pengeluaran");
$tanggal_input = post("tanggal_input");
$jam_input = post("jam_input");
$user_input = post("user_input");
$ip_input = post("ip_input");
$tanggal_edit = post("tanggal_edit");
$jam_edit = post("jam_edit");
$user_edit = post("user_edit");
$ip_edit = post("ip_edit");
$tanggal_delete = post("tanggal_delete");
$jam_delete = post("jam_delete");
$user_delete = post("user_delete");
$ip_delete = post("ip_delete");
$pengeluaran_id = post("pengeluaran_id");
$keterangan = post("keterangan");

        $simpan = $this->db->query("
            UPDATE data_pengeluaran_delete_history SET  id_data_pengeluaran = '$id_data_pengeluaran', tipe_pengeluaran = '$tipe_pengeluaran', nominal_pengeluaran = '$nominal_pengeluaran', tanggal_pengeluaran = '$tanggal_pengeluaran', tanggal_input = '$tanggal_input', jam_input = '$jam_input', user_input = '$user_input', ip_input = '$ip_input', tanggal_edit = '$tanggal_edit', jam_edit = '$jam_edit', user_edit = '$user_edit', ip_edit = '$ip_edit', tanggal_delete = '$tanggal_delete', jam_delete = '$jam_delete', user_delete = '$user_delete', ip_delete = '$ip_delete', pengeluaran_id = '$pengeluaran_id', keterangan = '$keterangan' WHERE  = '$key'
            ");
    

        if($simpan){
            redirect('admin/data_pengeluaran_delete_history');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-data_pengeluaran_delete_history.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["id data pengeluaran","tipe pengeluaran","nominal pengeluaran","tanggal pengeluaran","tanggal input","jam input","user input","ip input","tanggal edit","jam edit","user edit","ip edit","tanggal delete","jam delete","user delete","ip delete","pengeluaran id","keterangan", "action"];

        $calldata = ["tipe_pengeluaran","nominal_pengeluaran","tanggal_pengeluaran","tanggal_input","jam_input","user_input","ip_input","tanggal_edit","jam_edit","user_edit","ip_edit","tanggal_delete","jam_delete","user_delete","ip_delete","pengeluaran_id","keterangan"];

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
