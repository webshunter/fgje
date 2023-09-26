<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Perjanjian_penempatan extends CI_Controller {

	private $table1 = 'perjanjian_penempatan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/perjanjian_penempatan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","jabatan","negara","gaji","hubungan","wali","lembur","nama dinas", "action"]);
        $this->Createtable->order_set('0, 8');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/perjanjian_penempatan/view', $data);
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
                        'row' => ["id_biodata","jabatan","negara","gaji","hubungan","wali","lembur","nama_dinas"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_penempatan',
                        'data' => ["id_biodata","jabatan","negara","gaji","hubungan","wali","lembur","nama_dinas"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_penempatan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"jabatan", "3"=>"negara", "4"=>"gaji", "5"=>"hubungan", "6"=>"wali", "7"=>"lembur", "8"=>"nama_dinas"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_penempatan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/perjanjian_penempatan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_penempatan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/perjanjian_penempatan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$jabatan = post("jabatan");
$negara = post("negara");
$gaji = post("gaji");
$hubungan = post("hubungan");
$wali = post("wali");
$lembur = post("lembur");
$nama_dinas = post("nama_dinas");

        

        $simpan = $this->db->query("
            INSERT INTO perjanjian_penempatan
            (id_biodata,jabatan,negara,gaji,hubungan,wali,lembur,nama_dinas) VALUES ('$id_biodata','$jabatan','$negara','$gaji','$hubungan','$wali','$lembur','$nama_dinas')
        ");
    

        if($simpan){
            redirect('admin/perjanjian_penempatan');
        }
    }

    public function update(){
          $key = post('id_penempatan'); $id_biodata = post("id_biodata");
$jabatan = post("jabatan");
$negara = post("negara");
$gaji = post("gaji");
$hubungan = post("hubungan");
$wali = post("wali");
$lembur = post("lembur");
$nama_dinas = post("nama_dinas");

        $simpan = $this->db->query("
            UPDATE perjanjian_penempatan SET  id_biodata = '$id_biodata', jabatan = '$jabatan', negara = '$negara', gaji = '$gaji', hubungan = '$hubungan', wali = '$wali', lembur = '$lembur', nama_dinas = '$nama_dinas' WHERE id_penempatan = '$key'
            ");
    

        if($simpan){
            redirect('admin/perjanjian_penempatan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-perjanjian_penempatan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","jabatan","negara","gaji","hubungan","wali","lembur","nama dinas", "action"];

        $calldata = ["id_biodata","jabatan","negara","gaji","hubungan","wali","lembur","nama_dinas"];

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
