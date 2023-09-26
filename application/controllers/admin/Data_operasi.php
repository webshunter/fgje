<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Data_operasi extends CI_Controller {

	private $table1 = 'data_operasi';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/data_operasi/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tahun","keterangan","dihapus", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/data_operasi/view', $data);
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
                        'row' => ["id_biodata","tahun","keterangan","dihapus"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_operasi',
                        'data' => ["id_biodata","tahun","keterangan","dihapus"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_operasi', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tahun", "3"=>"keterangan", "4"=>"dihapus"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_operasi = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/data_operasi/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_operasi = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/data_operasi/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tahun = post("tahun");
$keterangan = post("keterangan");
$dihapus = post("dihapus");

        

        $simpan = $this->db->query("
            INSERT INTO data_operasi
            (id_biodata,tahun,keterangan,dihapus) VALUES ('$id_biodata','$tahun','$keterangan','$dihapus')
        ");
    

        if($simpan){
            redirect('admin/data_operasi');
        }
    }

    public function update(){
          $key = post('id_operasi'); $id_biodata = post("id_biodata");
$tahun = post("tahun");
$keterangan = post("keterangan");
$dihapus = post("dihapus");

        $simpan = $this->db->query("
            UPDATE data_operasi SET  id_biodata = '$id_biodata', tahun = '$tahun', keterangan = '$keterangan', dihapus = '$dihapus' WHERE id_operasi = '$key'
            ");
    

        if($simpan){
            redirect('admin/data_operasi');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-data_operasi.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tahun","keterangan","dihapus", "action"];

        $calldata = ["id_biodata","tahun","keterangan","dihapus"];

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
