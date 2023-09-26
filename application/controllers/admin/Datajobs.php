<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datajobs extends CI_Controller {

	private $table1 = 'datajobs';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datajobs/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","isi","mandarin", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datajobs/view', $data);
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
                        'row' => ["isi","mandarin"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_jobs',
                        'data' => ["isi","mandarin"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_jobs', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"isi", "2"=>"mandarin"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_jobs = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datajobs/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_jobs = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datajobs/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $isi = post("isi");
$mandarin = post("mandarin");

        

        $simpan = $this->db->query("
            INSERT INTO datajobs
            (isi,mandarin) VALUES ('$isi','$mandarin')
        ");
    

        if($simpan){
            redirect('admin/datajobs');
        }
    }

    public function update(){
          $key = post('id_jobs'); $isi = post("isi");
$mandarin = post("mandarin");

        $simpan = $this->db->query("
            UPDATE datajobs SET  isi = '$isi', mandarin = '$mandarin' WHERE id_jobs = '$key'
            ");
    

        if($simpan){
            redirect('admin/datajobs');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datajobs.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","isi","mandarin", "action"];

        $calldata = ["isi","mandarin"];

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