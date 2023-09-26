<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_penilaianpkl extends CI_Controller {

	private $table1 = 'blk_penilaianpkl';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_penilaianpkl/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id nilai","penjelasan","id materipkl","id pkl", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_penilaianpkl/view', $data);
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
                        'row' => ["id_nilai","penjelasan","id_materipkl","id_pkl"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_penilaian',
                        'data' => ["id_nilai","penjelasan","id_materipkl","id_pkl"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_penilaian', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_nilai", "2"=>"penjelasan", "3"=>"id_materipkl", "4"=>"id_pkl"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_penilaian = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_penilaianpkl/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_penilaian = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_penilaianpkl/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_nilai = post("id_nilai");
$penjelasan = post("penjelasan");
$id_materipkl = post("id_materipkl");
$id_pkl = post("id_pkl");

        

        $simpan = $this->db->query("
            INSERT INTO blk_penilaianpkl
            (id_nilai,penjelasan,id_materipkl,id_pkl) VALUES ('$id_nilai','$penjelasan','$id_materipkl','$id_pkl')
        ");
    

        if($simpan){
            redirect('admin/blk_penilaianpkl');
        }
    }

    public function update(){
          $key = post('id_penilaian'); $id_nilai = post("id_nilai");
$penjelasan = post("penjelasan");
$id_materipkl = post("id_materipkl");
$id_pkl = post("id_pkl");

        $simpan = $this->db->query("
            UPDATE blk_penilaianpkl SET  id_nilai = '$id_nilai', penjelasan = '$penjelasan', id_materipkl = '$id_materipkl', id_pkl = '$id_pkl' WHERE id_penilaian = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_penilaianpkl');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_penilaianpkl.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id nilai","penjelasan","id materipkl","id pkl", "action"];

        $calldata = ["id_nilai","penjelasan","id_materipkl","id_pkl"];

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
