<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Sewa_akm_tahunan extends CI_Controller {

	private $table1 = 'sewa_akm_tahunan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/sewa_akm_tahunan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["id hp","nama","akm penyusutan","tahun", "action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/sewa_akm_tahunan/view', $data);
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
                        'row' => ["nama","akm_penyusutan","tahun"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => '',
                        'data' => ["nama","akm_penyusutan","tahun"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama", "2"=>"akm_penyusutan", "3"=>"tahun"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE  = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/sewa_akm_tahunan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE  = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/sewa_akm_tahunan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_hp = post("id_hp");
$nama = post("nama");
$akm_penyusutan = post("akm_penyusutan");
$tahun = post("tahun");

        

        $simpan = $this->db->query("
            INSERT INTO sewa_akm_tahunan
            (id_hp,nama,akm_penyusutan,tahun) VALUES ('$id_hp','$nama','$akm_penyusutan','$tahun')
        ");
    

        if($simpan){
            redirect('admin/sewa_akm_tahunan');
        }
    }

    public function update(){
          $key = post(''); $id_hp = post("id_hp");
$nama = post("nama");
$akm_penyusutan = post("akm_penyusutan");
$tahun = post("tahun");

        $simpan = $this->db->query("
            UPDATE sewa_akm_tahunan SET  id_hp = '$id_hp', nama = '$nama', akm_penyusutan = '$akm_penyusutan', tahun = '$tahun' WHERE  = '$key'
            ");
    

        if($simpan){
            redirect('admin/sewa_akm_tahunan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-sewa_akm_tahunan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["id hp","nama","akm penyusutan","tahun", "action"];

        $calldata = ["nama","akm_penyusutan","tahun"];

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
