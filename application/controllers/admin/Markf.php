<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Markf extends CI_Controller {

	private $table1 = 'markf';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/markf/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","nama bank","tgl bank","tgl tki ttd","periode kredit","jumlah kredit","tgl email","ket email","tgl setelah terbang","ket setelah terbang","info berkas","hptki berkas","nama ambil berkas","nama hub berkas","nama hp berkas","nama terima berkas","tgl ambil dok","nama ambil dok","hub ambil dok","tel ambil dok","nama serah dok","tglujk","tglujk status", "action"]);
        $this->Createtable->order_set('0, 23');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/markf/view', $data);
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
                        'row' => ["id_biodata","nama_bank","tgl_bank","tgl_tki_ttd","periode_kredit","jumlah_kredit","tgl_email","ket_email","tgl_setelah_terbang","ket_setelah_terbang","info_berkas","hptki_berkas","nama_ambil_berkas","nama_hub_berkas","nama_hp_berkas","nama_terima_berkas","tgl_ambil_dok","nama_ambil_dok","hub_ambil_dok","tel_ambil_dok","nama_serah_dok","tglujk","tglujk_status"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_markf',
                        'data' => ["id_biodata","nama_bank","tgl_bank","tgl_tki_ttd","periode_kredit","jumlah_kredit","tgl_email","ket_email","tgl_setelah_terbang","ket_setelah_terbang","info_berkas","hptki_berkas","nama_ambil_berkas","nama_hub_berkas","nama_hp_berkas","nama_terima_berkas","tgl_ambil_dok","nama_ambil_dok","hub_ambil_dok","tel_ambil_dok","nama_serah_dok","tglujk","tglujk_status"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_markf', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"nama_bank", "3"=>"tgl_bank", "4"=>"tgl_tki_ttd", "5"=>"periode_kredit", "6"=>"jumlah_kredit", "7"=>"tgl_email", "8"=>"ket_email", "9"=>"tgl_setelah_terbang", "10"=>"ket_setelah_terbang", "11"=>"info_berkas", "12"=>"hptki_berkas", "13"=>"nama_ambil_berkas", "14"=>"nama_hub_berkas", "15"=>"nama_hp_berkas", "16"=>"nama_terima_berkas", "17"=>"tgl_ambil_dok", "18"=>"nama_ambil_dok", "19"=>"hub_ambil_dok", "20"=>"tel_ambil_dok", "21"=>"nama_serah_dok", "22"=>"tglujk", "23"=>"tglujk_status"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_markf = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/markf/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_markf = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/markf/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$nama_bank = post("nama_bank");
$tgl_bank = post("tgl_bank");
$tgl_tki_ttd = post("tgl_tki_ttd");
$periode_kredit = post("periode_kredit");
$jumlah_kredit = post("jumlah_kredit");
$tgl_email = post("tgl_email");
$ket_email = post("ket_email");
$tgl_setelah_terbang = post("tgl_setelah_terbang");
$ket_setelah_terbang = post("ket_setelah_terbang");
$info_berkas = post("info_berkas");
$hptki_berkas = post("hptki_berkas");
$nama_ambil_berkas = post("nama_ambil_berkas");
$nama_hub_berkas = post("nama_hub_berkas");
$nama_hp_berkas = post("nama_hp_berkas");
$nama_terima_berkas = post("nama_terima_berkas");
$tgl_ambil_dok = post("tgl_ambil_dok");
$nama_ambil_dok = post("nama_ambil_dok");
$hub_ambil_dok = post("hub_ambil_dok");
$tel_ambil_dok = post("tel_ambil_dok");
$nama_serah_dok = post("nama_serah_dok");
$tglujk = post("tglujk");
$tglujk_status = post("tglujk_status");

        

        $simpan = $this->db->query("
            INSERT INTO markf
            (id_biodata,nama_bank,tgl_bank,tgl_tki_ttd,periode_kredit,jumlah_kredit,tgl_email,ket_email,tgl_setelah_terbang,ket_setelah_terbang,info_berkas,hptki_berkas,nama_ambil_berkas,nama_hub_berkas,nama_hp_berkas,nama_terima_berkas,tgl_ambil_dok,nama_ambil_dok,hub_ambil_dok,tel_ambil_dok,nama_serah_dok,tglujk,tglujk_status) VALUES ('$id_biodata','$nama_bank','$tgl_bank','$tgl_tki_ttd','$periode_kredit','$jumlah_kredit','$tgl_email','$ket_email','$tgl_setelah_terbang','$ket_setelah_terbang','$info_berkas','$hptki_berkas','$nama_ambil_berkas','$nama_hub_berkas','$nama_hp_berkas','$nama_terima_berkas','$tgl_ambil_dok','$nama_ambil_dok','$hub_ambil_dok','$tel_ambil_dok','$nama_serah_dok','$tglujk','$tglujk_status')
        ");
    

        if($simpan){
            redirect('admin/markf');
        }
    }

    public function update(){
          $key = post('id_markf'); $id_biodata = post("id_biodata");
$nama_bank = post("nama_bank");
$tgl_bank = post("tgl_bank");
$tgl_tki_ttd = post("tgl_tki_ttd");
$periode_kredit = post("periode_kredit");
$jumlah_kredit = post("jumlah_kredit");
$tgl_email = post("tgl_email");
$ket_email = post("ket_email");
$tgl_setelah_terbang = post("tgl_setelah_terbang");
$ket_setelah_terbang = post("ket_setelah_terbang");
$info_berkas = post("info_berkas");
$hptki_berkas = post("hptki_berkas");
$nama_ambil_berkas = post("nama_ambil_berkas");
$nama_hub_berkas = post("nama_hub_berkas");
$nama_hp_berkas = post("nama_hp_berkas");
$nama_terima_berkas = post("nama_terima_berkas");
$tgl_ambil_dok = post("tgl_ambil_dok");
$nama_ambil_dok = post("nama_ambil_dok");
$hub_ambil_dok = post("hub_ambil_dok");
$tel_ambil_dok = post("tel_ambil_dok");
$nama_serah_dok = post("nama_serah_dok");
$tglujk = post("tglujk");
$tglujk_status = post("tglujk_status");

        $simpan = $this->db->query("
            UPDATE markf SET  id_biodata = '$id_biodata', nama_bank = '$nama_bank', tgl_bank = '$tgl_bank', tgl_tki_ttd = '$tgl_tki_ttd', periode_kredit = '$periode_kredit', jumlah_kredit = '$jumlah_kredit', tgl_email = '$tgl_email', ket_email = '$ket_email', tgl_setelah_terbang = '$tgl_setelah_terbang', ket_setelah_terbang = '$ket_setelah_terbang', info_berkas = '$info_berkas', hptki_berkas = '$hptki_berkas', nama_ambil_berkas = '$nama_ambil_berkas', nama_hub_berkas = '$nama_hub_berkas', nama_hp_berkas = '$nama_hp_berkas', nama_terima_berkas = '$nama_terima_berkas', tgl_ambil_dok = '$tgl_ambil_dok', nama_ambil_dok = '$nama_ambil_dok', hub_ambil_dok = '$hub_ambil_dok', tel_ambil_dok = '$tel_ambil_dok', nama_serah_dok = '$nama_serah_dok', tglujk = '$tglujk', tglujk_status = '$tglujk_status' WHERE id_markf = '$key'
            ");
    

        if($simpan){
            redirect('admin/markf');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-markf.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","nama bank","tgl bank","tgl tki ttd","periode kredit","jumlah kredit","tgl email","ket email","tgl setelah terbang","ket setelah terbang","info berkas","hptki berkas","nama ambil berkas","nama hub berkas","nama hp berkas","nama terima berkas","tgl ambil dok","nama ambil dok","hub ambil dok","tel ambil dok","nama serah dok","tglujk","tglujk status", "action"];

        $calldata = ["id_biodata","nama_bank","tgl_bank","tgl_tki_ttd","periode_kredit","jumlah_kredit","tgl_email","ket_email","tgl_setelah_terbang","ket_setelah_terbang","info_berkas","hptki_berkas","nama_ambil_berkas","nama_hub_berkas","nama_hp_berkas","nama_terima_berkas","tgl_ambil_dok","nama_ambil_dok","hub_ambil_dok","tel_ambil_dok","nama_serah_dok","tglujk","tglujk_status"];

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
