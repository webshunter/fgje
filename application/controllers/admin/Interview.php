<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Interview extends CI_Controller {

	private $table1 = 'interview';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/interview/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","sunction","food","cateter","injection","therapy","helping","bed","stairs", "action"]);
        $this->Createtable->order_set('0, 9');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/interview/view', $data);
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
                        'row' => ["id_biodata","sunction","food","cateter","injection","therapy","helping","bed","stairs"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_interview',
                        'data' => ["id_biodata","sunction","food","cateter","injection","therapy","helping","bed","stairs"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_interview', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"sunction", "3"=>"food", "4"=>"cateter", "5"=>"injection", "6"=>"therapy", "7"=>"helping", "8"=>"bed", "9"=>"stairs"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_interview = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/interview/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_interview = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/interview/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$sunction = post("sunction");
$food = post("food");
$cateter = post("cateter");
$injection = post("injection");
$therapy = post("therapy");
$helping = post("helping");
$bed = post("bed");
$stairs = post("stairs");

        

        $simpan = $this->db->query("
            INSERT INTO interview
            (id_biodata,sunction,food,cateter,injection,therapy,helping,bed,stairs) VALUES ('$id_biodata','$sunction','$food','$cateter','$injection','$therapy','$helping','$bed','$stairs')
        ");
    

        if($simpan){
            redirect('admin/interview');
        }
    }

    public function update(){
          $key = post('id_interview'); $id_biodata = post("id_biodata");
$sunction = post("sunction");
$food = post("food");
$cateter = post("cateter");
$injection = post("injection");
$therapy = post("therapy");
$helping = post("helping");
$bed = post("bed");
$stairs = post("stairs");

        $simpan = $this->db->query("
            UPDATE interview SET  id_biodata = '$id_biodata', sunction = '$sunction', food = '$food', cateter = '$cateter', injection = '$injection', therapy = '$therapy', helping = '$helping', bed = '$bed', stairs = '$stairs' WHERE id_interview = '$key'
            ");
    

        if($simpan){
            redirect('admin/interview');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-interview.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","sunction","food","cateter","injection","therapy","helping","bed","stairs", "action"];

        $calldata = ["id_biodata","sunction","food","cateter","injection","therapy","helping","bed","stairs"];

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
