<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datapekerjaan extends CI_Controller {

	private $table1 = 'datapekerjaan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datapekerjaan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id kategori","isi","mandarin","keterangan", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datapekerjaan/view', $data);
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
                        'row' => ["id_kategori","isi","mandarin","keterangan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_pekerjaan',
                        'data' => ["id_kategori","isi","mandarin","keterangan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_pekerjaan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_kategori", "2"=>"isi", "3"=>"mandarin", "4"=>"keterangan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_pekerjaan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datapekerjaan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_pekerjaan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datapekerjaan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_kategori = post("id_kategori");
$isi = post("isi");
$mandarin = post("mandarin");
$keterangan = post("keterangan");

        

        $simpan = $this->db->query("
            INSERT INTO datapekerjaan
            (id_kategori,isi,mandarin,keterangan) VALUES ('$id_kategori','$isi','$mandarin','$keterangan')
        ");
    

        if($simpan){
            redirect('admin/datapekerjaan');
        }
    }

    public function update(){
          $key = post('id_pekerjaan'); $id_kategori = post("id_kategori");
$isi = post("isi");
$mandarin = post("mandarin");
$keterangan = post("keterangan");

        $simpan = $this->db->query("
            UPDATE datapekerjaan SET  id_kategori = '$id_kategori', isi = '$isi', mandarin = '$mandarin', keterangan = '$keterangan' WHERE id_pekerjaan = '$key'
            ");
    

        if($simpan){
            redirect('admin/datapekerjaan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datapekerjaan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id kategori","isi","mandarin","keterangan", "action"];

        $calldata = ["id_kategori","isi","mandarin","keterangan"];

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
