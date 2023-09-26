<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_sertifikat extends CI_Controller {

	private $table1 = 'blk_sertifikat';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_sertifikat/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","sektor","id biodata","no urut sertifikat","tipe download","tglawal","tglakhir","date created", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_sertifikat/view', $data);
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
                        'row' => ["sektor","id_biodata","no_urut_sertifikat","tipe_download","tglawal","tglakhir","date_created"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["sektor","id_biodata","no_urut_sertifikat","tipe_download","tglawal","tglakhir","date_created"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"sektor", "2"=>"id_biodata", "3"=>"no_urut_sertifikat", "4"=>"tipe_download", "5"=>"tglawal", "6"=>"tglakhir", "7"=>"date_created"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_sertifikat/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_sertifikat/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $sektor = post("sektor");
$id_biodata = post("id_biodata");
$no_urut_sertifikat = post("no_urut_sertifikat");
$tipe_download = post("tipe_download");
$tglawal = post("tglawal");
$tglakhir = post("tglakhir");
$date_created = post("date_created");

        

        $simpan = $this->db->query("
            INSERT INTO blk_sertifikat
            (sektor,id_biodata,no_urut_sertifikat,tipe_download,tglawal,tglakhir,date_created) VALUES ('$sektor','$id_biodata','$no_urut_sertifikat','$tipe_download','$tglawal','$tglakhir','$date_created')
        ");
    

        if($simpan){
            redirect('admin/blk_sertifikat');
        }
    }

    public function update(){
          $key = post('id'); $sektor = post("sektor");
$id_biodata = post("id_biodata");
$no_urut_sertifikat = post("no_urut_sertifikat");
$tipe_download = post("tipe_download");
$tglawal = post("tglawal");
$tglakhir = post("tglakhir");
$date_created = post("date_created");

        $simpan = $this->db->query("
            UPDATE blk_sertifikat SET  sektor = '$sektor', id_biodata = '$id_biodata', no_urut_sertifikat = '$no_urut_sertifikat', tipe_download = '$tipe_download', tglawal = '$tglawal', tglakhir = '$tglakhir', date_created = '$date_created' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_sertifikat');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_sertifikat.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","sektor","id biodata","no urut sertifikat","tipe download","tglawal","tglakhir","date created", "action"];

        $calldata = ["sektor","id_biodata","no_urut_sertifikat","tipe_download","tglawal","tglakhir","date_created"];

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
