<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_pelajaran_graha_ps extends CI_Controller {

	private $table1 = 'blk_pelajaran_graha_ps';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_pelajaran_graha_ps/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode materi","nama materi","buku hal","penjelasan","keterangan","tipe input","lokasi", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_pelajaran_graha_ps/view', $data);
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
                        'row' => ["kode_materi","nama_materi","buku_hal","penjelasan","keterangan","tipe_input","lokasi"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_graha_ps',
                        'data' => ["kode_materi","nama_materi","buku_hal","penjelasan","keterangan","tipe_input","lokasi"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_graha_ps', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_materi", "2"=>"nama_materi", "3"=>"buku_hal", "4"=>"penjelasan", "5"=>"keterangan", "6"=>"tipe_input", "7"=>"lokasi"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_graha_ps = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_pelajaran_graha_ps/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_graha_ps = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_pelajaran_graha_ps/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_materi = post("kode_materi");
$nama_materi = post("nama_materi");
$buku_hal = post("buku_hal");
$penjelasan = post("penjelasan");
$keterangan = post("keterangan");
$tipe_input = post("tipe_input");
$lokasi = post("lokasi");

        

        $simpan = $this->db->query("
            INSERT INTO blk_pelajaran_graha_ps
            (kode_materi,nama_materi,buku_hal,penjelasan,keterangan,tipe_input,lokasi) VALUES ('$kode_materi','$nama_materi','$buku_hal','$penjelasan','$keterangan','$tipe_input','$lokasi')
        ");
    

        if($simpan){
            redirect('admin/blk_pelajaran_graha_ps');
        }
    }

    public function update(){
          $key = post('id_graha_ps'); $kode_materi = post("kode_materi");
$nama_materi = post("nama_materi");
$buku_hal = post("buku_hal");
$penjelasan = post("penjelasan");
$keterangan = post("keterangan");
$tipe_input = post("tipe_input");
$lokasi = post("lokasi");

        $simpan = $this->db->query("
            UPDATE blk_pelajaran_graha_ps SET  kode_materi = '$kode_materi', nama_materi = '$nama_materi', buku_hal = '$buku_hal', penjelasan = '$penjelasan', keterangan = '$keterangan', tipe_input = '$tipe_input', lokasi = '$lokasi' WHERE id_graha_ps = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_pelajaran_graha_ps');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_pelajaran_graha_ps.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode materi","nama materi","buku hal","penjelasan","keterangan","tipe input","lokasi", "action"];

        $calldata = ["kode_materi","nama_materi","buku_hal","penjelasan","keterangan","tipe_input","lokasi"];

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
