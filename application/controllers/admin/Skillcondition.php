<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Skillcondition extends CI_Controller {

	private $table1 = 'skillcondition';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/skillcondition/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","keterampilan","hobi","alkohol","merokok","food","alergi","operasi","tato","kidal","angkat","pushup","peglihatan","butawarna","banyakrokok","tanganbasah","banyakrabun","idiomatik","mata2","tanganbasahchongyi","operasiket", "action"]);
        $this->Createtable->order_set('0, 21');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/skillcondition/view', $data);
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
                        'row' => ["id_biodata","keterampilan","hobi","alkohol","merokok","food","alergi","operasi","tato","kidal","angkat","pushup","peglihatan","butawarna","banyakrokok","tanganbasah","banyakrabun","idiomatik","mata2","tanganbasahchongyi","operasiket"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_skillcondition',
                        'data' => ["id_biodata","keterampilan","hobi","alkohol","merokok","food","alergi","operasi","tato","kidal","angkat","pushup","peglihatan","butawarna","banyakrokok","tanganbasah","banyakrabun","idiomatik","mata2","tanganbasahchongyi","operasiket"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_skillcondition', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"keterampilan", "3"=>"hobi", "4"=>"alkohol", "5"=>"merokok", "6"=>"food", "7"=>"alergi", "8"=>"operasi", "9"=>"tato", "10"=>"kidal", "11"=>"angkat", "12"=>"pushup", "13"=>"peglihatan", "14"=>"butawarna", "15"=>"banyakrokok", "16"=>"tanganbasah", "17"=>"banyakrabun", "18"=>"idiomatik", "19"=>"mata2", "20"=>"tanganbasahchongyi", "21"=>"operasiket"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_skillcondition = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/skillcondition/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_skillcondition = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/skillcondition/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$keterampilan = post("keterampilan");
$hobi = post("hobi");
$alkohol = post("alkohol");
$merokok = post("merokok");
$food = post("food");
$alergi = post("alergi");
$operasi = post("operasi");
$tato = post("tato");
$kidal = post("kidal");
$angkat = post("angkat");
$pushup = post("pushup");
$peglihatan = post("peglihatan");
$butawarna = post("butawarna");
$banyakrokok = post("banyakrokok");
$tanganbasah = post("tanganbasah");
$banyakrabun = post("banyakrabun");
$idiomatik = post("idiomatik");
$mata2 = post("mata2");
$tanganbasahchongyi = post("tanganbasahchongyi");
$operasiket = post("operasiket");

        

        $simpan = $this->db->query("
            INSERT INTO skillcondition
            (id_biodata,keterampilan,hobi,alkohol,merokok,food,alergi,operasi,tato,kidal,angkat,pushup,peglihatan,butawarna,banyakrokok,tanganbasah,banyakrabun,idiomatik,mata2,tanganbasahchongyi,operasiket) VALUES ('$id_biodata','$keterampilan','$hobi','$alkohol','$merokok','$food','$alergi','$operasi','$tato','$kidal','$angkat','$pushup','$peglihatan','$butawarna','$banyakrokok','$tanganbasah','$banyakrabun','$idiomatik','$mata2','$tanganbasahchongyi','$operasiket')
        ");
    

        if($simpan){
            redirect('admin/skillcondition');
        }
    }

    public function update(){
          $key = post('id_skillcondition'); $id_biodata = post("id_biodata");
$keterampilan = post("keterampilan");
$hobi = post("hobi");
$alkohol = post("alkohol");
$merokok = post("merokok");
$food = post("food");
$alergi = post("alergi");
$operasi = post("operasi");
$tato = post("tato");
$kidal = post("kidal");
$angkat = post("angkat");
$pushup = post("pushup");
$peglihatan = post("peglihatan");
$butawarna = post("butawarna");
$banyakrokok = post("banyakrokok");
$tanganbasah = post("tanganbasah");
$banyakrabun = post("banyakrabun");
$idiomatik = post("idiomatik");
$mata2 = post("mata2");
$tanganbasahchongyi = post("tanganbasahchongyi");
$operasiket = post("operasiket");

        $simpan = $this->db->query("
            UPDATE skillcondition SET  id_biodata = '$id_biodata', keterampilan = '$keterampilan', hobi = '$hobi', alkohol = '$alkohol', merokok = '$merokok', food = '$food', alergi = '$alergi', operasi = '$operasi', tato = '$tato', kidal = '$kidal', angkat = '$angkat', pushup = '$pushup', peglihatan = '$peglihatan', butawarna = '$butawarna', banyakrokok = '$banyakrokok', tanganbasah = '$tanganbasah', banyakrabun = '$banyakrabun', idiomatik = '$idiomatik', mata2 = '$mata2', tanganbasahchongyi = '$tanganbasahchongyi', operasiket = '$operasiket' WHERE id_skillcondition = '$key'
            ");
    

        if($simpan){
            redirect('admin/skillcondition');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-skillcondition.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","keterampilan","hobi","alkohol","merokok","food","alergi","operasi","tato","kidal","angkat","pushup","peglihatan","butawarna","banyakrokok","tanganbasah","banyakrabun","idiomatik","mata2","tanganbasahchongyi","operasiket", "action"];

        $calldata = ["id_biodata","keterampilan","hobi","alkohol","merokok","food","alergi","operasi","tato","kidal","angkat","pushup","peglihatan","butawarna","banyakrokok","tanganbasah","banyakrabun","idiomatik","mata2","tanganbasahchongyi","operasiket"];

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
