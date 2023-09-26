<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_pkl extends CI_Controller {

	private $table1 = 'blk_pkl';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_pkl/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tempat","mulai tgl","selesai tgl","jml hari","penilaian","total hari","ket", "action"]);
        $this->Createtable->order_set('0, 8');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_pkl/view', $data);
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
                        'row' => ["id_biodata","tempat","mulai_tgl","selesai_tgl","jml_hari","penilaian","total_hari","ket"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_blk_pkl',
                        'data' => ["id_biodata","tempat","mulai_tgl","selesai_tgl","jml_hari","penilaian","total_hari","ket"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_blk_pkl', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tempat", "3"=>"mulai_tgl", "4"=>"selesai_tgl", "5"=>"jml_hari", "6"=>"penilaian", "7"=>"total_hari", "8"=>"ket"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_blk_pkl = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_pkl/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_blk_pkl = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_pkl/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tempat = post("tempat");
$mulai_tgl = post("mulai_tgl");
$selesai_tgl = post("selesai_tgl");
$jml_hari = post("jml_hari");
$penilaian = post("penilaian");
$total_hari = post("total_hari");
$ket = post("ket");

        

        $simpan = $this->db->query("
            INSERT INTO blk_pkl
            (id_biodata,tempat,mulai_tgl,selesai_tgl,jml_hari,penilaian,total_hari,ket) VALUES ('$id_biodata','$tempat','$mulai_tgl','$selesai_tgl','$jml_hari','$penilaian','$total_hari','$ket')
        ");
    

        if($simpan){
            redirect('admin/blk_pkl');
        }
    }

    public function update(){
          $key = post('id_blk_pkl'); $id_biodata = post("id_biodata");
$tempat = post("tempat");
$mulai_tgl = post("mulai_tgl");
$selesai_tgl = post("selesai_tgl");
$jml_hari = post("jml_hari");
$penilaian = post("penilaian");
$total_hari = post("total_hari");
$ket = post("ket");

        $simpan = $this->db->query("
            UPDATE blk_pkl SET  id_biodata = '$id_biodata', tempat = '$tempat', mulai_tgl = '$mulai_tgl', selesai_tgl = '$selesai_tgl', jml_hari = '$jml_hari', penilaian = '$penilaian', total_hari = '$total_hari', ket = '$ket' WHERE id_blk_pkl = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_pkl');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_pkl.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tempat","mulai tgl","selesai tgl","jml hari","penilaian","total hari","ket", "action"];

        $calldata = ["id_biodata","tempat","mulai_tgl","selesai_tgl","jml_hari","penilaian","total_hari","ket"];

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
