<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_inventaris extends CI_Controller {

	private $table1 = 'blk_inventaris';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_inventaris/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","tglmasuk","id barang","tglkeluar","jumlah","jumlahkeluar","pemohon", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_inventaris/view', $data);
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
                        'row' => ["tglmasuk","id_barang","tglkeluar","jumlah","jumlahkeluar","pemohon"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_inventaris',
                        'data' => ["tglmasuk","id_barang","tglkeluar","jumlah","jumlahkeluar","pemohon"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_inventaris', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tglmasuk", "2"=>"id_barang", "3"=>"tglkeluar", "4"=>"jumlah", "5"=>"jumlahkeluar", "6"=>"pemohon"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_inventaris = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_inventaris/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_inventaris = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_inventaris/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $tglmasuk = post("tglmasuk");
$id_barang = post("id_barang");
$tglkeluar = post("tglkeluar");
$jumlah = post("jumlah");
$jumlahkeluar = post("jumlahkeluar");
$pemohon = post("pemohon");

        

        $simpan = $this->db->query("
            INSERT INTO blk_inventaris
            (tglmasuk,id_barang,tglkeluar,jumlah,jumlahkeluar,pemohon) VALUES ('$tglmasuk','$id_barang','$tglkeluar','$jumlah','$jumlahkeluar','$pemohon')
        ");
    

        if($simpan){
            redirect('admin/blk_inventaris');
        }
    }

    public function update(){
          $key = post('id_inventaris'); $tglmasuk = post("tglmasuk");
$id_barang = post("id_barang");
$tglkeluar = post("tglkeluar");
$jumlah = post("jumlah");
$jumlahkeluar = post("jumlahkeluar");
$pemohon = post("pemohon");

        $simpan = $this->db->query("
            UPDATE blk_inventaris SET  tglmasuk = '$tglmasuk', id_barang = '$id_barang', tglkeluar = '$tglkeluar', jumlah = '$jumlah', jumlahkeluar = '$jumlahkeluar', pemohon = '$pemohon' WHERE id_inventaris = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_inventaris');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_inventaris.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","tglmasuk","id barang","tglkeluar","jumlah","jumlahkeluar","pemohon", "action"];

        $calldata = ["tglmasuk","id_barang","tglkeluar","jumlah","jumlahkeluar","pemohon"];

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
