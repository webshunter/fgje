<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datasektor extends CI_Controller {

	private $table1 = 'datasektor';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datasektor/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode jenis","isi","isi taiwan","no urut","jeniskelamin", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datasektor/view', $data);
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
                        'row' => ["kode_jenis","isi","isi_taiwan","no_urut","jeniskelamin"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_jenis',
                        'data' => ["kode_jenis","isi","isi_taiwan","no_urut","jeniskelamin"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_jenis', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_jenis", "2"=>"isi", "3"=>"isi_taiwan", "4"=>"no_urut", "5"=>"jeniskelamin"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_jenis = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datasektor/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_jenis = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datasektor/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_jenis = post("kode_jenis");
$isi = post("isi");
$isi_taiwan = post("isi_taiwan");
$no_urut = post("no_urut");
$jeniskelamin = post("jeniskelamin");

        

        $simpan = $this->db->query("
            INSERT INTO datasektor
            (kode_jenis,isi,isi_taiwan,no_urut,jeniskelamin) VALUES ('$kode_jenis','$isi','$isi_taiwan','$no_urut','$jeniskelamin')
        ");
    

        if($simpan){
            redirect('admin/datasektor');
        }
    }

    public function update(){
          $key = post('id_jenis'); $kode_jenis = post("kode_jenis");
$isi = post("isi");
$isi_taiwan = post("isi_taiwan");
$no_urut = post("no_urut");
$jeniskelamin = post("jeniskelamin");

        $simpan = $this->db->query("
            UPDATE datasektor SET  kode_jenis = '$kode_jenis', isi = '$isi', isi_taiwan = '$isi_taiwan', no_urut = '$no_urut', jeniskelamin = '$jeniskelamin' WHERE id_jenis = '$key'
            ");
    

        if($simpan){
            redirect('admin/datasektor');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datasektor.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode jenis","isi","isi taiwan","no urut","jeniskelamin", "action"];

        $calldata = ["kode_jenis","isi","isi_taiwan","no_urut","jeniskelamin"];

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
