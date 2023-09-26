<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datasuhan extends CI_Controller {

	private $table1 = 'datasuhan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datasuhan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id group","id agen","id majikan","no suhan","tglterbit","tglexp","tglterima","tglsimpan","tglbawa","tglminta","quotasuhan","filesuhan", "action"]);
        $this->Createtable->order_set('0, 12');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datasuhan/view', $data);
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
                        'row' => ["id_group","id_agen","id_majikan","no_suhan","tglterbit","tglexp","tglterima","tglsimpan","tglbawa","tglminta","quotasuhan","filesuhan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_suhan',
                        'data' => ["id_group","id_agen","id_majikan","no_suhan","tglterbit","tglexp","tglterima","tglsimpan","tglbawa","tglminta","quotasuhan","filesuhan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_suhan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_group", "2"=>"id_agen", "3"=>"id_majikan", "4"=>"no_suhan", "5"=>"tglterbit", "6"=>"tglexp", "7"=>"tglterima", "8"=>"tglsimpan", "9"=>"tglbawa", "10"=>"tglminta", "11"=>"quotasuhan", "12"=>"filesuhan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_suhan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datasuhan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_suhan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datasuhan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_group = post("id_group");
$id_agen = post("id_agen");
$id_majikan = post("id_majikan");
$no_suhan = post("no_suhan");
$tglterbit = post("tglterbit");
$tglexp = post("tglexp");
$tglterima = post("tglterima");
$tglsimpan = post("tglsimpan");
$tglbawa = post("tglbawa");
$tglminta = post("tglminta");
$quotasuhan = post("quotasuhan");
$filesuhan = post("filesuhan");

        

        $simpan = $this->db->query("
            INSERT INTO datasuhan
            (id_group,id_agen,id_majikan,no_suhan,tglterbit,tglexp,tglterima,tglsimpan,tglbawa,tglminta,quotasuhan,filesuhan) VALUES ('$id_group','$id_agen','$id_majikan','$no_suhan','$tglterbit','$tglexp','$tglterima','$tglsimpan','$tglbawa','$tglminta','$quotasuhan','$filesuhan')
        ");
    

        if($simpan){
            redirect('admin/datasuhan');
        }
    }

    public function update(){
          $key = post('id_suhan'); $id_group = post("id_group");
$id_agen = post("id_agen");
$id_majikan = post("id_majikan");
$no_suhan = post("no_suhan");
$tglterbit = post("tglterbit");
$tglexp = post("tglexp");
$tglterima = post("tglterima");
$tglsimpan = post("tglsimpan");
$tglbawa = post("tglbawa");
$tglminta = post("tglminta");
$quotasuhan = post("quotasuhan");
$filesuhan = post("filesuhan");

        $simpan = $this->db->query("
            UPDATE datasuhan SET  id_group = '$id_group', id_agen = '$id_agen', id_majikan = '$id_majikan', no_suhan = '$no_suhan', tglterbit = '$tglterbit', tglexp = '$tglexp', tglterima = '$tglterima', tglsimpan = '$tglsimpan', tglbawa = '$tglbawa', tglminta = '$tglminta', quotasuhan = '$quotasuhan', filesuhan = '$filesuhan' WHERE id_suhan = '$key'
            ");
    

        if($simpan){
            redirect('admin/datasuhan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datasuhan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id group","id agen","id majikan","no suhan","tglterbit","tglexp","tglterima","tglsimpan","tglbawa","tglminta","quotasuhan","filesuhan", "action"];

        $calldata = ["id_group","id_agen","id_majikan","no_suhan","tglterbit","tglexp","tglterima","tglsimpan","tglbawa","tglminta","quotasuhan","filesuhan"];

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
