<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Request extends CI_Controller {

	private $table1 = 'request';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/request/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","usahamajikan","waktukerja","kondisikerja","jenispekerjaan","lokasikerja","lembur", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/request/view', $data);
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
                        'row' => ["id_biodata","usahamajikan","waktukerja","kondisikerja","jenispekerjaan","lokasikerja","lembur"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_request',
                        'data' => ["id_biodata","usahamajikan","waktukerja","kondisikerja","jenispekerjaan","lokasikerja","lembur"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_request', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"usahamajikan", "3"=>"waktukerja", "4"=>"kondisikerja", "5"=>"jenispekerjaan", "6"=>"lokasikerja", "7"=>"lembur"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_request = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/request/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_request = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/request/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$usahamajikan = post("usahamajikan");
$waktukerja = post("waktukerja");
$kondisikerja = post("kondisikerja");
$jenispekerjaan = post("jenispekerjaan");
$lokasikerja = post("lokasikerja");
$lembur = post("lembur");

        

        $simpan = $this->db->query("
            INSERT INTO request
            (id_biodata,usahamajikan,waktukerja,kondisikerja,jenispekerjaan,lokasikerja,lembur) VALUES ('$id_biodata','$usahamajikan','$waktukerja','$kondisikerja','$jenispekerjaan','$lokasikerja','$lembur')
        ");
    

        if($simpan){
            redirect('admin/request');
        }
    }

    public function update(){
          $key = post('id_request'); $id_biodata = post("id_biodata");
$usahamajikan = post("usahamajikan");
$waktukerja = post("waktukerja");
$kondisikerja = post("kondisikerja");
$jenispekerjaan = post("jenispekerjaan");
$lokasikerja = post("lokasikerja");
$lembur = post("lembur");

        $simpan = $this->db->query("
            UPDATE request SET  id_biodata = '$id_biodata', usahamajikan = '$usahamajikan', waktukerja = '$waktukerja', kondisikerja = '$kondisikerja', jenispekerjaan = '$jenispekerjaan', lokasikerja = '$lokasikerja', lembur = '$lembur' WHERE id_request = '$key'
            ");
    

        if($simpan){
            redirect('admin/request');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-request.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","usahamajikan","waktukerja","kondisikerja","jenispekerjaan","lokasikerja","lembur", "action"];

        $calldata = ["id_biodata","usahamajikan","waktukerja","kondisikerja","jenispekerjaan","lokasikerja","lembur"];

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
