<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Surat_kerja extends CI_Controller {

	private $table1 = 'surat_kerja';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/surat_kerja/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id majikan","id tki","nopass","jmanak","id keluarga","alamat2","hp2","hubungan2", "action"]);
        $this->Createtable->order_set('0, 8');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/surat_kerja/view', $data);
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
                        'row' => ["id_majikan","id_tki","nopass","jmanak","id_keluarga","alamat2","hp2","hubungan2"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_kerja',
                        'data' => ["id_majikan","id_tki","nopass","jmanak","id_keluarga","alamat2","hp2","hubungan2"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_kerja', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_majikan", "2"=>"id_tki", "3"=>"nopass", "4"=>"jmanak", "5"=>"id_keluarga", "6"=>"alamat2", "7"=>"hp2", "8"=>"hubungan2"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_kerja = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/surat_kerja/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_kerja = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/surat_kerja/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_majikan = post("id_majikan");
$id_tki = post("id_tki");
$nopass = post("nopass");
$jmanak = post("jmanak");
$id_keluarga = post("id_keluarga");
$alamat2 = post("alamat2");
$hp2 = post("hp2");
$hubungan2 = post("hubungan2");

        

        $simpan = $this->db->query("
            INSERT INTO surat_kerja
            (id_majikan,id_tki,nopass,jmanak,id_keluarga,alamat2,hp2,hubungan2) VALUES ('$id_majikan','$id_tki','$nopass','$jmanak','$id_keluarga','$alamat2','$hp2','$hubungan2')
        ");
    

        if($simpan){
            redirect('admin/surat_kerja');
        }
    }

    public function update(){
          $key = post('id_kerja'); $id_majikan = post("id_majikan");
$id_tki = post("id_tki");
$nopass = post("nopass");
$jmanak = post("jmanak");
$id_keluarga = post("id_keluarga");
$alamat2 = post("alamat2");
$hp2 = post("hp2");
$hubungan2 = post("hubungan2");

        $simpan = $this->db->query("
            UPDATE surat_kerja SET  id_majikan = '$id_majikan', id_tki = '$id_tki', nopass = '$nopass', jmanak = '$jmanak', id_keluarga = '$id_keluarga', alamat2 = '$alamat2', hp2 = '$hp2', hubungan2 = '$hubungan2' WHERE id_kerja = '$key'
            ");
    

        if($simpan){
            redirect('admin/surat_kerja');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-surat_kerja.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id majikan","id tki","nopass","jmanak","id keluarga","alamat2","hp2","hubungan2", "action"];

        $calldata = ["id_majikan","id_tki","nopass","jmanak","id_keluarga","alamat2","hp2","hubungan2"];

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
