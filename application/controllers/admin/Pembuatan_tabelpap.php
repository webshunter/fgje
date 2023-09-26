<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pembuatan_tabelpap extends CI_Controller {

	private $table1 = 'pembuatan_tabelpap';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/pembuatan_tabelpap/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","tanggalpap","nomorktkln","daerah","tanggal","kepada","nomor", "action"]);
        $this->Createtable->order_set('0, 6');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pembuatan_tabelpap/view', $data);
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
                        'row' => ["tanggalpap","nomorktkln","daerah","tanggal","kepada","nomor"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_pembuatanpap',
                        'data' => ["tanggalpap","nomorktkln","daerah","tanggal","kepada","nomor"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_pembuatanpap', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"tanggalpap", "2"=>"nomorktkln", "3"=>"daerah", "4"=>"tanggal", "5"=>"kepada", "6"=>"nomor"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_pembuatanpap = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/pembuatan_tabelpap/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_pembuatanpap = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pembuatan_tabelpap/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $tanggalpap = post("tanggalpap");
$nomorktkln = post("nomorktkln");
$daerah = post("daerah");
$tanggal = post("tanggal");
$kepada = post("kepada");
$nomor = post("nomor");

        

        $simpan = $this->db->query("
            INSERT INTO pembuatan_tabelpap
            (tanggalpap,nomorktkln,daerah,tanggal,kepada,nomor) VALUES ('$tanggalpap','$nomorktkln','$daerah','$tanggal','$kepada','$nomor')
        ");
    

        if($simpan){
            redirect('admin/pembuatan_tabelpap');
        }
    }

    public function update(){
          $key = post('id_pembuatanpap'); $tanggalpap = post("tanggalpap");
$nomorktkln = post("nomorktkln");
$daerah = post("daerah");
$tanggal = post("tanggal");
$kepada = post("kepada");
$nomor = post("nomor");

        $simpan = $this->db->query("
            UPDATE pembuatan_tabelpap SET  tanggalpap = '$tanggalpap', nomorktkln = '$nomorktkln', daerah = '$daerah', tanggal = '$tanggal', kepada = '$kepada', nomor = '$nomor' WHERE id_pembuatanpap = '$key'
            ");
    

        if($simpan){
            redirect('admin/pembuatan_tabelpap');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-pembuatan_tabelpap.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","tanggalpap","nomorktkln","daerah","tanggal","kepada","nomor", "action"];

        $calldata = ["tanggalpap","nomorktkln","daerah","tanggal","kepada","nomor"];

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
