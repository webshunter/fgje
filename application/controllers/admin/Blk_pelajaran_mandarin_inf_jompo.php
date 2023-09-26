<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_pelajaran_mandarin_inf_jompo extends CI_Controller {

	private $table1 = 'blk_pelajaran_mandarin_inf_jompo';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_pelajaran_mandarin_inf_jompo/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode materi","nama materi","buku hal","penjelasan","keterangan","tipe input", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_pelajaran_mandarin_inf_jompo/view', $data);
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
                        'row' => ["kode_materi","nama_materi","buku_hal","penjelasan","keterangan","tipe_input"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_mandarin_inf_jompo',
                        'data' => ["kode_materi","nama_materi","buku_hal","penjelasan","keterangan","tipe_input"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_mandarin_inf_jompo', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_materi", "2"=>"nama_materi", "3"=>"buku_hal", "4"=>"penjelasan", "5"=>"keterangan", "6"=>"tipe_input"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_mandarin_inf_jompo = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_pelajaran_mandarin_inf_jompo/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_mandarin_inf_jompo = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_pelajaran_mandarin_inf_jompo/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_materi = post("kode_materi");
$nama_materi = post("nama_materi");
$buku_hal = post("buku_hal");
$penjelasan = post("penjelasan");
$keterangan = post("keterangan");
$tipe_input = post("tipe_input");

        

        $simpan = $this->db->query("
            INSERT INTO blk_pelajaran_mandarin_inf_jompo
            (kode_materi,nama_materi,buku_hal,penjelasan,keterangan,tipe_input) VALUES ('$kode_materi','$nama_materi','$buku_hal','$penjelasan','$keterangan','$tipe_input')
        ");
    

        if($simpan){
            redirect('admin/blk_pelajaran_mandarin_inf_jompo');
        }
    }

    public function update(){
          $key = post('id_mandarin_inf_jompo'); $kode_materi = post("kode_materi");
$nama_materi = post("nama_materi");
$buku_hal = post("buku_hal");
$penjelasan = post("penjelasan");
$keterangan = post("keterangan");
$tipe_input = post("tipe_input");

        $simpan = $this->db->query("
            UPDATE blk_pelajaran_mandarin_inf_jompo SET  kode_materi = '$kode_materi', nama_materi = '$nama_materi', buku_hal = '$buku_hal', penjelasan = '$penjelasan', keterangan = '$keterangan', tipe_input = '$tipe_input' WHERE id_mandarin_inf_jompo = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_pelajaran_mandarin_inf_jompo');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_pelajaran_mandarin_inf_jompo.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode materi","nama materi","buku hal","penjelasan","keterangan","tipe input", "action"];

        $calldata = ["kode_materi","nama_materi","buku_hal","penjelasan","keterangan","tipe_input"];

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
