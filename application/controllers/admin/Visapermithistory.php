<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Visapermithistory extends CI_Controller {

	private $table1 = 'visapermithistory';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/visapermithistory/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","tgl terima","id visapermit","tgl kirim","ket", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/visapermithistory/view', $data);
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
                        'row' => ["tgl_terima","id_visapermit","tgl_kirim","ket"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_visapermithistory',
                        'data' => ["tgl_terima","id_visapermit","tgl_kirim","ket"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_visapermithistory', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tgl_terima", "2"=>"id_visapermit", "3"=>"tgl_kirim", "4"=>"ket"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_visapermithistory = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/visapermithistory/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_visapermithistory = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/visapermithistory/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $tgl_terima = post("tgl_terima");
$id_visapermit = post("id_visapermit");
$tgl_kirim = post("tgl_kirim");
$ket = post("ket");

        

        $simpan = $this->db->query("
            INSERT INTO visapermithistory
            (tgl_terima,id_visapermit,tgl_kirim,ket) VALUES ('$tgl_terima','$id_visapermit','$tgl_kirim','$ket')
        ");
    

        if($simpan){
            redirect('admin/visapermithistory');
        }
    }

    public function update(){
          $key = post('id_visapermithistory'); $tgl_terima = post("tgl_terima");
$id_visapermit = post("id_visapermit");
$tgl_kirim = post("tgl_kirim");
$ket = post("ket");

        $simpan = $this->db->query("
            UPDATE visapermithistory SET  tgl_terima = '$tgl_terima', id_visapermit = '$id_visapermit', tgl_kirim = '$tgl_kirim', ket = '$ket' WHERE id_visapermithistory = '$key'
            ");
    

        if($simpan){
            redirect('admin/visapermithistory');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-visapermithistory.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","tgl terima","id visapermit","tgl kirim","ket", "action"];

        $calldata = ["tgl_terima","id_visapermit","tgl_kirim","ket"];

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
