<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Durasi extends CI_Controller {

	private $table1 = 'durasi';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/durasi/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tgl update","tgl habisdurasi","tgl registrasi","jml hari","status", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/durasi/view', $data);
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
                        'row' => ["id_biodata","tgl_update","tgl_habisdurasi","tgl_registrasi","jml_hari","status"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_durasi',
                        'data' => ["id_biodata","tgl_update","tgl_habisdurasi","tgl_registrasi","jml_hari","status"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_durasi', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tgl_update", "3"=>"tgl_habisdurasi", "4"=>"tgl_registrasi", "5"=>"jml_hari", "6"=>"status"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_durasi = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/durasi/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_durasi = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/durasi/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tgl_update = post("tgl_update");
$tgl_habisdurasi = post("tgl_habisdurasi");
$tgl_registrasi = post("tgl_registrasi");
$jml_hari = post("jml_hari");
$status = post("status");

        

        $simpan = $this->db->query("
            INSERT INTO durasi
            (id_biodata,tgl_update,tgl_habisdurasi,tgl_registrasi,jml_hari,status) VALUES ('$id_biodata','$tgl_update','$tgl_habisdurasi','$tgl_registrasi','$jml_hari','$status')
        ");
    

        if($simpan){
            redirect('admin/durasi');
        }
    }

    public function update(){
          $key = post('id_durasi'); $id_biodata = post("id_biodata");
$tgl_update = post("tgl_update");
$tgl_habisdurasi = post("tgl_habisdurasi");
$tgl_registrasi = post("tgl_registrasi");
$jml_hari = post("jml_hari");
$status = post("status");

        $simpan = $this->db->query("
            UPDATE durasi SET  id_biodata = '$id_biodata', tgl_update = '$tgl_update', tgl_habisdurasi = '$tgl_habisdurasi', tgl_registrasi = '$tgl_registrasi', jml_hari = '$jml_hari', status = '$status' WHERE id_durasi = '$key'
            ");
    

        if($simpan){
            redirect('admin/durasi');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-durasi.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tgl update","tgl habisdurasi","tgl registrasi","jml hari","status", "action"];

        $calldata = ["id_biodata","tgl_update","tgl_habisdurasi","tgl_registrasi","jml_hari","status"];

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
