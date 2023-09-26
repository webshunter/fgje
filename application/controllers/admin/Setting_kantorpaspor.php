<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Setting_kantorpaspor extends CI_Controller {

	private $table1 = 'setting_kantorpaspor';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/setting_kantorpaspor/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama","alamat", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/setting_kantorpaspor/view', $data);
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
                        'row' => ["nama","alamat"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_setting_kantorpaspor',
                        'data' => ["nama","alamat"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_setting_kantorpaspor', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama", "2"=>"alamat"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_setting_kantorpaspor = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/setting_kantorpaspor/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_setting_kantorpaspor = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/setting_kantorpaspor/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nama = post("nama");
$alamat = post("alamat");

        

        $simpan = $this->db->query("
            INSERT INTO setting_kantorpaspor
            (nama,alamat) VALUES ('$nama','$alamat')
        ");
    

        if($simpan){
            redirect('admin/setting_kantorpaspor');
        }
    }

    public function update(){
          $key = post('id_setting_kantorpaspor'); $nama = post("nama");
$alamat = post("alamat");

        $simpan = $this->db->query("
            UPDATE setting_kantorpaspor SET  nama = '$nama', alamat = '$alamat' WHERE id_setting_kantorpaspor = '$key'
            ");
    

        if($simpan){
            redirect('admin/setting_kantorpaspor');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-setting_kantorpaspor.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nama","alamat", "action"];

        $calldata = ["nama","alamat"];

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
