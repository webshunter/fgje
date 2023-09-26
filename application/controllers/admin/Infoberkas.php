<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Infoberkas extends CI_Controller {

	private $table1 = 'infoberkas';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/infoberkas/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tgl dok siap","info berkas","hptki berkas","nama ambil berkas","nama hub berkas","nama hp berkas","nama terima berkas","rak berkas", "action"]);
        $this->Createtable->order_set('0, 9');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/infoberkas/view', $data);
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
                        'row' => ["id_biodata","tgl_dok_siap","info_berkas","hptki_berkas","nama_ambil_berkas","nama_hub_berkas","nama_hp_berkas","nama_terima_berkas","rak_berkas"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_infoberkas',
                        'data' => ["id_biodata","tgl_dok_siap","info_berkas","hptki_berkas","nama_ambil_berkas","nama_hub_berkas","nama_hp_berkas","nama_terima_berkas","rak_berkas"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_infoberkas', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tgl_dok_siap", "3"=>"info_berkas", "4"=>"hptki_berkas", "5"=>"nama_ambil_berkas", "6"=>"nama_hub_berkas", "7"=>"nama_hp_berkas", "8"=>"nama_terima_berkas", "9"=>"rak_berkas"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_infoberkas = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/infoberkas/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_infoberkas = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/infoberkas/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tgl_dok_siap = post("tgl_dok_siap");
$info_berkas = post("info_berkas");
$hptki_berkas = post("hptki_berkas");
$nama_ambil_berkas = post("nama_ambil_berkas");
$nama_hub_berkas = post("nama_hub_berkas");
$nama_hp_berkas = post("nama_hp_berkas");
$nama_terima_berkas = post("nama_terima_berkas");
$rak_berkas = post("rak_berkas");

        

        $simpan = $this->db->query("
            INSERT INTO infoberkas
            (id_biodata,tgl_dok_siap,info_berkas,hptki_berkas,nama_ambil_berkas,nama_hub_berkas,nama_hp_berkas,nama_terima_berkas,rak_berkas) VALUES ('$id_biodata','$tgl_dok_siap','$info_berkas','$hptki_berkas','$nama_ambil_berkas','$nama_hub_berkas','$nama_hp_berkas','$nama_terima_berkas','$rak_berkas')
        ");
    

        if($simpan){
            redirect('admin/infoberkas');
        }
    }

    public function update(){
          $key = post('id_infoberkas'); $id_biodata = post("id_biodata");
$tgl_dok_siap = post("tgl_dok_siap");
$info_berkas = post("info_berkas");
$hptki_berkas = post("hptki_berkas");
$nama_ambil_berkas = post("nama_ambil_berkas");
$nama_hub_berkas = post("nama_hub_berkas");
$nama_hp_berkas = post("nama_hp_berkas");
$nama_terima_berkas = post("nama_terima_berkas");
$rak_berkas = post("rak_berkas");

        $simpan = $this->db->query("
            UPDATE infoberkas SET  id_biodata = '$id_biodata', tgl_dok_siap = '$tgl_dok_siap', info_berkas = '$info_berkas', hptki_berkas = '$hptki_berkas', nama_ambil_berkas = '$nama_ambil_berkas', nama_hub_berkas = '$nama_hub_berkas', nama_hp_berkas = '$nama_hp_berkas', nama_terima_berkas = '$nama_terima_berkas', rak_berkas = '$rak_berkas' WHERE id_infoberkas = '$key'
            ");
    

        if($simpan){
            redirect('admin/infoberkas');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-infoberkas.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tgl dok siap","info berkas","hptki berkas","nama ambil berkas","nama hub berkas","nama hp berkas","nama terima berkas","rak berkas", "action"];

        $calldata = ["id_biodata","tgl_dok_siap","info_berkas","hptki_berkas","nama_ambil_berkas","nama_hub_berkas","nama_hp_berkas","nama_terima_berkas","rak_berkas"];

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
