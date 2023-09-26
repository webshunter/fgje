<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_izin_keperluan extends CI_Controller {

	private $table1 = 'blk_izin_keperluan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_izin_keperluan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode izin keperluan","ket", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_izin_keperluan/view', $data);
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
                        'row' => ["kode_izin_keperluan","ket"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_izin_keperluan',
                        'data' => ["kode_izin_keperluan","ket"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_izin_keperluan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_izin_keperluan", "2"=>"ket"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_izin_keperluan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_izin_keperluan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_izin_keperluan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_izin_keperluan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_izin_keperluan = post("kode_izin_keperluan");
$ket = post("ket");

        

        $simpan = $this->db->query("
            INSERT INTO blk_izin_keperluan
            (kode_izin_keperluan,ket) VALUES ('$kode_izin_keperluan','$ket')
        ");
    

        if($simpan){
            redirect('admin/blk_izin_keperluan');
        }
    }

    public function update(){
          $key = post('id_izin_keperluan'); $kode_izin_keperluan = post("kode_izin_keperluan");
$ket = post("ket");

        $simpan = $this->db->query("
            UPDATE blk_izin_keperluan SET  kode_izin_keperluan = '$kode_izin_keperluan', ket = '$ket' WHERE id_izin_keperluan = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_izin_keperluan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_izin_keperluan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode izin keperluan","ket", "action"];

        $calldata = ["kode_izin_keperluan","ket"];

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
