<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Markc extends CI_Controller {

	private $table1 = 'markc';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/markc/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tgl legal","nama legal","hub legal","khusus legal","tgl nota","nama nota","hub nota","khusus nota","tgl pram","hasil pram","tgl samm","hasil samm","exp samm","tgl murm","hasil murm","exp murm","in paspor","bk paspor","aju skck","trm skck","exp skck", "action"]);
        $this->Createtable->order_set('0, 22');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/markc/view', $data);
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
                        'row' => ["id_biodata","tgl_legal","nama_legal","hub_legal","khusus_legal","tgl_nota","nama_nota","hub_nota","khusus_nota","tgl_pram","hasil_pram","tgl_samm","hasil_samm","exp_samm","tgl_murm","hasil_murm","exp_murm","in_paspor","bk_paspor","aju_skck","trm_skck","exp_skck"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_markc',
                        'data' => ["id_biodata","tgl_legal","nama_legal","hub_legal","khusus_legal","tgl_nota","nama_nota","hub_nota","khusus_nota","tgl_pram","hasil_pram","tgl_samm","hasil_samm","exp_samm","tgl_murm","hasil_murm","exp_murm","in_paspor","bk_paspor","aju_skck","trm_skck","exp_skck"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_markc', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tgl_legal", "3"=>"nama_legal", "4"=>"hub_legal", "5"=>"khusus_legal", "6"=>"tgl_nota", "7"=>"nama_nota", "8"=>"hub_nota", "9"=>"khusus_nota", "10"=>"tgl_pram", "11"=>"hasil_pram", "12"=>"tgl_samm", "13"=>"hasil_samm", "14"=>"exp_samm", "15"=>"tgl_murm", "16"=>"hasil_murm", "17"=>"exp_murm", "18"=>"in_paspor", "19"=>"bk_paspor", "20"=>"aju_skck", "21"=>"trm_skck", "22"=>"exp_skck"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_markc = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/markc/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_markc = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/markc/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tgl_legal = post("tgl_legal");
$nama_legal = post("nama_legal");
$hub_legal = post("hub_legal");
$khusus_legal = post("khusus_legal");
$tgl_nota = post("tgl_nota");
$nama_nota = post("nama_nota");
$hub_nota = post("hub_nota");
$khusus_nota = post("khusus_nota");
$tgl_pram = post("tgl_pram");
$hasil_pram = post("hasil_pram");
$tgl_samm = post("tgl_samm");
$hasil_samm = post("hasil_samm");
$exp_samm = post("exp_samm");
$tgl_murm = post("tgl_murm");
$hasil_murm = post("hasil_murm");
$exp_murm = post("exp_murm");
$in_paspor = post("in_paspor");
$bk_paspor = post("bk_paspor");
$aju_skck = post("aju_skck");
$trm_skck = post("trm_skck");
$exp_skck = post("exp_skck");

        

        $simpan = $this->db->query("
            INSERT INTO markc
            (id_biodata,tgl_legal,nama_legal,hub_legal,khusus_legal,tgl_nota,nama_nota,hub_nota,khusus_nota,tgl_pram,hasil_pram,tgl_samm,hasil_samm,exp_samm,tgl_murm,hasil_murm,exp_murm,in_paspor,bk_paspor,aju_skck,trm_skck,exp_skck) VALUES ('$id_biodata','$tgl_legal','$nama_legal','$hub_legal','$khusus_legal','$tgl_nota','$nama_nota','$hub_nota','$khusus_nota','$tgl_pram','$hasil_pram','$tgl_samm','$hasil_samm','$exp_samm','$tgl_murm','$hasil_murm','$exp_murm','$in_paspor','$bk_paspor','$aju_skck','$trm_skck','$exp_skck')
        ");
    

        if($simpan){
            redirect('admin/markc');
        }
    }

    public function update(){
          $key = post('id_markc'); $id_biodata = post("id_biodata");
$tgl_legal = post("tgl_legal");
$nama_legal = post("nama_legal");
$hub_legal = post("hub_legal");
$khusus_legal = post("khusus_legal");
$tgl_nota = post("tgl_nota");
$nama_nota = post("nama_nota");
$hub_nota = post("hub_nota");
$khusus_nota = post("khusus_nota");
$tgl_pram = post("tgl_pram");
$hasil_pram = post("hasil_pram");
$tgl_samm = post("tgl_samm");
$hasil_samm = post("hasil_samm");
$exp_samm = post("exp_samm");
$tgl_murm = post("tgl_murm");
$hasil_murm = post("hasil_murm");
$exp_murm = post("exp_murm");
$in_paspor = post("in_paspor");
$bk_paspor = post("bk_paspor");
$aju_skck = post("aju_skck");
$trm_skck = post("trm_skck");
$exp_skck = post("exp_skck");

        $simpan = $this->db->query("
            UPDATE markc SET  id_biodata = '$id_biodata', tgl_legal = '$tgl_legal', nama_legal = '$nama_legal', hub_legal = '$hub_legal', khusus_legal = '$khusus_legal', tgl_nota = '$tgl_nota', nama_nota = '$nama_nota', hub_nota = '$hub_nota', khusus_nota = '$khusus_nota', tgl_pram = '$tgl_pram', hasil_pram = '$hasil_pram', tgl_samm = '$tgl_samm', hasil_samm = '$hasil_samm', exp_samm = '$exp_samm', tgl_murm = '$tgl_murm', hasil_murm = '$hasil_murm', exp_murm = '$exp_murm', in_paspor = '$in_paspor', bk_paspor = '$bk_paspor', aju_skck = '$aju_skck', trm_skck = '$trm_skck', exp_skck = '$exp_skck' WHERE id_markc = '$key'
            ");
    

        if($simpan){
            redirect('admin/markc');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-markc.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tgl legal","nama legal","hub legal","khusus legal","tgl nota","nama nota","hub nota","khusus nota","tgl pram","hasil pram","tgl samm","hasil samm","exp samm","tgl murm","hasil murm","exp murm","in paspor","bk paspor","aju skck","trm skck","exp skck", "action"];

        $calldata = ["id_biodata","tgl_legal","nama_legal","hub_legal","khusus_legal","tgl_nota","nama_nota","hub_nota","khusus_nota","tgl_pram","hasil_pram","tgl_samm","hasil_samm","exp_samm","tgl_murm","hasil_murm","exp_murm","in_paspor","bk_paspor","aju_skck","trm_skck","exp_skck"];

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
