<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_pelatihan_graha_ruang extends CI_Controller {

	private $table1 = 'blk_pelatihan_graha_ruang';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_pelatihan_graha_ruang/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode materi","nama materi","buku hal","penjelasan","keterangan", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_pelatihan_graha_ruang/view', $data);
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
                        'row' => ["kode_materi","nama_materi","buku_hal","penjelasan","keterangan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_graha_ruang',
                        'data' => ["kode_materi","nama_materi","buku_hal","penjelasan","keterangan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_graha_ruang', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_materi", "2"=>"nama_materi", "3"=>"buku_hal", "4"=>"penjelasan", "5"=>"keterangan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_graha_ruang = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_pelatihan_graha_ruang/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_graha_ruang = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_pelatihan_graha_ruang/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_materi = post("kode_materi");
$nama_materi = post("nama_materi");
$buku_hal = post("buku_hal");
$penjelasan = post("penjelasan");
$keterangan = post("keterangan");

        

        $simpan = $this->db->query("
            INSERT INTO blk_pelatihan_graha_ruang
            (kode_materi,nama_materi,buku_hal,penjelasan,keterangan) VALUES ('$kode_materi','$nama_materi','$buku_hal','$penjelasan','$keterangan')
        ");
    

        if($simpan){
            redirect('admin/blk_pelatihan_graha_ruang');
        }
    }

    public function update(){
          $key = post('id_graha_ruang'); $kode_materi = post("kode_materi");
$nama_materi = post("nama_materi");
$buku_hal = post("buku_hal");
$penjelasan = post("penjelasan");
$keterangan = post("keterangan");

        $simpan = $this->db->query("
            UPDATE blk_pelatihan_graha_ruang SET  kode_materi = '$kode_materi', nama_materi = '$nama_materi', buku_hal = '$buku_hal', penjelasan = '$penjelasan', keterangan = '$keterangan' WHERE id_graha_ruang = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_pelatihan_graha_ruang');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_pelatihan_graha_ruang.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode materi","nama materi","buku hal","penjelasan","keterangan", "action"];

        $calldata = ["kode_materi","nama_materi","buku_hal","penjelasan","keterangan"];

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
