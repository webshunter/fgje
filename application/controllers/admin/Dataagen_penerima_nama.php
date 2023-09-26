<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dataagen_penerima_nama extends CI_Controller {

	private $table1 = 'dataagen_penerima_nama';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/dataagen_penerima_nama/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama","namamandarin","branch","bank code","bank no","bank tel","deleted at", "action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/dataagen_penerima_nama/view', $data);
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
                        'row' => ["nama","namamandarin","branch","bank_code","bank_no","bank_tel","deleted_at"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama","namamandarin","branch","bank_code","bank_no","bank_tel","deleted_at"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama", "2"=>"namamandarin", "3"=>"branch", "4"=>"bank_code", "5"=>"bank_no", "6"=>"bank_tel", "7"=>"deleted_at"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/dataagen_penerima_nama/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/dataagen_penerima_nama/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $nama = post("nama");
$namamandarin = post("namamandarin");
$branch = post("branch");
$bank_code = post("bank_code");
$bank_no = post("bank_no");
$bank_tel = post("bank_tel");
$deleted_at = post("deleted_at");

        

        $simpan = $this->db->query("
            INSERT INTO dataagen_penerima_nama
            (nama,namamandarin,branch,bank_code,bank_no,bank_tel,deleted_at) VALUES ('$nama','$namamandarin','$branch','$bank_code','$bank_no','$bank_tel','$deleted_at')
        ");
    

        if($simpan){
            redirect('admin/dataagen_penerima_nama');
        }
    }

    public function update(){
          $key = post('id'); $nama = post("nama");
$namamandarin = post("namamandarin");
$branch = post("branch");
$bank_code = post("bank_code");
$bank_no = post("bank_no");
$bank_tel = post("bank_tel");
$deleted_at = post("deleted_at");

        $simpan = $this->db->query("
            UPDATE dataagen_penerima_nama SET  nama = '$nama', namamandarin = '$namamandarin', branch = '$branch', bank_code = '$bank_code', bank_no = '$bank_no', bank_tel = '$bank_tel', deleted_at = '$deleted_at' WHERE id = '$key'
            ");
    

        if($simpan){
            redirect('admin/dataagen_penerima_nama');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-dataagen_penerima_nama.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","nama","namamandarin","branch","bank code","bank no","bank tel","deleted at", "action"];

        $calldata = ["nama","namamandarin","branch","bank_code","bank_no","bank_tel","deleted_at"];

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
