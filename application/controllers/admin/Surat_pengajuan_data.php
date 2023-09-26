<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Surat_pengajuan_data extends CI_Controller {

	private $table1 = 'surat_pengajuan_data';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/surat_pengajuan_data/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","jumlah pinjaman","loan","aju id", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/surat_pengajuan_data/view', $data);
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
                        'row' => ["id_biodata","jumlah_pinjaman","loan","aju_id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_surat_pengajuan_data',
                        'data' => ["id_biodata","jumlah_pinjaman","loan","aju_id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_surat_pengajuan_data', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"jumlah_pinjaman", "3"=>"loan", "4"=>"aju_id"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_surat_pengajuan_data = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/surat_pengajuan_data/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_surat_pengajuan_data = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/surat_pengajuan_data/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$jumlah_pinjaman = post("jumlah_pinjaman");
$loan = post("loan");
$aju_id = post("aju_id");

        

        $simpan = $this->db->query("
            INSERT INTO surat_pengajuan_data
            (id_biodata,jumlah_pinjaman,loan,aju_id) VALUES ('$id_biodata','$jumlah_pinjaman','$loan','$aju_id')
        ");
    

        if($simpan){
            redirect('admin/surat_pengajuan_data');
        }
    }

    public function update(){
          $key = post('id_surat_pengajuan_data'); $id_biodata = post("id_biodata");
$jumlah_pinjaman = post("jumlah_pinjaman");
$loan = post("loan");
$aju_id = post("aju_id");

        $simpan = $this->db->query("
            UPDATE surat_pengajuan_data SET  id_biodata = '$id_biodata', jumlah_pinjaman = '$jumlah_pinjaman', loan = '$loan', aju_id = '$aju_id' WHERE id_surat_pengajuan_data = '$key'
            ");
    

        if($simpan){
            redirect('admin/surat_pengajuan_data');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-surat_pengajuan_data.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","jumlah pinjaman","loan","aju id", "action"];

        $calldata = ["id_biodata","jumlah_pinjaman","loan","aju_id"];

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
