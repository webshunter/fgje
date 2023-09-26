<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kuliah extends CI_Controller {

	private $table1 = 'kuliah';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/kuliah/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nm kuliah","alamat","latitude","longitude", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/kuliah/view', $data);
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
                        'row' => ["nm_kuliah","alamat","latitude","longitude"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_tempat',
                        'data' => ["nm_kuliah","alamat","latitude","longitude"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_tempat', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nm_kuliah", "2"=>"alamat", "3"=>"latitude", "4"=>"longitude"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_tempat = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/kuliah/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_tempat = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/kuliah/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nm_kuliah = post("nm_kuliah");
$alamat = post("alamat");
$latitude = post("latitude");
$longitude = post("longitude");

        

        $simpan = $this->db->query("
            INSERT INTO kuliah
            (nm_kuliah,alamat,latitude,longitude) VALUES ('$nm_kuliah','$alamat','$latitude','$longitude')
        ");
    

        if($simpan){
            redirect('admin/kuliah');
        }
    }

    public function update(){
          $key = post('id_tempat'); $nm_kuliah = post("nm_kuliah");
$alamat = post("alamat");
$latitude = post("latitude");
$longitude = post("longitude");

        $simpan = $this->db->query("
            UPDATE kuliah SET  nm_kuliah = '$nm_kuliah', alamat = '$alamat', latitude = '$latitude', longitude = '$longitude' WHERE id_tempat = '$key'
            ");
    

        if($simpan){
            redirect('admin/kuliah');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-kuliah.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nm kuliah","alamat","latitude","longitude", "action"];

        $calldata = ["nm_kuliah","alamat","latitude","longitude"];

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
