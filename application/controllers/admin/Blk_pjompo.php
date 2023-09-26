<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_pjompo extends CI_Controller {

	private $table1 = 'blk_pjompo';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_pjompo/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id jompo","kode materi","nama materi","penjelasan","keterangan", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_pjompo/view', $data);
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
                        'row' => ["kode_materi","nama_materi","penjelasan","keterangan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => '',
                        'data' => ["kode_materi","nama_materi","penjelasan","keterangan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_materi", "2"=>"nama_materi", "3"=>"penjelasan", "4"=>"keterangan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE  = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_pjompo/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE  = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_pjompo/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_jompo = post("id_jompo");
$kode_materi = post("kode_materi");
$nama_materi = post("nama_materi");
$penjelasan = post("penjelasan");
$keterangan = post("keterangan");

        

        $simpan = $this->db->query("
            INSERT INTO blk_pjompo
            (id_jompo,kode_materi,nama_materi,penjelasan,keterangan) VALUES ('$id_jompo','$kode_materi','$nama_materi','$penjelasan','$keterangan')
        ");
    

        if($simpan){
            redirect('admin/blk_pjompo');
        }
    }

    public function update(){
          $key = post(''); $id_jompo = post("id_jompo");
$kode_materi = post("kode_materi");
$nama_materi = post("nama_materi");
$penjelasan = post("penjelasan");
$keterangan = post("keterangan");

        $simpan = $this->db->query("
            UPDATE blk_pjompo SET  id_jompo = '$id_jompo', kode_materi = '$kode_materi', nama_materi = '$nama_materi', penjelasan = '$penjelasan', keterangan = '$keterangan' WHERE  = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_pjompo');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_pjompo.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["id jompo","kode materi","nama materi","penjelasan","keterangan", "action"];

        $calldata = ["kode_materi","nama_materi","penjelasan","keterangan"];

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
