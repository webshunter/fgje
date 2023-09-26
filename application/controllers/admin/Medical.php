<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Medical extends CI_Controller {

	private $table1 = 'medical';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/medical/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","nama","nomor","keterangan","jenismedical","expired","tanggal","status","catatan","d nomor","d klinik","d dokter", "action"]);
        $this->Createtable->order_set('0, 12');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/medical/view', $data);
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
                        'row' => ["id_biodata","nama","nomor","keterangan","jenismedical","expired","tanggal","status","catatan","d_nomor","d_klinik","d_dokter"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_medical',
                        'data' => ["id_biodata","nama","nomor","keterangan","jenismedical","expired","tanggal","status","catatan","d_nomor","d_klinik","d_dokter"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_medical', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"nama", "3"=>"nomor", "4"=>"keterangan", "5"=>"jenismedical", "6"=>"expired", "7"=>"tanggal", "8"=>"status", "9"=>"catatan", "10"=>"d_nomor", "11"=>"d_klinik", "12"=>"d_dokter"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_medical = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/medical/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_medical = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/medical/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$nama = post("nama");
$nomor = post("nomor");
$keterangan = post("keterangan");
$jenismedical = post("jenismedical");
$expired = post("expired");
$tanggal = post("tanggal");
$status = post("status");
$catatan = post("catatan");
$d_nomor = post("d_nomor");
$d_klinik = post("d_klinik");
$d_dokter = post("d_dokter");

        

        $simpan = $this->db->query("
            INSERT INTO medical
            (id_biodata,nama,nomor,keterangan,jenismedical,expired,tanggal,status,catatan,d_nomor,d_klinik,d_dokter) VALUES ('$id_biodata','$nama','$nomor','$keterangan','$jenismedical','$expired','$tanggal','$status','$catatan','$d_nomor','$d_klinik','$d_dokter')
        ");
    

        if($simpan){
            redirect('admin/medical');
        }
    }

    public function update(){
          $key = post('id_medical'); $id_biodata = post("id_biodata");
$nama = post("nama");
$nomor = post("nomor");
$keterangan = post("keterangan");
$jenismedical = post("jenismedical");
$expired = post("expired");
$tanggal = post("tanggal");
$status = post("status");
$catatan = post("catatan");
$d_nomor = post("d_nomor");
$d_klinik = post("d_klinik");
$d_dokter = post("d_dokter");

        $simpan = $this->db->query("
            UPDATE medical SET  id_biodata = '$id_biodata', nama = '$nama', nomor = '$nomor', keterangan = '$keterangan', jenismedical = '$jenismedical', expired = '$expired', tanggal = '$tanggal', status = '$status', catatan = '$catatan', d_nomor = '$d_nomor', d_klinik = '$d_klinik', d_dokter = '$d_dokter' WHERE id_medical = '$key'
            ");
    

        if($simpan){
            redirect('admin/medical');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-medical.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","nama","nomor","keterangan","jenismedical","expired","tanggal","status","catatan","d nomor","d klinik","d dokter", "action"];

        $calldata = ["id_biodata","nama","nomor","keterangan","jenismedical","expired","tanggal","status","catatan","d_nomor","d_klinik","d_dokter"];

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
