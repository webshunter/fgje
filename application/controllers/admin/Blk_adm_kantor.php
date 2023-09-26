<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_adm_kantor extends CI_Controller {

	private $table1 = 'blk_adm_kantor';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_adm_kantor/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode adm kantor","nama","jabatan tugas", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_adm_kantor/view', $data);
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
                        'row' => ["kode_adm_kantor","nama","jabatan_tugas"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_adm_kantor',
                        'data' => ["kode_adm_kantor","nama","jabatan_tugas"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_adm_kantor', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_adm_kantor", "2"=>"nama", "3"=>"jabatan_tugas"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_adm_kantor = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_adm_kantor/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_adm_kantor = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_adm_kantor/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_adm_kantor = post("kode_adm_kantor");
$nama = post("nama");
$jabatan_tugas = post("jabatan_tugas");

        

        $simpan = $this->db->query("
            INSERT INTO blk_adm_kantor
            (kode_adm_kantor,nama,jabatan_tugas) VALUES ('$kode_adm_kantor','$nama','$jabatan_tugas')
        ");
    

        if($simpan){
            redirect('admin/blk_adm_kantor');
        }
    }

    public function update(){
          $key = post('id_adm_kantor'); $kode_adm_kantor = post("kode_adm_kantor");
$nama = post("nama");
$jabatan_tugas = post("jabatan_tugas");

        $simpan = $this->db->query("
            UPDATE blk_adm_kantor SET  kode_adm_kantor = '$kode_adm_kantor', nama = '$nama', jabatan_tugas = '$jabatan_tugas' WHERE id_adm_kantor = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_adm_kantor');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_adm_kantor.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode adm kantor","nama","jabatan tugas", "action"];

        $calldata = ["kode_adm_kantor","nama","jabatan_tugas"];

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
