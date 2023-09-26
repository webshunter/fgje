<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Blk_hasilpkl extends CI_Controller {

	private $table1 = 'blk_hasilpkl';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/blk_hasilpkl/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id personalblk","tgl mulai","tgl selesai","jml hari","pkl ke","id instruktur","id tempatpkl","no resi","nominal","kepada","catatan", "action"]);
        $this->Createtable->order_set('0, 11');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_hasilpkl/view', $data);
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
                        'row' => ["id_personalblk","tgl_mulai","tgl_selesai","jml_hari","pkl_ke","id_instruktur","id_tempatpkl","no_resi","nominal","kepada","catatan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_pkl',
                        'data' => ["id_personalblk","tgl_mulai","tgl_selesai","jml_hari","pkl_ke","id_instruktur","id_tempatpkl","no_resi","nominal","kepada","catatan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_pkl', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_personalblk", "2"=>"tgl_mulai", "3"=>"tgl_selesai", "4"=>"jml_hari", "5"=>"pkl_ke", "6"=>"id_instruktur", "7"=>"id_tempatpkl", "8"=>"no_resi", "9"=>"nominal", "10"=>"kepada", "11"=>"catatan"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_pkl = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/blk_hasilpkl/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_pkl = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/blk_hasilpkl/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_personalblk = post("id_personalblk");
$tgl_mulai = post("tgl_mulai");
$tgl_selesai = post("tgl_selesai");
$jml_hari = post("jml_hari");
$pkl_ke = post("pkl_ke");
$id_instruktur = post("id_instruktur");
$id_tempatpkl = post("id_tempatpkl");
$no_resi = post("no_resi");
$nominal = post("nominal");
$kepada = post("kepada");
$catatan = post("catatan");

        

        $simpan = $this->db->query("
            INSERT INTO blk_hasilpkl
            (id_personalblk,tgl_mulai,tgl_selesai,jml_hari,pkl_ke,id_instruktur,id_tempatpkl,no_resi,nominal,kepada,catatan) VALUES ('$id_personalblk','$tgl_mulai','$tgl_selesai','$jml_hari','$pkl_ke','$id_instruktur','$id_tempatpkl','$no_resi','$nominal','$kepada','$catatan')
        ");
    

        if($simpan){
            redirect('admin/blk_hasilpkl');
        }
    }

    public function update(){
          $key = post('id_pkl'); $id_personalblk = post("id_personalblk");
$tgl_mulai = post("tgl_mulai");
$tgl_selesai = post("tgl_selesai");
$jml_hari = post("jml_hari");
$pkl_ke = post("pkl_ke");
$id_instruktur = post("id_instruktur");
$id_tempatpkl = post("id_tempatpkl");
$no_resi = post("no_resi");
$nominal = post("nominal");
$kepada = post("kepada");
$catatan = post("catatan");

        $simpan = $this->db->query("
            UPDATE blk_hasilpkl SET  id_personalblk = '$id_personalblk', tgl_mulai = '$tgl_mulai', tgl_selesai = '$tgl_selesai', jml_hari = '$jml_hari', pkl_ke = '$pkl_ke', id_instruktur = '$id_instruktur', id_tempatpkl = '$id_tempatpkl', no_resi = '$no_resi', nominal = '$nominal', kepada = '$kepada', catatan = '$catatan' WHERE id_pkl = '$key'
            ");
    

        if($simpan){
            redirect('admin/blk_hasilpkl');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-blk_hasilpkl.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id personalblk","tgl mulai","tgl selesai","jml hari","pkl ke","id instruktur","id tempatpkl","no resi","nominal","kepada","catatan", "action"];

        $calldata = ["id_personalblk","tgl_mulai","tgl_selesai","jml_hari","pkl_ke","id_instruktur","id_tempatpkl","no_resi","nominal","kepada","catatan"];

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
