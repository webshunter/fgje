<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Tempat_paspor extends CI_Controller {

	private $table1 = 'tempat_paspor';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/tempat_paspor/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama tempat","id tki", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tempat_paspor/view', $data);
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
                        'row' => ["nama_tempat","id_tki"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_tempat',
                        'data' => ["nama_tempat","id_tki"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_tempat', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama_tempat", "2"=>"id_tki"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_tempat = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/tempat_paspor/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_tempat = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/tempat_paspor/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nama_tempat = post("nama_tempat");
$id_tki = post("id_tki");

        

        $simpan = $this->db->query("
            INSERT INTO tempat_paspor
            (nama_tempat,id_tki) VALUES ('$nama_tempat','$id_tki')
        ");
    

        if($simpan){
            redirect('admin/tempat_paspor');
        }
    }

    public function update(){
          $key = post('id_tempat'); $nama_tempat = post("nama_tempat");
$id_tki = post("id_tki");

        $simpan = $this->db->query("
            UPDATE tempat_paspor SET  nama_tempat = '$nama_tempat', id_tki = '$id_tki' WHERE id_tempat = '$key'
            ");
    

        if($simpan){
            redirect('admin/tempat_paspor');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-tempat_paspor.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nama tempat","id tki", "action"];

        $calldata = ["nama_tempat","id_tki"];

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
