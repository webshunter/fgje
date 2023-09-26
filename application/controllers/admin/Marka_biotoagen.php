<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Marka_biotoagen extends CI_Controller {

	private $table1 = 'marka_biotoagen';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/marka_biotoagen/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tgl to agen","nama agen","grup to agen","nama pabrik","tgl pauliu","tgl inter","tgldilepas","nama mandarin", "action"]);
        $this->Createtable->order_set('0, 9');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/marka_biotoagen/view', $data);
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
                        'row' => ["id_biodata","tgl_to_agen","nama_agen","grup_to_agen","nama_pabrik","tgl_pauliu","tgl_inter","tgldilepas","nama_mandarin"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_marka_bioagen',
                        'data' => ["id_biodata","tgl_to_agen","nama_agen","grup_to_agen","nama_pabrik","tgl_pauliu","tgl_inter","tgldilepas","nama_mandarin"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_marka_bioagen', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tgl_to_agen", "3"=>"nama_agen", "4"=>"grup_to_agen", "5"=>"nama_pabrik", "6"=>"tgl_pauliu", "7"=>"tgl_inter", "8"=>"tgldilepas", "9"=>"nama_mandarin"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_marka_bioagen = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/marka_biotoagen/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_marka_bioagen = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/marka_biotoagen/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tgl_to_agen = post("tgl_to_agen");
$nama_agen = post("nama_agen");
$grup_to_agen = post("grup_to_agen");
$nama_pabrik = post("nama_pabrik");
$tgl_pauliu = post("tgl_pauliu");
$tgl_inter = post("tgl_inter");
$tgldilepas = post("tgldilepas");
$nama_mandarin = post("nama_mandarin");

        

        $simpan = $this->db->query("
            INSERT INTO marka_biotoagen
            (id_biodata,tgl_to_agen,nama_agen,grup_to_agen,nama_pabrik,tgl_pauliu,tgl_inter,tgldilepas,nama_mandarin) VALUES ('$id_biodata','$tgl_to_agen','$nama_agen','$grup_to_agen','$nama_pabrik','$tgl_pauliu','$tgl_inter','$tgldilepas','$nama_mandarin')
        ");
    

        if($simpan){
            redirect('admin/marka_biotoagen');
        }
    }

    public function update(){
          $key = post('id_marka_bioagen'); $id_biodata = post("id_biodata");
$tgl_to_agen = post("tgl_to_agen");
$nama_agen = post("nama_agen");
$grup_to_agen = post("grup_to_agen");
$nama_pabrik = post("nama_pabrik");
$tgl_pauliu = post("tgl_pauliu");
$tgl_inter = post("tgl_inter");
$tgldilepas = post("tgldilepas");
$nama_mandarin = post("nama_mandarin");

        $simpan = $this->db->query("
            UPDATE marka_biotoagen SET  id_biodata = '$id_biodata', tgl_to_agen = '$tgl_to_agen', nama_agen = '$nama_agen', grup_to_agen = '$grup_to_agen', nama_pabrik = '$nama_pabrik', tgl_pauliu = '$tgl_pauliu', tgl_inter = '$tgl_inter', tgldilepas = '$tgldilepas', nama_mandarin = '$nama_mandarin' WHERE id_marka_bioagen = '$key'
            ");
    

        if($simpan){
            redirect('admin/marka_biotoagen');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-marka_biotoagen.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tgl to agen","nama agen","grup to agen","nama pabrik","tgl pauliu","tgl inter","tgldilepas","nama mandarin", "action"];

        $calldata = ["id_biodata","tgl_to_agen","nama_agen","grup_to_agen","nama_pabrik","tgl_pauliu","tgl_inter","tgldilepas","nama_mandarin"];

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
