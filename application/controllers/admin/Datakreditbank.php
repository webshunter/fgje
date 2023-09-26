<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datakreditbank extends CI_Controller {

	private $table1 = 'datakreditbank';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/datakreditbank/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","kode sektor","namakredit","isikredit","nilaikredit","mandarinnya","statuskredit","mandarinnya2","statuskredit2", "action"]);
        $this->Createtable->order_set('0, 8');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datakreditbank/view', $data);
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
                        'row' => ["kode_sektor","namakredit","isikredit","nilaikredit","mandarinnya","statuskredit","mandarinnya2","statuskredit2"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_kreditbank',
                        'data' => ["kode_sektor","namakredit","isikredit","nilaikredit","mandarinnya","statuskredit","mandarinnya2","statuskredit2"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_kreditbank', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"kode_sektor", "2"=>"namakredit", "3"=>"isikredit", "4"=>"nilaikredit", "5"=>"mandarinnya", "6"=>"statuskredit", "7"=>"mandarinnya2", "8"=>"statuskredit2"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_kreditbank = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/datakreditbank/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_kreditbank = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/datakreditbank/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $kode_sektor = post("kode_sektor");
$namakredit = post("namakredit");
$isikredit = post("isikredit");
$nilaikredit = post("nilaikredit");
$mandarinnya = post("mandarinnya");
$statuskredit = post("statuskredit");
$mandarinnya2 = post("mandarinnya2");
$statuskredit2 = post("statuskredit2");

        

        $simpan = $this->db->query("
            INSERT INTO datakreditbank
            (kode_sektor,namakredit,isikredit,nilaikredit,mandarinnya,statuskredit,mandarinnya2,statuskredit2) VALUES ('$kode_sektor','$namakredit','$isikredit','$nilaikredit','$mandarinnya','$statuskredit','$mandarinnya2','$statuskredit2')
        ");
    

        if($simpan){
            redirect('admin/datakreditbank');
        }
    }

    public function update(){
          $key = post('id_kreditbank'); $kode_sektor = post("kode_sektor");
$namakredit = post("namakredit");
$isikredit = post("isikredit");
$nilaikredit = post("nilaikredit");
$mandarinnya = post("mandarinnya");
$statuskredit = post("statuskredit");
$mandarinnya2 = post("mandarinnya2");
$statuskredit2 = post("statuskredit2");

        $simpan = $this->db->query("
            UPDATE datakreditbank SET  kode_sektor = '$kode_sektor', namakredit = '$namakredit', isikredit = '$isikredit', nilaikredit = '$nilaikredit', mandarinnya = '$mandarinnya', statuskredit = '$statuskredit', mandarinnya2 = '$mandarinnya2', statuskredit2 = '$statuskredit2' WHERE id_kreditbank = '$key'
            ");
    

        if($simpan){
            redirect('admin/datakreditbank');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-datakreditbank.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","kode sektor","namakredit","isikredit","nilaikredit","mandarinnya","statuskredit","mandarinnya2","statuskredit2", "action"];

        $calldata = ["kode_sektor","namakredit","isikredit","nilaikredit","mandarinnya","statuskredit","mandarinnya2","statuskredit2"];

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
