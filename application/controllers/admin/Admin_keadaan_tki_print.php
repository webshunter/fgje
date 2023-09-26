<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin_keadaan_tki_print extends CI_Controller {

	private $table1 = 'admin_keadaan_tki_print';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/admin_keadaan_tki_print/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","tanggal","nomor","lampiran","perihal","kepada","pmi","br","date created","deleted at", "action"]);
        $this->Createtable->order_set('0, 9');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/admin_keadaan_tki_print/view', $data);
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
                        'row' => ["tanggal","nomor","lampiran","perihal","kepada","pmi","br","date_created","deleted_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["tanggal","nomor","lampiran","perihal","kepada","pmi","br","date_created","deleted_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tanggal", "2"=>"nomor", "3"=>"lampiran", "4"=>"perihal", "5"=>"kepada", "6"=>"pmi", "7"=>"br", "8"=>"date_created", "9"=>"deleted_at"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/admin_keadaan_tki_print/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/admin_keadaan_tki_print/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $tanggal = post("tanggal");
$nomor = post("nomor");
$lampiran = post("lampiran");
$perihal = post("perihal");
$kepada = post("kepada");
$pmi = post("pmi");
$br = post("br");
$date_created = post("date_created");
$deleted_at = post("deleted_at");

        

        $simpan = $this->db->query("
            INSERT INTO admin_keadaan_tki_print
            (tanggal,nomor,lampiran,perihal,kepada,pmi,br,date_created,deleted_at) VALUES ('$tanggal','$nomor','$lampiran','$perihal','$kepada','$pmi','$br','$date_created','$deleted_at')
        ");
    

        if($simpan){
            redirect('admin/admin_keadaan_tki_print');
        }
    }

    public function update(){
          $key = post('id'); $tanggal = post("tanggal");
$nomor = post("nomor");
$lampiran = post("lampiran");
$perihal = post("perihal");
$kepada = post("kepada");
$pmi = post("pmi");
$br = post("br");
$date_created = post("date_created");
$deleted_at = post("deleted_at");

        $simpan = $this->db->query("
            UPDATE admin_keadaan_tki_print SET  tanggal = '$tanggal', nomor = '$nomor', lampiran = '$lampiran', perihal = '$perihal', kepada = '$kepada', pmi = '$pmi', br = '$br', date_created = '$date_created', deleted_at = '$deleted_at' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/admin_keadaan_tki_print');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-admin_keadaan_tki_print.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","tanggal","nomor","lampiran","perihal","kepada","pmi","br","date created","deleted at", "action"];

        $calldata = ["tanggal","nomor","lampiran","perihal","kepada","pmi","br","date_created","deleted_at"];

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
