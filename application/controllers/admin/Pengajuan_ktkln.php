<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pengajuan_ktkln extends CI_Controller {

	private $table1 = 'pengajuan_ktkln';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/pengajuan_ktkln/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nomor 2","kepada 2","tki 2", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pengajuan_ktkln/view', $data);
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
                        'row' => ["nomor_2","kepada_2","tki_2"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_ktkln',
                        'data' => ["nomor_2","kepada_2","tki_2"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_ktkln', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nomor_2", "2"=>"kepada_2", "3"=>"tki_2"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_ktkln = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/pengajuan_ktkln/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_ktkln = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pengajuan_ktkln/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nomor_2 = post("nomor_2");
$kepada_2 = post("kepada_2");
$tki_2 = post("tki_2");

        

        $simpan = $this->db->query("
            INSERT INTO pengajuan_ktkln
            (nomor_2,kepada_2,tki_2) VALUES ('$nomor_2','$kepada_2','$tki_2')
        ");
    

        if($simpan){
            redirect('admin/pengajuan_ktkln');
        }
    }

    public function update(){
          $key = post('id_ktkln'); $nomor_2 = post("nomor_2");
$kepada_2 = post("kepada_2");
$tki_2 = post("tki_2");

        $simpan = $this->db->query("
            UPDATE pengajuan_ktkln SET  nomor_2 = '$nomor_2', kepada_2 = '$kepada_2', tki_2 = '$tki_2' WHERE id_ktkln = '$key'
            ");
    

        if($simpan){
            redirect('admin/pengajuan_ktkln');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-pengajuan_ktkln.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nomor 2","kepada 2","tki 2", "action"];

        $calldata = ["nomor_2","kepada_2","tki_2"];

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
