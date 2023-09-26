<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Absensi extends CI_Controller {

	private $table1 = 'absensi';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/absensi/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","nama","jenis","keterangan","tanggal abs","waktu","jenis abs", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/absensi/view', $data);
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
                        'row' => ["id_biodata","nama","jenis","keterangan","tanggal_abs","waktu","jenis_abs"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_absensi',
                        'data' => ["id_biodata","nama","jenis","keterangan","tanggal_abs","waktu","jenis_abs"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_absensi', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"nama", "3"=>"jenis", "4"=>"keterangan", "5"=>"tanggal_abs", "6"=>"waktu", "7"=>"jenis_abs"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_absensi = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/absensi/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_absensi = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/absensi/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$nama = post("nama");
$jenis = post("jenis");
$keterangan = post("keterangan");
$tanggal_abs = post("tanggal_abs");
$waktu = post("waktu");
$jenis_abs = post("jenis_abs");

        

        $simpan = $this->db->query("
            INSERT INTO absensi
            (id_biodata,nama,jenis,keterangan,tanggal_abs,waktu,jenis_abs) VALUES ('$id_biodata','$nama','$jenis','$keterangan','$tanggal_abs','$waktu','$jenis_abs')
        ");
    

        if($simpan){
            redirect('admin/absensi');
        }
    }

    public function update(){
          $key = post('id_absensi'); $id_biodata = post("id_biodata");
$nama = post("nama");
$jenis = post("jenis");
$keterangan = post("keterangan");
$tanggal_abs = post("tanggal_abs");
$waktu = post("waktu");
$jenis_abs = post("jenis_abs");

        $simpan = $this->db->query("
            UPDATE absensi SET  id_biodata = '$id_biodata', nama = '$nama', jenis = '$jenis', keterangan = '$keterangan', tanggal_abs = '$tanggal_abs', waktu = '$waktu', jenis_abs = '$jenis_abs' WHERE id_absensi = '$key'
            ");
    

        if($simpan){
            redirect('admin/absensi');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-absensi.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","nama","jenis","keterangan","tanggal abs","waktu","jenis abs", "action"];

        $calldata = ["id_biodata","nama","jenis","keterangan","tanggal_abs","waktu","jenis_abs"];

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
