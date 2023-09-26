<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Buka_rekening_baru extends CI_Controller {

	private $table1 = 'buka_rekening_baru';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/buka_rekening_baru/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tanggal buka rek","data berkas","hapus", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/buka_rekening_baru/view', $data);
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
                        'row' => ["id_biodata","tanggal_buka_rek","data_berkas","hapus"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["id_biodata","tanggal_buka_rek","data_berkas","hapus"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tanggal_buka_rek", "3"=>"data_berkas", "4"=>"hapus"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/buka_rekening_baru/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/buka_rekening_baru/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tanggal_buka_rek = post("tanggal_buka_rek");
$data_berkas = post("data_berkas");
$hapus = post("hapus");

        

        $simpan = $this->db->query("
            INSERT INTO buka_rekening_baru
            (id_biodata,tanggal_buka_rek,data_berkas,hapus) VALUES ('$id_biodata','$tanggal_buka_rek','$data_berkas','$hapus')
        ");
    

        if($simpan){
            redirect('admin/buka_rekening_baru');
        }
    }

    public function update(){
          $key = post('id'); $id_biodata = post("id_biodata");
$tanggal_buka_rek = post("tanggal_buka_rek");
$data_berkas = post("data_berkas");
$hapus = post("hapus");

        $simpan = $this->db->query("
            UPDATE buka_rekening_baru SET  id_biodata = '$id_biodata', tanggal_buka_rek = '$tanggal_buka_rek', data_berkas = '$data_berkas', hapus = '$hapus' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/buka_rekening_baru');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-buka_rekening_baru.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tanggal buka rek","data berkas","hapus", "action"];

        $calldata = ["id_biodata","tanggal_buka_rek","data_berkas","hapus"];

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
