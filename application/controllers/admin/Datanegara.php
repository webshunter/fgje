<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datanegara extends CI_Controller {

	private $table1 = 'datanegara';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datanegara/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","isi","mandarin","kode negara", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datanegara/view', $data);
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
                        'row' => ["isi","mandarin","kode_negara"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_negara',
                        'data' => ["isi","mandarin","kode_negara"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_negara', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"isi", "2"=>"mandarin", "3"=>"kode_negara"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_negara = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datanegara/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_negara = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datanegara/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $isi = post("isi");
$mandarin = post("mandarin");
$kode_negara = post("kode_negara");

        

        $simpan = $this->db->query("
            INSERT INTO datanegara
            (isi,mandarin,kode_negara) VALUES ('$isi','$mandarin','$kode_negara')
        ");
    

        if($simpan){
            redirect('admin/datanegara');
        }
    }

    public function update(){
          $key = post('id_negara'); $isi = post("isi");
$mandarin = post("mandarin");
$kode_negara = post("kode_negara");

        $simpan = $this->db->query("
            UPDATE datanegara SET  isi = '$isi', mandarin = '$mandarin', kode_negara = '$kode_negara' WHERE id_negara = '$key'
            ");
    

        if($simpan){
            redirect('admin/datanegara');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datanegara.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","isi","mandarin","kode negara", "action"];

        $calldata = ["isi","mandarin","kode_negara"];

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
