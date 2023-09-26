<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Tblattendance[backup] extends CI_Controller {

	private $table1 = 'tblattendance[backup]';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/tblattendance[backup]/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","idblk","dteDate","tmeTime","waktu","rec", "action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tblattendance[backup]/view', $data);
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
                        'row' => ["idblk","dteDate","tmeTime","waktu","rec"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'idAttendance',
                        'data' => ["idblk","dteDate","tmeTime","waktu","rec"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['idAttendance', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"idblk", "2"=>"dteDate", "3"=>"tmeTime", "4"=>"waktu", "5"=>"rec"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE idAttendance = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/tblattendance[backup]/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE idAttendance = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tblattendance[backup]/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $idblk = post("idblk");
$dteDate = post("dteDate");
$tmeTime = post("tmeTime");
$waktu = post("waktu");
$rec = post("rec");

        

        $simpan = $this->db->query("
            INSERT INTO tblattendance[backup]
            (idblk,dteDate,tmeTime,waktu,rec) VALUES ('$idblk','$dteDate','$tmeTime','$waktu','$rec')
        ");
    

        if($simpan){
            redirect('admin/tblattendance[backup]');
        }
    }

    public function update(){
          $key = post('idAttendance'); $idblk = post("idblk");
$dteDate = post("dteDate");
$tmeTime = post("tmeTime");
$waktu = post("waktu");
$rec = post("rec");

        $simpan = $this->db->query("
            UPDATE tblattendance[backup] SET  idblk = '$idblk', dteDate = '$dteDate', tmeTime = '$tmeTime', waktu = '$waktu', rec = '$rec' WHERE idAttendance = '$key'
            ");
    

        if($simpan){
            redirect('admin/tblattendance[backup]');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-tblattendance[backup].xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","idblk","dteDate","tmeTime","waktu","rec", "action"];

        $calldata = ["idblk","dteDate","tmeTime","waktu","rec"];

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
