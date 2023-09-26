<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_jadwal3_paket extends CI_Controller {

	private $table1 = 'blk_jadwal3_paket';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_jadwal3_paket/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama paket","pelajaran id","pelajaran revisi id","detail","created at","updated at","deleted at", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwal3_paket/view', $data);
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
                        'row' => ["nama_paket","pelajaran_id","pelajaran_revisi_id","detail","created_at","updated_at","deleted_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama_paket","pelajaran_id","pelajaran_revisi_id","detail","created_at","updated_at","deleted_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama_paket", "2"=>"pelajaran_id", "3"=>"pelajaran_revisi_id", "4"=>"detail", "5"=>"created_at", "6"=>"updated_at", "7"=>"deleted_at"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_jadwal3_paket/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwal3_paket/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nama_paket = post("nama_paket");
$pelajaran_id = post("pelajaran_id");
$pelajaran_revisi_id = post("pelajaran_revisi_id");
$detail = post("detail");
$created_at = post("created_at");
$updated_at = post("updated_at");
$deleted_at = post("deleted_at");

        

        $simpan = $this->db->query("
            INSERT INTO blk_jadwal3_paket
            (nama_paket,pelajaran_id,pelajaran_revisi_id,detail,created_at,updated_at,deleted_at) VALUES ('$nama_paket','$pelajaran_id','$pelajaran_revisi_id','$detail','$created_at','$updated_at','$deleted_at')
        ");
    

        if($simpan){
            redirect('admin/blk_jadwal3_paket');
        }
    }

    public function update(){
          $key = post('id'); $nama_paket = post("nama_paket");
$pelajaran_id = post("pelajaran_id");
$pelajaran_revisi_id = post("pelajaran_revisi_id");
$detail = post("detail");
$created_at = post("created_at");
$updated_at = post("updated_at");
$deleted_at = post("deleted_at");

        $simpan = $this->db->query("
            UPDATE blk_jadwal3_paket SET  nama_paket = '$nama_paket', pelajaran_id = '$pelajaran_id', pelajaran_revisi_id = '$pelajaran_revisi_id', detail = '$detail', created_at = '$created_at', updated_at = '$updated_at', deleted_at = '$deleted_at' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_jadwal3_paket');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_jadwal3_paket.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nama paket","pelajaran id","pelajaran revisi id","detail","created at","updated at","deleted at", "action"];

        $calldata = ["nama_paket","pelajaran_id","pelajaran_revisi_id","detail","created_at","updated_at","deleted_at"];

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
