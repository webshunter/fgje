<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_formulir extends CI_Controller {

	private $table1 = 'blk_formulir';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_formulir/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","tgl pengajuan","tgl keluar","tgl ujk","tipe","resi no", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_formulir/view', $data);
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
                        'row' => ["tgl_pengajuan","tgl_keluar","tgl_ujk","tipe","resi_no"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_formulir',
                        'data' => ["tgl_pengajuan","tgl_keluar","tgl_ujk","tipe","resi_no"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_formulir', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tgl_pengajuan", "2"=>"tgl_keluar", "3"=>"tgl_ujk", "4"=>"tipe", "5"=>"resi_no"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_formulir = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_formulir/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_formulir = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_formulir/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $tgl_pengajuan = post("tgl_pengajuan");
$tgl_keluar = post("tgl_keluar");
$tgl_ujk = post("tgl_ujk");
$tipe = post("tipe");
$resi_no = post("resi_no");

        

        $simpan = $this->db->query("
            INSERT INTO blk_formulir
            (tgl_pengajuan,tgl_keluar,tgl_ujk,tipe,resi_no) VALUES ('$tgl_pengajuan','$tgl_keluar','$tgl_ujk','$tipe','$resi_no')
        ");
    

        if($simpan){
            redirect('admin/blk_formulir');
        }
    }

    public function update(){
          $key = post('id_formulir'); $tgl_pengajuan = post("tgl_pengajuan");
$tgl_keluar = post("tgl_keluar");
$tgl_ujk = post("tgl_ujk");
$tipe = post("tipe");
$resi_no = post("resi_no");

        $simpan = $this->db->query("
            UPDATE blk_formulir SET  tgl_pengajuan = '$tgl_pengajuan', tgl_keluar = '$tgl_keluar', tgl_ujk = '$tgl_ujk', tipe = '$tipe', resi_no = '$resi_no' WHERE id_formulir = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_formulir');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_formulir.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","tgl pengajuan","tgl keluar","tgl ujk","tipe","resi no", "action"];

        $calldata = ["tgl_pengajuan","tgl_keluar","tgl_ujk","tipe","resi_no"];

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
