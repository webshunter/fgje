<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datamajikan extends CI_Controller {

	private $table1 = 'datamajikan';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datamajikan/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode majikan","nama","namamajikan","hp","email","alamat","alamat mandarin","status","kode agen","kode group","file","data tki","pimpinan man","pimpinan indo","jabatan man","jabatan indo","filetglinput", "action"]);
        $this->Createtable->order_set('0, 17');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datamajikan/view', $data);
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
                        'row' => ["kode_majikan","nama","namamajikan","hp","email","alamat","alamat_mandarin","status","kode_agen","kode_group","file","data_tki","pimpinan_man","pimpinan_indo","jabatan_man","jabatan_indo","filetglinput"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_majikan',
                        'data' => ["kode_majikan","nama","namamajikan","hp","email","alamat","alamat_mandarin","status","kode_agen","kode_group","file","data_tki","pimpinan_man","pimpinan_indo","jabatan_man","jabatan_indo","filetglinput"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_majikan', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_majikan", "2"=>"nama", "3"=>"namamajikan", "4"=>"hp", "5"=>"email", "6"=>"alamat", "7"=>"alamat_mandarin", "8"=>"status", "9"=>"kode_agen", "10"=>"kode_group", "11"=>"file", "12"=>"data_tki", "13"=>"pimpinan_man", "14"=>"pimpinan_indo", "15"=>"jabatan_man", "16"=>"jabatan_indo", "17"=>"filetglinput"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_majikan = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datamajikan/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_majikan = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datamajikan/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_majikan = post("kode_majikan");
$nama = post("nama");
$namamajikan = post("namamajikan");
$hp = post("hp");
$email = post("email");
$alamat = post("alamat");
$alamat_mandarin = post("alamat_mandarin");
$status = post("status");
$kode_agen = post("kode_agen");
$kode_group = post("kode_group");
$file = post("file");
$data_tki = post("data_tki");
$pimpinan_man = post("pimpinan_man");
$pimpinan_indo = post("pimpinan_indo");
$jabatan_man = post("jabatan_man");
$jabatan_indo = post("jabatan_indo");
$filetglinput = post("filetglinput");

        

        $simpan = $this->db->query("
            INSERT INTO datamajikan
            (kode_majikan,nama,namamajikan,hp,email,alamat,alamat_mandarin,status,kode_agen,kode_group,file,data_tki,pimpinan_man,pimpinan_indo,jabatan_man,jabatan_indo,filetglinput) VALUES ('$kode_majikan','$nama','$namamajikan','$hp','$email','$alamat','$alamat_mandarin','$status','$kode_agen','$kode_group','$file','$data_tki','$pimpinan_man','$pimpinan_indo','$jabatan_man','$jabatan_indo','$filetglinput')
        ");
    

        if($simpan){
            redirect('admin/datamajikan');
        }
    }

    public function update(){
          $key = post('id_majikan'); $kode_majikan = post("kode_majikan");
$nama = post("nama");
$namamajikan = post("namamajikan");
$hp = post("hp");
$email = post("email");
$alamat = post("alamat");
$alamat_mandarin = post("alamat_mandarin");
$status = post("status");
$kode_agen = post("kode_agen");
$kode_group = post("kode_group");
$file = post("file");
$data_tki = post("data_tki");
$pimpinan_man = post("pimpinan_man");
$pimpinan_indo = post("pimpinan_indo");
$jabatan_man = post("jabatan_man");
$jabatan_indo = post("jabatan_indo");
$filetglinput = post("filetglinput");

        $simpan = $this->db->query("
            UPDATE datamajikan SET  kode_majikan = '$kode_majikan', nama = '$nama', namamajikan = '$namamajikan', hp = '$hp', email = '$email', alamat = '$alamat', alamat_mandarin = '$alamat_mandarin', status = '$status', kode_agen = '$kode_agen', kode_group = '$kode_group', file = '$file', data_tki = '$data_tki', pimpinan_man = '$pimpinan_man', pimpinan_indo = '$pimpinan_indo', jabatan_man = '$jabatan_man', jabatan_indo = '$jabatan_indo', filetglinput = '$filetglinput' WHERE id_majikan = '$key'
            ");
    

        if($simpan){
            redirect('admin/datamajikan');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datamajikan.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode majikan","nama","namamajikan","hp","email","alamat","alamat mandarin","status","kode agen","kode group","file","data tki","pimpinan man","pimpinan indo","jabatan man","jabatan indo","filetglinput", "action"];

        $calldata = ["kode_majikan","nama","namamajikan","hp","email","alamat","alamat_mandarin","status","kode_agen","kode_group","file","data_tki","pimpinan_man","pimpinan_indo","jabatan_man","jabatan_indo","filetglinput"];

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
