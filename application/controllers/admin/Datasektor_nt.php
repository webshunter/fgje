<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datasektor_nt extends CI_Controller {

	private $table1 = 'datasektor_nt';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datasektor_nt/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode sektor","sektor","no urut","ket", "action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datasektor_nt/view', $data);
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
                        'row' => ["kode_sektor","sektor","no_urut","ket"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_sektor',
                        'data' => ["kode_sektor","sektor","no_urut","ket"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_sektor', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_sektor", "2"=>"sektor", "3"=>"no_urut", "4"=>"ket"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_sektor = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datasektor_nt/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_sektor = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datasektor_nt/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_sektor = post("kode_sektor");
$sektor = post("sektor");
$no_urut = post("no_urut");
$ket = post("ket");

        

        $simpan = $this->db->query("
            INSERT INTO datasektor_nt
            (kode_sektor,sektor,no_urut,ket) VALUES ('$kode_sektor','$sektor','$no_urut','$ket')
        ");
    

        if($simpan){
            redirect('admin/datasektor_nt');
        }
    }

    public function update(){
          $key = post('id_sektor'); $kode_sektor = post("kode_sektor");
$sektor = post("sektor");
$no_urut = post("no_urut");
$ket = post("ket");

        $simpan = $this->db->query("
            UPDATE datasektor_nt SET  kode_sektor = '$kode_sektor', sektor = '$sektor', no_urut = '$no_urut', ket = '$ket' WHERE id_sektor = '$key'
            ");
    

        if($simpan){
            redirect('admin/datasektor_nt');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datasektor_nt.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode sektor","sektor","no urut","ket", "action"];

        $calldata = ["kode_sektor","sektor","no_urut","ket"];

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
