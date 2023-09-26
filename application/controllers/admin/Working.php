<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Working extends CI_Controller {

	private $table1 = 'working';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/working/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","negara","jenis usaha","posisi","penjelasan","masa kerja","masabulan","tahun","alasan","nama perusahaan","satuan","gaji","detail gaji","barangdiproduksi", "action"]);
        $this->Createtable->order_set('0, 14');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/working/view', $data);
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
                        'row' => ["id_biodata","negara","jenis_usaha","posisi","penjelasan","masa_kerja","masabulan","tahun","alasan","nama_perusahaan","satuan","gaji","detail_gaji","barangdiproduksi"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_working',
                        'data' => ["id_biodata","negara","jenis_usaha","posisi","penjelasan","masa_kerja","masabulan","tahun","alasan","nama_perusahaan","satuan","gaji","detail_gaji","barangdiproduksi"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_working', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"negara", "3"=>"jenis_usaha", "4"=>"posisi", "5"=>"penjelasan", "6"=>"masa_kerja", "7"=>"masabulan", "8"=>"tahun", "9"=>"alasan", "10"=>"nama_perusahaan", "11"=>"satuan", "12"=>"gaji", "13"=>"detail_gaji", "14"=>"barangdiproduksi"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_working = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/working/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_working = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/working/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$negara = post("negara");
$jenis_usaha = post("jenis_usaha");
$posisi = post("posisi");
$penjelasan = post("penjelasan");
$masa_kerja = post("masa_kerja");
$masabulan = post("masabulan");
$tahun = post("tahun");
$alasan = post("alasan");
$nama_perusahaan = post("nama_perusahaan");
$satuan = post("satuan");
$gaji = post("gaji");
$detail_gaji = post("detail_gaji");
$barangdiproduksi = post("barangdiproduksi");

        

        $simpan = $this->db->query("
            INSERT INTO working
            (id_biodata,negara,jenis_usaha,posisi,penjelasan,masa_kerja,masabulan,tahun,alasan,nama_perusahaan,satuan,gaji,detail_gaji,barangdiproduksi) VALUES ('$id_biodata','$negara','$jenis_usaha','$posisi','$penjelasan','$masa_kerja','$masabulan','$tahun','$alasan','$nama_perusahaan','$satuan','$gaji','$detail_gaji','$barangdiproduksi')
        ");
    

        if($simpan){
            redirect('admin/working');
        }
    }

    public function update(){
          $key = post('id_working'); $id_biodata = post("id_biodata");
$negara = post("negara");
$jenis_usaha = post("jenis_usaha");
$posisi = post("posisi");
$penjelasan = post("penjelasan");
$masa_kerja = post("masa_kerja");
$masabulan = post("masabulan");
$tahun = post("tahun");
$alasan = post("alasan");
$nama_perusahaan = post("nama_perusahaan");
$satuan = post("satuan");
$gaji = post("gaji");
$detail_gaji = post("detail_gaji");
$barangdiproduksi = post("barangdiproduksi");

        $simpan = $this->db->query("
            UPDATE working SET  id_biodata = '$id_biodata', negara = '$negara', jenis_usaha = '$jenis_usaha', posisi = '$posisi', penjelasan = '$penjelasan', masa_kerja = '$masa_kerja', masabulan = '$masabulan', tahun = '$tahun', alasan = '$alasan', nama_perusahaan = '$nama_perusahaan', satuan = '$satuan', gaji = '$gaji', detail_gaji = '$detail_gaji', barangdiproduksi = '$barangdiproduksi' WHERE id_working = '$key'
            ");
    

        if($simpan){
            redirect('admin/working');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-working.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","negara","jenis usaha","posisi","penjelasan","masa kerja","masabulan","tahun","alasan","nama perusahaan","satuan","gaji","detail gaji","barangdiproduksi", "action"];

        $calldata = ["id_biodata","negara","jenis_usaha","posisi","penjelasan","masa_kerja","masabulan","tahun","alasan","nama_perusahaan","satuan","gaji","detail_gaji","barangdiproduksi"];

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
