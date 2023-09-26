<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class _editrecords extends CI_Controller {

	private $table1 = '_editrecords';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/_editrecords/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","date modified","table","source id","datafield","datavalue", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/_editrecords/view', $data);
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
                        'row' => ["date_modified","table","source_id","datafield","datavalue"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["date_modified","table","source_id","datafield","datavalue"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"date_modified", "2"=>"table", "3"=>"source_id", "4"=>"datafield", "5"=>"datavalue"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/_editrecords/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/_editrecords/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $date_modified = post("date_modified");
$table = post("table");
$source_id = post("source_id");
$datafield = post("datafield");
$datavalue = post("datavalue");

        

        $simpan = $this->db->query("
            INSERT INTO _editrecords
            (date_modified,table,source_id,datafield,datavalue) VALUES ('$date_modified','$table','$source_id','$datafield','$datavalue')
        ");
    

        if($simpan){
            redirect('admin/_editrecords');
        }
    }

    public function update(){
          $key = post('id'); $date_modified = post("date_modified");
$table = post("table");
$source_id = post("source_id");
$datafield = post("datafield");
$datavalue = post("datavalue");

        $simpan = $this->db->query("
            UPDATE _editrecords SET  date_modified = '$date_modified', table = '$table', source_id = '$source_id', datafield = '$datafield', datavalue = '$datavalue' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/_editrecords');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-_editrecords.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","date modified","table","source id","datafield","datavalue", "action"];

        $calldata = ["date_modified","table","source_id","datafield","datavalue"];

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
