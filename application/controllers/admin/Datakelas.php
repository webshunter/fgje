<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datakelas extends CI_Controller {

	private $table1 = 'datakelas';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datakelas/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","namakelas","jammasuk","jamkeluar","jumlahjam", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datakelas/view', $data);
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
                        'row' => ["namakelas","jammasuk","jamkeluar","jumlahjam"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_kelas',
                        'data' => ["namakelas","jammasuk","jamkeluar","jumlahjam"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_kelas', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"namakelas", "2"=>"jammasuk", "3"=>"jamkeluar", "4"=>"jumlahjam"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_kelas = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datakelas/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_kelas = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datakelas/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $namakelas = post("namakelas");
$jammasuk = post("jammasuk");
$jamkeluar = post("jamkeluar");
$jumlahjam = post("jumlahjam");

        

        $simpan = $this->db->query("
            INSERT INTO datakelas
            (namakelas,jammasuk,jamkeluar,jumlahjam) VALUES ('$namakelas','$jammasuk','$jamkeluar','$jumlahjam')
        ");
    

        if($simpan){
            redirect('admin/datakelas');
        }
    }

    public function update(){
          $key = post('id_kelas'); $namakelas = post("namakelas");
$jammasuk = post("jammasuk");
$jamkeluar = post("jamkeluar");
$jumlahjam = post("jumlahjam");

        $simpan = $this->db->query("
            UPDATE datakelas SET  namakelas = '$namakelas', jammasuk = '$jammasuk', jamkeluar = '$jamkeluar', jumlahjam = '$jumlahjam' WHERE id_kelas = '$key'
            ");
    

        if($simpan){
            redirect('admin/datakelas');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datakelas.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","namakelas","jammasuk","jamkeluar","jumlahjam", "action"];

        $calldata = ["namakelas","jammasuk","jamkeluar","jumlahjam"];

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
