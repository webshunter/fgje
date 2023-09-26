<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Asuransi_dan_hotel extends CI_Controller {

	private $table1 = 'asuransi_dan_hotel';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/asuransi_dan_hotel/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","dakt","daki","dattt","aju ht","idhotel","adh nohp","adh line","adh email", "action"]);
        $this->Createtable->order_set('0, 9');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/asuransi_dan_hotel/view', $data);
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
                        'row' => ["id_biodata","dakt","daki","dattt","aju_ht","idhotel","adh_nohp","adh_line","adh_email"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["id_biodata","dakt","daki","dattt","aju_ht","idhotel","adh_nohp","adh_line","adh_email"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"dakt", "3"=>"daki", "4"=>"dattt", "5"=>"aju_ht", "6"=>"idhotel", "7"=>"adh_nohp", "8"=>"adh_line", "9"=>"adh_email"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/asuransi_dan_hotel/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/asuransi_dan_hotel/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$dakt = post("dakt");
$daki = post("daki");
$dattt = post("dattt");
$aju_ht = post("aju_ht");
$idhotel = post("idhotel");
$adh_nohp = post("adh_nohp");
$adh_line = post("adh_line");
$adh_email = post("adh_email");

        

        $simpan = $this->db->query("
            INSERT INTO asuransi_dan_hotel
            (id_biodata,dakt,daki,dattt,aju_ht,idhotel,adh_nohp,adh_line,adh_email) VALUES ('$id_biodata','$dakt','$daki','$dattt','$aju_ht','$idhotel','$adh_nohp','$adh_line','$adh_email')
        ");
    

        if($simpan){
            redirect('admin/asuransi_dan_hotel');
        }
    }

    public function update(){
          $key = post('id'); $id_biodata = post("id_biodata");
$dakt = post("dakt");
$daki = post("daki");
$dattt = post("dattt");
$aju_ht = post("aju_ht");
$idhotel = post("idhotel");
$adh_nohp = post("adh_nohp");
$adh_line = post("adh_line");
$adh_email = post("adh_email");

        $simpan = $this->db->query("
            UPDATE asuransi_dan_hotel SET  id_biodata = '$id_biodata', dakt = '$dakt', daki = '$daki', dattt = '$dattt', aju_ht = '$aju_ht', idhotel = '$idhotel', adh_nohp = '$adh_nohp', adh_line = '$adh_line', adh_email = '$adh_email' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/asuransi_dan_hotel');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-asuransi_dan_hotel.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","dakt","daki","dattt","aju ht","idhotel","adh nohp","adh line","adh email", "action"];

        $calldata = ["id_biodata","dakt","daki","dattt","aju_ht","idhotel","adh_nohp","adh_line","adh_email"];

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
