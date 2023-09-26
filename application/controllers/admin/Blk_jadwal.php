<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_jadwal extends CI_Controller {

	private $table1 = 'blk_jadwal';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_jadwal/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama jadwal","minggu id","kode jadwal", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwal/view', $data);
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
                        'row' => ["nama_jadwal","minggu_id","kode_jadwal"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_blk_jadwal',
                        'data' => ["nama_jadwal","minggu_id","kode_jadwal"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_blk_jadwal', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama_jadwal", "2"=>"minggu_id", "3"=>"kode_jadwal"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_blk_jadwal = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_jadwal/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_blk_jadwal = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwal/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nama_jadwal = post("nama_jadwal");
$minggu_id = post("minggu_id");
$kode_jadwal = post("kode_jadwal");

        

        $simpan = $this->db->query("
            INSERT INTO blk_jadwal
            (nama_jadwal,minggu_id,kode_jadwal) VALUES ('$nama_jadwal','$minggu_id','$kode_jadwal')
        ");
    

        if($simpan){
            redirect('admin/blk_jadwal');
        }
    }

    public function update(){
          $key = post('id_blk_jadwal'); $nama_jadwal = post("nama_jadwal");
$minggu_id = post("minggu_id");
$kode_jadwal = post("kode_jadwal");

        $simpan = $this->db->query("
            UPDATE blk_jadwal SET  nama_jadwal = '$nama_jadwal', minggu_id = '$minggu_id', kode_jadwal = '$kode_jadwal' WHERE id_blk_jadwal = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_jadwal');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_jadwal.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nama jadwal","minggu id","kode jadwal", "action"];

        $calldata = ["nama_jadwal","minggu_id","kode_jadwal"];

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
