<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pengalaman extends CI_Controller {

	private $table1 = 'pengalaman';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/pengalaman/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","negara","lokasikerja","lamakerja","periodekerja","jamkerja","majikan","alasanberhenti","kerjaprt","memasak","mencucibaju","setrikabaju","mencucimobil","rawatbinatang","rawatbayi","rawatanak","umur","kondisi","jompokelamin","jompoumur","jompokondisi","jompokelamin2","jompoumur2","jompokondisi2","anggotarumah","tiperumah","jumlahlantai","jumlahkamar","keterangan", "action"]);
        $this->Createtable->order_set('0, 29');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pengalaman/view', $data);
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
                        'row' => ["id_biodata","negara","lokasikerja","lamakerja","periodekerja","jamkerja","majikan","alasanberhenti","kerjaprt","memasak","mencucibaju","setrikabaju","mencucimobil","rawatbinatang","rawatbayi","rawatanak","umur","kondisi","jompokelamin","jompoumur","jompokondisi","jompokelamin2","jompoumur2","jompokondisi2","anggotarumah","tiperumah","jumlahlantai","jumlahkamar","keterangan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_pengalaman',
                        'data' => ["id_biodata","negara","lokasikerja","lamakerja","periodekerja","jamkerja","majikan","alasanberhenti","kerjaprt","memasak","mencucibaju","setrikabaju","mencucimobil","rawatbinatang","rawatbayi","rawatanak","umur","kondisi","jompokelamin","jompoumur","jompokondisi","jompokelamin2","jompoumur2","jompokondisi2","anggotarumah","tiperumah","jumlahlantai","jumlahkamar","keterangan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_pengalaman', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"negara", "3"=>"lokasikerja", "4"=>"lamakerja", "5"=>"periodekerja", "6"=>"jamkerja", "7"=>"majikan", "8"=>"alasanberhenti", "9"=>"kerjaprt", "10"=>"memasak", "11"=>"mencucibaju", "12"=>"setrikabaju", "13"=>"mencucimobil", "14"=>"rawatbinatang", "15"=>"rawatbayi", "16"=>"rawatanak", "17"=>"umur", "18"=>"kondisi", "19"=>"jompokelamin", "20"=>"jompoumur", "21"=>"jompokondisi", "22"=>"jompokelamin2", "23"=>"jompoumur2", "24"=>"jompokondisi2", "25"=>"anggotarumah", "26"=>"tiperumah", "27"=>"jumlahlantai", "28"=>"jumlahkamar", "29"=>"keterangan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_pengalaman = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/pengalaman/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_pengalaman = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/pengalaman/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$negara = post("negara");
$lokasikerja = post("lokasikerja");
$lamakerja = post("lamakerja");
$periodekerja = post("periodekerja");
$jamkerja = post("jamkerja");
$majikan = post("majikan");
$alasanberhenti = post("alasanberhenti");
$kerjaprt = post("kerjaprt");
$memasak = post("memasak");
$mencucibaju = post("mencucibaju");
$setrikabaju = post("setrikabaju");
$mencucimobil = post("mencucimobil");
$rawatbinatang = post("rawatbinatang");
$rawatbayi = post("rawatbayi");
$rawatanak = post("rawatanak");
$umur = post("umur");
$kondisi = post("kondisi");
$jompokelamin = post("jompokelamin");
$jompoumur = post("jompoumur");
$jompokondisi = post("jompokondisi");
$jompokelamin2 = post("jompokelamin2");
$jompoumur2 = post("jompoumur2");
$jompokondisi2 = post("jompokondisi2");
$anggotarumah = post("anggotarumah");
$tiperumah = post("tiperumah");
$jumlahlantai = post("jumlahlantai");
$jumlahkamar = post("jumlahkamar");
$keterangan = post("keterangan");

        

        $simpan = $this->db->query("
            INSERT INTO pengalaman
            (id_biodata,negara,lokasikerja,lamakerja,periodekerja,jamkerja,majikan,alasanberhenti,kerjaprt,memasak,mencucibaju,setrikabaju,mencucimobil,rawatbinatang,rawatbayi,rawatanak,umur,kondisi,jompokelamin,jompoumur,jompokondisi,jompokelamin2,jompoumur2,jompokondisi2,anggotarumah,tiperumah,jumlahlantai,jumlahkamar,keterangan) VALUES ('$id_biodata','$negara','$lokasikerja','$lamakerja','$periodekerja','$jamkerja','$majikan','$alasanberhenti','$kerjaprt','$memasak','$mencucibaju','$setrikabaju','$mencucimobil','$rawatbinatang','$rawatbayi','$rawatanak','$umur','$kondisi','$jompokelamin','$jompoumur','$jompokondisi','$jompokelamin2','$jompoumur2','$jompokondisi2','$anggotarumah','$tiperumah','$jumlahlantai','$jumlahkamar','$keterangan')
        ");
    

        if($simpan){
            redirect('admin/pengalaman');
        }
    }

    public function update(){
          $key = post('id_pengalaman'); $id_biodata = post("id_biodata");
$negara = post("negara");
$lokasikerja = post("lokasikerja");
$lamakerja = post("lamakerja");
$periodekerja = post("periodekerja");
$jamkerja = post("jamkerja");
$majikan = post("majikan");
$alasanberhenti = post("alasanberhenti");
$kerjaprt = post("kerjaprt");
$memasak = post("memasak");
$mencucibaju = post("mencucibaju");
$setrikabaju = post("setrikabaju");
$mencucimobil = post("mencucimobil");
$rawatbinatang = post("rawatbinatang");
$rawatbayi = post("rawatbayi");
$rawatanak = post("rawatanak");
$umur = post("umur");
$kondisi = post("kondisi");
$jompokelamin = post("jompokelamin");
$jompoumur = post("jompoumur");
$jompokondisi = post("jompokondisi");
$jompokelamin2 = post("jompokelamin2");
$jompoumur2 = post("jompoumur2");
$jompokondisi2 = post("jompokondisi2");
$anggotarumah = post("anggotarumah");
$tiperumah = post("tiperumah");
$jumlahlantai = post("jumlahlantai");
$jumlahkamar = post("jumlahkamar");
$keterangan = post("keterangan");

        $simpan = $this->db->query("
            UPDATE pengalaman SET  id_biodata = '$id_biodata', negara = '$negara', lokasikerja = '$lokasikerja', lamakerja = '$lamakerja', periodekerja = '$periodekerja', jamkerja = '$jamkerja', majikan = '$majikan', alasanberhenti = '$alasanberhenti', kerjaprt = '$kerjaprt', memasak = '$memasak', mencucibaju = '$mencucibaju', setrikabaju = '$setrikabaju', mencucimobil = '$mencucimobil', rawatbinatang = '$rawatbinatang', rawatbayi = '$rawatbayi', rawatanak = '$rawatanak', umur = '$umur', kondisi = '$kondisi', jompokelamin = '$jompokelamin', jompoumur = '$jompoumur', jompokondisi = '$jompokondisi', jompokelamin2 = '$jompokelamin2', jompoumur2 = '$jompoumur2', jompokondisi2 = '$jompokondisi2', anggotarumah = '$anggotarumah', tiperumah = '$tiperumah', jumlahlantai = '$jumlahlantai', jumlahkamar = '$jumlahkamar', keterangan = '$keterangan' WHERE id_pengalaman = '$key'
            ");
    

        if($simpan){
            redirect('admin/pengalaman');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-pengalaman.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","negara","lokasikerja","lamakerja","periodekerja","jamkerja","majikan","alasanberhenti","kerjaprt","memasak","mencucibaju","setrikabaju","mencucimobil","rawatbinatang","rawatbayi","rawatanak","umur","kondisi","jompokelamin","jompoumur","jompokondisi","jompokelamin2","jompoumur2","jompokondisi2","anggotarumah","tiperumah","jumlahlantai","jumlahkamar","keterangan", "action"];

        $calldata = ["id_biodata","negara","lokasikerja","lamakerja","periodekerja","jamkerja","majikan","alasanberhenti","kerjaprt","memasak","mencucibaju","setrikabaju","mencucimobil","rawatbinatang","rawatbayi","rawatanak","umur","kondisi","jompokelamin","jompoumur","jompokondisi","jompokelamin2","jompoumur2","jompokondisi2","anggotarumah","tiperumah","jumlahlantai","jumlahkamar","keterangan"];

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
