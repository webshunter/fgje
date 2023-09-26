<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_graha_laundry extends CI_Controller {

	private $table1 = 'blk_graha_laundry';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_graha_laundry/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id graha laundry","kode materi","nama materi","penjelasan materi","keterangan", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_graha_laundry/view', $data);
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
                        'row' => ["kode_materi","nama_materi","penjelasan_materi","keterangan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_graha_laundry',
                        'data' => ["kode_materi","nama_materi","penjelasan_materi","keterangan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_graha_laundry', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_materi", "2"=>"nama_materi", "3"=>"penjelasan_materi", "4"=>"keterangan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_graha_laundry = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_graha_laundry/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_graha_laundry = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_graha_laundry/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_graha_laundry = post("id_graha_laundry");
$kode_materi = post("kode_materi");
$nama_materi = post("nama_materi");
$penjelasan_materi = post("penjelasan_materi");
$keterangan = post("keterangan");

        

        $simpan = $this->db->query("
            INSERT INTO blk_graha_laundry
            (id_graha_laundry,kode_materi,nama_materi,penjelasan_materi,keterangan) VALUES ('$id_graha_laundry','$kode_materi','$nama_materi','$penjelasan_materi','$keterangan')
        ");
    

        if($simpan){
            redirect('admin/blk_graha_laundry');
        }
    }

    public function update(){
          $key = post('id_graha_laundry'); $id_graha_laundry = post("id_graha_laundry");
$kode_materi = post("kode_materi");
$nama_materi = post("nama_materi");
$penjelasan_materi = post("penjelasan_materi");
$keterangan = post("keterangan");

        $simpan = $this->db->query("
            UPDATE blk_graha_laundry SET  id_graha_laundry = '$id_graha_laundry', kode_materi = '$kode_materi', nama_materi = '$nama_materi', penjelasan_materi = '$penjelasan_materi', keterangan = '$keterangan' WHERE id_graha_laundry = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_graha_laundry');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_graha_laundry.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["id graha laundry","kode materi","nama materi","penjelasan materi","keterangan", "action"];

        $calldata = ["kode_materi","nama_materi","penjelasan_materi","keterangan"];

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
