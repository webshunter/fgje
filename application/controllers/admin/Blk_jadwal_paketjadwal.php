<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_jadwal_paketjadwal extends CI_Controller {

	private $table1 = 'blk_jadwal_paketjadwal';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_jadwal_paketjadwal/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","hari","jam","minggu","materi","paket id","ip modified","date modified","time modified", "action"]);
        $this->Createtable->order_set('0, 8');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwal_paketjadwal/view', $data);
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
                        'row' => ["hari","jam","minggu","materi","paket_id","ip_modified","date_modified","time_modified"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_jadwal_paket_jadwal',
                        'data' => ["hari","jam","minggu","materi","paket_id","ip_modified","date_modified","time_modified"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_jadwal_paket_jadwal', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"hari", "2"=>"jam", "3"=>"minggu", "4"=>"materi", "5"=>"paket_id", "6"=>"ip_modified", "7"=>"date_modified", "8"=>"time_modified"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_jadwal_paket_jadwal = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_jadwal_paketjadwal/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_jadwal_paket_jadwal = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_jadwal_paketjadwal/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $hari = post("hari");
$jam = post("jam");
$minggu = post("minggu");
$materi = post("materi");
$paket_id = post("paket_id");
$ip_modified = post("ip_modified");
$date_modified = post("date_modified");
$time_modified = post("time_modified");

        

        $simpan = $this->db->query("
            INSERT INTO blk_jadwal_paketjadwal
            (hari,jam,minggu,materi,paket_id,ip_modified,date_modified,time_modified) VALUES ('$hari','$jam','$minggu','$materi','$paket_id','$ip_modified','$date_modified','$time_modified')
        ");
    

        if($simpan){
            redirect('admin/blk_jadwal_paketjadwal');
        }
    }

    public function update(){
          $key = post('id_jadwal_paket_jadwal'); $hari = post("hari");
$jam = post("jam");
$minggu = post("minggu");
$materi = post("materi");
$paket_id = post("paket_id");
$ip_modified = post("ip_modified");
$date_modified = post("date_modified");
$time_modified = post("time_modified");

        $simpan = $this->db->query("
            UPDATE blk_jadwal_paketjadwal SET  hari = '$hari', jam = '$jam', minggu = '$minggu', materi = '$materi', paket_id = '$paket_id', ip_modified = '$ip_modified', date_modified = '$date_modified', time_modified = '$time_modified' WHERE id_jadwal_paket_jadwal = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_jadwal_paketjadwal');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_jadwal_paketjadwal.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","hari","jam","minggu","materi","paket id","ip modified","date modified","time modified", "action"];

        $calldata = ["hari","jam","minggu","materi","paket_id","ip_modified","date_modified","time_modified"];

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
