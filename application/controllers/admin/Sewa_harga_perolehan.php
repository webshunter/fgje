<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Sewa_harga_perolehan extends CI_Controller {

	private $table1 = 'sewa_harga_perolehan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/sewa_harga_perolehan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id harga perolehan","nama","hp","tgl", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/sewa_harga_perolehan/view', $data);
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
                        'row' => ["nama","hp","tgl"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => '',
                        'data' => ["nama","hp","tgl"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama", "2"=>"hp", "3"=>"tgl"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE  = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/sewa_harga_perolehan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE  = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/sewa_harga_perolehan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_harga_perolehan = post("id_harga_perolehan");
$nama = post("nama");
$hp = post("hp");
$tgl = post("tgl");

        

        $simpan = $this->db->query("
            INSERT INTO sewa_harga_perolehan
            (id_harga_perolehan,nama,hp,tgl) VALUES ('$id_harga_perolehan','$nama','$hp','$tgl')
        ");
    

        if($simpan){
            redirect('admin/sewa_harga_perolehan');
        }
    }

    public function update(){
          $key = post(''); $id_harga_perolehan = post("id_harga_perolehan");
$nama = post("nama");
$hp = post("hp");
$tgl = post("tgl");

        $simpan = $this->db->query("
            UPDATE sewa_harga_perolehan SET  id_harga_perolehan = '$id_harga_perolehan', nama = '$nama', hp = '$hp', tgl = '$tgl' WHERE  = '$key'
            ");
    

        if($simpan){
            redirect('admin/sewa_harga_perolehan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-sewa_harga_perolehan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["id harga perolehan","nama","hp","tgl", "action"];

        $calldata = ["nama","hp","tgl"];

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
