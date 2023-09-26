<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_lembaga_lsp extends CI_Controller {

	private $table1 = 'blk_lembaga_lsp';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_lembaga_lsp/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama","alamat","bank","ket", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_lembaga_lsp/view', $data);
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
                        'row' => ["nama","alamat","bank","ket"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_lembaga_lsp',
                        'data' => ["nama","alamat","bank","ket"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_lembaga_lsp', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama", "2"=>"alamat", "3"=>"bank", "4"=>"ket"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_lembaga_lsp = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_lembaga_lsp/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_lembaga_lsp = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_lembaga_lsp/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nama = post("nama");
$alamat = post("alamat");
$bank = post("bank");
$ket = post("ket");

        

        $simpan = $this->db->query("
            INSERT INTO blk_lembaga_lsp
            (nama,alamat,bank,ket) VALUES ('$nama','$alamat','$bank','$ket')
        ");
    

        if($simpan){
            redirect('admin/blk_lembaga_lsp');
        }
    }

    public function update(){
          $key = post('id_lembaga_lsp'); $nama = post("nama");
$alamat = post("alamat");
$bank = post("bank");
$ket = post("ket");

        $simpan = $this->db->query("
            UPDATE blk_lembaga_lsp SET  nama = '$nama', alamat = '$alamat', bank = '$bank', ket = '$ket' WHERE id_lembaga_lsp = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_lembaga_lsp');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_lembaga_lsp.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nama","alamat","bank","ket", "action"];

        $calldata = ["nama","alamat","bank","ket"];

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
