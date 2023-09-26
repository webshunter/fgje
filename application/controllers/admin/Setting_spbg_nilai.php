<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Setting_spbg_nilai extends CI_Controller {

	private $table1 = 'setting_spbg_nilai';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/setting_spbg_nilai/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","fpj1","fpj2","fpj3","fpj4","flj1","flj2","flj3","flj4","ipj1","ipj2","ipj3","ipj4","ilj1","ilj2","ilj3","ilj4", "action"]);
        $this->Createtable->order_set('0, 16');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/setting_spbg_nilai/view', $data);
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
                        'row' => ["fpj1","fpj2","fpj3","fpj4","flj1","flj2","flj3","flj4","ipj1","ipj2","ipj3","ipj4","ilj1","ilj2","ilj3","ilj4"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["fpj1","fpj2","fpj3","fpj4","flj1","flj2","flj3","flj4","ipj1","ipj2","ipj3","ipj4","ilj1","ilj2","ilj3","ilj4"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"fpj1", "2"=>"fpj2", "3"=>"fpj3", "4"=>"fpj4", "5"=>"flj1", "6"=>"flj2", "7"=>"flj3", "8"=>"flj4", "9"=>"ipj1", "10"=>"ipj2", "11"=>"ipj3", "12"=>"ipj4", "13"=>"ilj1", "14"=>"ilj2", "15"=>"ilj3", "16"=>"ilj4"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/setting_spbg_nilai/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/setting_spbg_nilai/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $fpj1 = post("fpj1");
$fpj2 = post("fpj2");
$fpj3 = post("fpj3");
$fpj4 = post("fpj4");
$flj1 = post("flj1");
$flj2 = post("flj2");
$flj3 = post("flj3");
$flj4 = post("flj4");
$ipj1 = post("ipj1");
$ipj2 = post("ipj2");
$ipj3 = post("ipj3");
$ipj4 = post("ipj4");
$ilj1 = post("ilj1");
$ilj2 = post("ilj2");
$ilj3 = post("ilj3");
$ilj4 = post("ilj4");

        

        $simpan = $this->db->query("
            INSERT INTO setting_spbg_nilai
            (fpj1,fpj2,fpj3,fpj4,flj1,flj2,flj3,flj4,ipj1,ipj2,ipj3,ipj4,ilj1,ilj2,ilj3,ilj4) VALUES ('$fpj1','$fpj2','$fpj3','$fpj4','$flj1','$flj2','$flj3','$flj4','$ipj1','$ipj2','$ipj3','$ipj4','$ilj1','$ilj2','$ilj3','$ilj4')
        ");
    

        if($simpan){
            redirect('admin/setting_spbg_nilai');
        }
    }

    public function update(){
          $key = post('id'); $fpj1 = post("fpj1");
$fpj2 = post("fpj2");
$fpj3 = post("fpj3");
$fpj4 = post("fpj4");
$flj1 = post("flj1");
$flj2 = post("flj2");
$flj3 = post("flj3");
$flj4 = post("flj4");
$ipj1 = post("ipj1");
$ipj2 = post("ipj2");
$ipj3 = post("ipj3");
$ipj4 = post("ipj4");
$ilj1 = post("ilj1");
$ilj2 = post("ilj2");
$ilj3 = post("ilj3");
$ilj4 = post("ilj4");

        $simpan = $this->db->query("
            UPDATE setting_spbg_nilai SET  fpj1 = '$fpj1', fpj2 = '$fpj2', fpj3 = '$fpj3', fpj4 = '$fpj4', flj1 = '$flj1', flj2 = '$flj2', flj3 = '$flj3', flj4 = '$flj4', ipj1 = '$ipj1', ipj2 = '$ipj2', ipj3 = '$ipj3', ipj4 = '$ipj4', ilj1 = '$ilj1', ilj2 = '$ilj2', ilj3 = '$ilj3', ilj4 = '$ilj4' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/setting_spbg_nilai');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-setting_spbg_nilai.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","fpj1","fpj2","fpj3","fpj4","flj1","flj2","flj3","flj4","ipj1","ipj2","ipj3","ipj4","ilj1","ilj2","ilj3","ilj4", "action"];

        $calldata = ["fpj1","fpj2","fpj3","fpj4","flj1","flj2","flj3","flj4","ipj1","ipj2","ipj3","ipj4","ilj1","ilj2","ilj3","ilj4"];

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
