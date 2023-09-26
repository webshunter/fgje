<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datasponsor extends CI_Controller {

	private $table1 = 'datasponsor';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datasponsor/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode sponsor","nama","hp","email","alamat","status", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datasponsor/view', $data);
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
                        'row' => ["kode_sponsor","nama","hp","email","alamat","status"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_sponsor',
                        'data' => ["kode_sponsor","nama","hp","email","alamat","status"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_sponsor', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_sponsor", "2"=>"nama", "3"=>"hp", "4"=>"email", "5"=>"alamat", "6"=>"status"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_sponsor = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datasponsor/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_sponsor = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datasponsor/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_sponsor = post("kode_sponsor");
$nama = post("nama");
$hp = post("hp");
$email = post("email");
$alamat = post("alamat");
$status = post("status");

        

        $simpan = $this->db->query("
            INSERT INTO datasponsor
            (kode_sponsor,nama,hp,email,alamat,status) VALUES ('$kode_sponsor','$nama','$hp','$email','$alamat','$status')
        ");
    

        if($simpan){
            redirect('admin/datasponsor');
        }
    }

    public function update(){
          $key = post('id_sponsor'); $kode_sponsor = post("kode_sponsor");
$nama = post("nama");
$hp = post("hp");
$email = post("email");
$alamat = post("alamat");
$status = post("status");

        $simpan = $this->db->query("
            UPDATE datasponsor SET  kode_sponsor = '$kode_sponsor', nama = '$nama', hp = '$hp', email = '$email', alamat = '$alamat', status = '$status' WHERE id_sponsor = '$key'
            ");
    

        if($simpan){
            redirect('admin/datasponsor');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datasponsor.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode sponsor","nama","hp","email","alamat","status", "action"];

        $calldata = ["kode_sponsor","nama","hp","email","alamat","status"];

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
