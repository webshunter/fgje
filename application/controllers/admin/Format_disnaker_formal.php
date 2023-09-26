<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Format_disnaker_formal extends CI_Controller {

	private $table1 = 'format_disnaker_formal';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/format_disnaker_formal/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","jabatan","no ktpnya","tgl berangkatnya","tgl tibanya","gajinya","mata uang", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/format_disnaker_formal/view', $data);
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
                        'row' => ["id_biodata","jabatan","no_ktpnya","tgl_berangkatnya","tgl_tibanya","gajinya","mata_uang"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_karep',
                        'data' => ["id_biodata","jabatan","no_ktpnya","tgl_berangkatnya","tgl_tibanya","gajinya","mata_uang"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_karep', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"jabatan", "3"=>"no_ktpnya", "4"=>"tgl_berangkatnya", "5"=>"tgl_tibanya", "6"=>"gajinya", "7"=>"mata_uang"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_karep = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/format_disnaker_formal/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_karep = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/format_disnaker_formal/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$jabatan = post("jabatan");
$no_ktpnya = post("no_ktpnya");
$tgl_berangkatnya = post("tgl_berangkatnya");
$tgl_tibanya = post("tgl_tibanya");
$gajinya = post("gajinya");
$mata_uang = post("mata_uang");

        

        $simpan = $this->db->query("
            INSERT INTO format_disnaker_formal
            (id_biodata,jabatan,no_ktpnya,tgl_berangkatnya,tgl_tibanya,gajinya,mata_uang) VALUES ('$id_biodata','$jabatan','$no_ktpnya','$tgl_berangkatnya','$tgl_tibanya','$gajinya','$mata_uang')
        ");
    

        if($simpan){
            redirect('admin/format_disnaker_formal');
        }
    }

    public function update(){
          $key = post('id_karep'); $id_biodata = post("id_biodata");
$jabatan = post("jabatan");
$no_ktpnya = post("no_ktpnya");
$tgl_berangkatnya = post("tgl_berangkatnya");
$tgl_tibanya = post("tgl_tibanya");
$gajinya = post("gajinya");
$mata_uang = post("mata_uang");

        $simpan = $this->db->query("
            UPDATE format_disnaker_formal SET  id_biodata = '$id_biodata', jabatan = '$jabatan', no_ktpnya = '$no_ktpnya', tgl_berangkatnya = '$tgl_berangkatnya', tgl_tibanya = '$tgl_tibanya', gajinya = '$gajinya', mata_uang = '$mata_uang' WHERE id_karep = '$key'
            ");
    

        if($simpan){
            redirect('admin/format_disnaker_formal');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-format_disnaker_formal.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","jabatan","no ktpnya","tgl berangkatnya","tgl tibanya","gajinya","mata uang", "action"];

        $calldata = ["id_biodata","jabatan","no_ktpnya","tgl_berangkatnya","tgl_tibanya","gajinya","mata_uang"];

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
