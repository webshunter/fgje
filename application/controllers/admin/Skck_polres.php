<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Skck_polres extends CI_Controller {

	private $table1 = 'skck_polres';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/skck_polres/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","namaskck","pengajuan","terima","tglexp","statuspengajuan","statusterima","statusexp", "action"]);
        $this->Createtable->order_set('0, 8');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/skck_polres/view', $data);
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
                        'row' => ["id_biodata","namaskck","pengajuan","terima","tglexp","statuspengajuan","statusterima","statusexp"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_skck',
                        'data' => ["id_biodata","namaskck","pengajuan","terima","tglexp","statuspengajuan","statusterima","statusexp"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_skck', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"namaskck", "3"=>"pengajuan", "4"=>"terima", "5"=>"tglexp", "6"=>"statuspengajuan", "7"=>"statusterima", "8"=>"statusexp"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_skck = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/skck_polres/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_skck = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/skck_polres/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$namaskck = post("namaskck");
$pengajuan = post("pengajuan");
$terima = post("terima");
$tglexp = post("tglexp");
$statuspengajuan = post("statuspengajuan");
$statusterima = post("statusterima");
$statusexp = post("statusexp");

        

        $simpan = $this->db->query("
            INSERT INTO skck_polres
            (id_biodata,namaskck,pengajuan,terima,tglexp,statuspengajuan,statusterima,statusexp) VALUES ('$id_biodata','$namaskck','$pengajuan','$terima','$tglexp','$statuspengajuan','$statusterima','$statusexp')
        ");
    

        if($simpan){
            redirect('admin/skck_polres');
        }
    }

    public function update(){
          $key = post('id_skck'); $id_biodata = post("id_biodata");
$namaskck = post("namaskck");
$pengajuan = post("pengajuan");
$terima = post("terima");
$tglexp = post("tglexp");
$statuspengajuan = post("statuspengajuan");
$statusterima = post("statusterima");
$statusexp = post("statusexp");

        $simpan = $this->db->query("
            UPDATE skck_polres SET  id_biodata = '$id_biodata', namaskck = '$namaskck', pengajuan = '$pengajuan', terima = '$terima', tglexp = '$tglexp', statuspengajuan = '$statuspengajuan', statusterima = '$statusterima', statusexp = '$statusexp' WHERE id_skck = '$key'
            ");
    

        if($simpan){
            redirect('admin/skck_polres');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-skck_polres.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","namaskck","pengajuan","terima","tglexp","statuspengajuan","statusterima","statusexp", "action"];

        $calldata = ["id_biodata","namaskck","pengajuan","terima","tglexp","statuspengajuan","statusterima","statusexp"];

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
