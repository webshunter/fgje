<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datamajikan_dokumen extends CI_Controller {

	private $table1 = 'datamajikan_dokumen';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datamajikan_dokumen/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","filetglinput","file","majikan id", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datamajikan_dokumen/view', $data);
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
                        'row' => ["filetglinput","file","majikan_id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["filetglinput","file","majikan_id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"filetglinput", "2"=>"file", "3"=>"majikan_id"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datamajikan_dokumen/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datamajikan_dokumen/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $filetglinput = post("filetglinput");
$file = post("file");
$majikan_id = post("majikan_id");

        

        $simpan = $this->db->query("
            INSERT INTO datamajikan_dokumen
            (filetglinput,file,majikan_id) VALUES ('$filetglinput','$file','$majikan_id')
        ");
    

        if($simpan){
            redirect('admin/datamajikan_dokumen');
        }
    }

    public function update(){
          $key = post('id'); $filetglinput = post("filetglinput");
$file = post("file");
$majikan_id = post("majikan_id");

        $simpan = $this->db->query("
            UPDATE datamajikan_dokumen SET  filetglinput = '$filetglinput', file = '$file', majikan_id = '$majikan_id' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/datamajikan_dokumen');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datamajikan_dokumen.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","filetglinput","file","majikan id", "action"];

        $calldata = ["filetglinput","file","majikan_id"];

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
