<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pembuatan_tabeldis3 extends CI_Controller {

	private $table1 = 'pembuatan_tabeldis3';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/pembuatan_tabeldis3/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","daerah","tanggal","biaya","asuransi", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pembuatan_tabeldis3/view', $data);
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
                        'row' => ["daerah","tanggal","biaya","asuransi"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_pembuatan',
                        'data' => ["daerah","tanggal","biaya","asuransi"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_pembuatan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"daerah", "2"=>"tanggal", "3"=>"biaya", "4"=>"asuransi"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_pembuatan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/pembuatan_tabeldis3/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_pembuatan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pembuatan_tabeldis3/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $daerah = post("daerah");
$tanggal = post("tanggal");
$biaya = post("biaya");
$asuransi = post("asuransi");

        

        $simpan = $this->db->query("
            INSERT INTO pembuatan_tabeldis3
            (daerah,tanggal,biaya,asuransi) VALUES ('$daerah','$tanggal','$biaya','$asuransi')
        ");
    

        if($simpan){
            redirect('admin/pembuatan_tabeldis3');
        }
    }

    public function update(){
          $key = post('id_pembuatan'); $daerah = post("daerah");
$tanggal = post("tanggal");
$biaya = post("biaya");
$asuransi = post("asuransi");

        $simpan = $this->db->query("
            UPDATE pembuatan_tabeldis3 SET  daerah = '$daerah', tanggal = '$tanggal', biaya = '$biaya', asuransi = '$asuransi' WHERE id_pembuatan = '$key'
            ");
    

        if($simpan){
            redirect('admin/pembuatan_tabeldis3');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-pembuatan_tabeldis3.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","daerah","tanggal","biaya","asuransi", "action"];

        $calldata = ["daerah","tanggal","biaya","asuransi"];

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
