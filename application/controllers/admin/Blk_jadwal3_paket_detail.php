<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_jadwal3_paket_detail extends CI_Controller {

	private $table1 = 'blk_jadwal3_paket_detail';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_jadwal3_paket_detail/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","hari","jam","angkatan","materi","paket id","minggu id","created at","updated at","deleted at", "action"]);
        $this->Createtable->order_set('0, 9');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwal3_paket_detail/view', $data);
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
                        'row' => ["hari","jam","angkatan","materi","paket_id","minggu_id","created_at","updated_at","deleted_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["hari","jam","angkatan","materi","paket_id","minggu_id","created_at","updated_at","deleted_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"hari", "2"=>"jam", "3"=>"angkatan", "4"=>"materi", "5"=>"paket_id", "6"=>"minggu_id", "7"=>"created_at", "8"=>"updated_at", "9"=>"deleted_at"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_jadwal3_paket_detail/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwal3_paket_detail/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $hari = post("hari");
$jam = post("jam");
$angkatan = post("angkatan");
$materi = post("materi");
$paket_id = post("paket_id");
$minggu_id = post("minggu_id");
$created_at = post("created_at");
$updated_at = post("updated_at");
$deleted_at = post("deleted_at");

        

        $simpan = $this->db->query("
            INSERT INTO blk_jadwal3_paket_detail
            (hari,jam,angkatan,materi,paket_id,minggu_id,created_at,updated_at,deleted_at) VALUES ('$hari','$jam','$angkatan','$materi','$paket_id','$minggu_id','$created_at','$updated_at','$deleted_at')
        ");
    

        if($simpan){
            redirect('admin/blk_jadwal3_paket_detail');
        }
    }

    public function update(){
          $key = post('id'); $hari = post("hari");
$jam = post("jam");
$angkatan = post("angkatan");
$materi = post("materi");
$paket_id = post("paket_id");
$minggu_id = post("minggu_id");
$created_at = post("created_at");
$updated_at = post("updated_at");
$deleted_at = post("deleted_at");

        $simpan = $this->db->query("
            UPDATE blk_jadwal3_paket_detail SET  hari = '$hari', jam = '$jam', angkatan = '$angkatan', materi = '$materi', paket_id = '$paket_id', minggu_id = '$minggu_id', created_at = '$created_at', updated_at = '$updated_at', deleted_at = '$deleted_at' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_jadwal3_paket_detail');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_jadwal3_paket_detail.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","hari","jam","angkatan","materi","paket id","minggu id","created at","updated at","deleted at", "action"];

        $calldata = ["hari","jam","angkatan","materi","paket_id","minggu_id","created_at","updated_at","deleted_at"];

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
