<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Surat_perjanjian_kerja_informal extends CI_Controller {

	private $table1 = 'surat_perjanjian_kerja_informal';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/surat_perjanjian_kerja_informal/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","jumlah anak", "action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/surat_perjanjian_kerja_informal/view', $data);
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
                        'row' => ["id_biodata","jumlah_anak"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_surat_perjanjian_kerja',
                        'data' => ["id_biodata","jumlah_anak"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_surat_perjanjian_kerja', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"jumlah_anak"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_surat_perjanjian_kerja = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/surat_perjanjian_kerja_informal/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_surat_perjanjian_kerja = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/surat_perjanjian_kerja_informal/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$jumlah_anak = post("jumlah_anak");

        

        $simpan = $this->db->query("
            INSERT INTO surat_perjanjian_kerja_informal
            (id_biodata,jumlah_anak) VALUES ('$id_biodata','$jumlah_anak')
        ");
    

        if($simpan){
            redirect('admin/surat_perjanjian_kerja_informal');
        }
    }

    public function update(){
          $key = post('id_surat_perjanjian_kerja'); $id_biodata = post("id_biodata");
$jumlah_anak = post("jumlah_anak");

        $simpan = $this->db->query("
            UPDATE surat_perjanjian_kerja_informal SET  id_biodata = '$id_biodata', jumlah_anak = '$jumlah_anak' WHERE id_surat_perjanjian_kerja = '$key'
            ");
    

        if($simpan){
            redirect('admin/surat_perjanjian_kerja_informal');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-surat_perjanjian_kerja_informal.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","jumlah anak", "action"];

        $calldata = ["id_biodata","jumlah_anak"];

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
