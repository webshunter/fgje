<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Marke extends CI_Controller {

	private $table1 = 'marke';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/marke/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","tgl kocokan","pt kocokan","tgl finger","trm visa","terbang perkiraan","pap perkiraan","kira kocokan","kira finger","kira visa","kira terbang","no visa","tgl berlaku","tgl sampai", "action"]);
        $this->Createtable->order_set('0, 14');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/marke/view', $data);
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
                        'row' => ["id_biodata","tgl_kocokan","pt_kocokan","tgl_finger","trm_visa","terbang_perkiraan","pap_perkiraan","kira_kocokan","kira_finger","kira_visa","kira_terbang","no_visa","tgl_berlaku","tgl_sampai"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_marke',
                        'data' => ["id_biodata","tgl_kocokan","pt_kocokan","tgl_finger","trm_visa","terbang_perkiraan","pap_perkiraan","kira_kocokan","kira_finger","kira_visa","kira_terbang","no_visa","tgl_berlaku","tgl_sampai"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_marke', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"tgl_kocokan", "3"=>"pt_kocokan", "4"=>"tgl_finger", "5"=>"trm_visa", "6"=>"terbang_perkiraan", "7"=>"pap_perkiraan", "8"=>"kira_kocokan", "9"=>"kira_finger", "10"=>"kira_visa", "11"=>"kira_terbang", "12"=>"no_visa", "13"=>"tgl_berlaku", "14"=>"tgl_sampai"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_marke = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/marke/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_marke = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/marke/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$tgl_kocokan = post("tgl_kocokan");
$pt_kocokan = post("pt_kocokan");
$tgl_finger = post("tgl_finger");
$trm_visa = post("trm_visa");
$terbang_perkiraan = post("terbang_perkiraan");
$pap_perkiraan = post("pap_perkiraan");
$kira_kocokan = post("kira_kocokan");
$kira_finger = post("kira_finger");
$kira_visa = post("kira_visa");
$kira_terbang = post("kira_terbang");
$no_visa = post("no_visa");
$tgl_berlaku = post("tgl_berlaku");
$tgl_sampai = post("tgl_sampai");

        

        $simpan = $this->db->query("
            INSERT INTO marke
            (id_biodata,tgl_kocokan,pt_kocokan,tgl_finger,trm_visa,terbang_perkiraan,pap_perkiraan,kira_kocokan,kira_finger,kira_visa,kira_terbang,no_visa,tgl_berlaku,tgl_sampai) VALUES ('$id_biodata','$tgl_kocokan','$pt_kocokan','$tgl_finger','$trm_visa','$terbang_perkiraan','$pap_perkiraan','$kira_kocokan','$kira_finger','$kira_visa','$kira_terbang','$no_visa','$tgl_berlaku','$tgl_sampai')
        ");
    

        if($simpan){
            redirect('admin/marke');
        }
    }

    public function update(){
          $key = post('id_marke'); $id_biodata = post("id_biodata");
$tgl_kocokan = post("tgl_kocokan");
$pt_kocokan = post("pt_kocokan");
$tgl_finger = post("tgl_finger");
$trm_visa = post("trm_visa");
$terbang_perkiraan = post("terbang_perkiraan");
$pap_perkiraan = post("pap_perkiraan");
$kira_kocokan = post("kira_kocokan");
$kira_finger = post("kira_finger");
$kira_visa = post("kira_visa");
$kira_terbang = post("kira_terbang");
$no_visa = post("no_visa");
$tgl_berlaku = post("tgl_berlaku");
$tgl_sampai = post("tgl_sampai");

        $simpan = $this->db->query("
            UPDATE marke SET  id_biodata = '$id_biodata', tgl_kocokan = '$tgl_kocokan', pt_kocokan = '$pt_kocokan', tgl_finger = '$tgl_finger', trm_visa = '$trm_visa', terbang_perkiraan = '$terbang_perkiraan', pap_perkiraan = '$pap_perkiraan', kira_kocokan = '$kira_kocokan', kira_finger = '$kira_finger', kira_visa = '$kira_visa', kira_terbang = '$kira_terbang', no_visa = '$no_visa', tgl_berlaku = '$tgl_berlaku', tgl_sampai = '$tgl_sampai' WHERE id_marke = '$key'
            ");
    

        if($simpan){
            redirect('admin/marke');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-marke.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","tgl kocokan","pt kocokan","tgl finger","trm visa","terbang perkiraan","pap perkiraan","kira kocokan","kira finger","kira visa","kira terbang","no visa","tgl berlaku","tgl sampai", "action"];

        $calldata = ["id_biodata","tgl_kocokan","pt_kocokan","tgl_finger","trm_visa","terbang_perkiraan","pap_perkiraan","kira_kocokan","kira_finger","kira_visa","kira_terbang","no_visa","tgl_berlaku","tgl_sampai"];

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
