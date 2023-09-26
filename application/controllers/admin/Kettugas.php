<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kettugas extends CI_Controller {

	private $table1 = 'kettugas';

	public function __construct()
	{
		parent::__construct();
        //Cek_login::ceklogin();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('admin/kettugas/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","id biodata","t1 pengalaman","t1 latihan","t1 bersedia","t2 pengalaman","t2 latihan","t2 bersedia","t3 pengalaman","t3 latihan","t3 bersedia","t4 pengalaman","t4 latihan","t4 bersedia","t5 pengalaman","t5 bersedia","t6 pengalaman","t6 bersedia","t7 pengalaman","t7 bersedia","t8 pengalaman","t8 bersedia","t9 pengalaman","t9 bersedia","t10 pengalaman","t10 latihan","t10 bersedia","t11 pengalaman","t11 latihan","t11 bersedia","t12 pengalaman","t12 bersedia","t13 pengalaman","t13 bersedia","t14apengalaman","t14abersedia","t14bpengalaman","t14bbersedia","t15 pengalaman","t15 bersedia","t16 pengalaman","t16 bersedia","t17 pengalaman","t17 bersedia","t18 pengalaman","t18 bersedia","t19 pengalaman","t19 bersedia","t20 pengalaman","t20 bersedia","t21 pengalaman","t21 bersedia","t22 pengalaman","t22 bersedia","t23 pengalaman","t23 bersedia","t24 pengalaman","t24 bersedia","t25 pengalaman","t25 bersedia","t26 pengalaman","t26 bersedia","t27 pengalaman","t27 bersedia","t28 pengalaman","t28 bersedia","t29 pengalaman","t29 bersedia","t30 pengalaman","t30 bersedia","t31 pengalaman","t31 bersedia","t32 pengalaman","t32 bersedia","t33 pengalaman","t33 bersedia","t34 pengalaman","t34 bersedia","t35 kg", "action"]);
        $this->Createtable->order_set('0, 78');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
        $this->load->view('templateadmin/head');
        $this->load->view('admin/kettugas/view', $data);
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
                        'row' => ["id_biodata","t1_pengalaman","t1_latihan","t1_bersedia","t2_pengalaman","t2_latihan","t2_bersedia","t3_pengalaman","t3_latihan","t3_bersedia","t4_pengalaman","t4_latihan","t4_bersedia","t5_pengalaman","t5_bersedia","t6_pengalaman","t6_bersedia","t7_pengalaman","t7_bersedia","t8_pengalaman","t8_bersedia","t9_pengalaman","t9_bersedia","t10_pengalaman","t10_latihan","t10_bersedia","t11_pengalaman","t11_latihan","t11_bersedia","t12_pengalaman","t12_bersedia","t13_pengalaman","t13_bersedia","t14apengalaman","t14abersedia","t14bpengalaman","t14bbersedia","t15_pengalaman","t15_bersedia","t16_pengalaman","t16_bersedia","t17_pengalaman","t17_bersedia","t18_pengalaman","t18_bersedia","t19_pengalaman","t19_bersedia","t20_pengalaman","t20_bersedia","t21_pengalaman","t21_bersedia","t22_pengalaman","t22_bersedia","t23_pengalaman","t23_bersedia","t24_pengalaman","t24_bersedia","t25_pengalaman","t25_bersedia","t26_pengalaman","t26_bersedia","t27_pengalaman","t27_bersedia","t28_pengalaman","t28_bersedia","t29_pengalaman","t29_bersedia","t30_pengalaman","t30_bersedia","t31_pengalaman","t31_bersedia","t32_pengalaman","t32_bersedia","t33_pengalaman","t33_bersedia","t34_pengalaman","t34_bersedia","t35_kg"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id_kettugas',
                        'data' => ["id_biodata","t1_pengalaman","t1_latihan","t1_bersedia","t2_pengalaman","t2_latihan","t2_bersedia","t3_pengalaman","t3_latihan","t3_bersedia","t4_pengalaman","t4_latihan","t4_bersedia","t5_pengalaman","t5_bersedia","t6_pengalaman","t6_bersedia","t7_pengalaman","t7_bersedia","t8_pengalaman","t8_bersedia","t9_pengalaman","t9_bersedia","t10_pengalaman","t10_latihan","t10_bersedia","t11_pengalaman","t11_latihan","t11_bersedia","t12_pengalaman","t12_bersedia","t13_pengalaman","t13_bersedia","t14apengalaman","t14abersedia","t14bpengalaman","t14bbersedia","t15_pengalaman","t15_bersedia","t16_pengalaman","t16_bersedia","t17_pengalaman","t17_bersedia","t18_pengalaman","t18_bersedia","t19_pengalaman","t19_bersedia","t20_pengalaman","t20_bersedia","t21_pengalaman","t21_bersedia","t22_pengalaman","t22_bersedia","t23_pengalaman","t23_bersedia","t24_pengalaman","t24_bersedia","t25_pengalaman","t25_bersedia","t26_pengalaman","t26_bersedia","t27_pengalaman","t27_bersedia","t28_pengalaman","t28_bersedia","t29_pengalaman","t29_bersedia","t30_pengalaman","t30_bersedia","t31_pengalaman","t31_bersedia","t32_pengalaman","t32_bersedia","t33_pengalaman","t33_bersedia","t34_pengalaman","t34_bersedia","t35_kg"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id_kettugas', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"id_biodata", "2"=>"t1_pengalaman", "3"=>"t1_latihan", "4"=>"t1_bersedia", "5"=>"t2_pengalaman", "6"=>"t2_latihan", "7"=>"t2_bersedia", "8"=>"t3_pengalaman", "9"=>"t3_latihan", "10"=>"t3_bersedia", "11"=>"t4_pengalaman", "12"=>"t4_latihan", "13"=>"t4_bersedia", "14"=>"t5_pengalaman", "15"=>"t5_bersedia", "16"=>"t6_pengalaman", "17"=>"t6_bersedia", "18"=>"t7_pengalaman", "19"=>"t7_bersedia", "20"=>"t8_pengalaman", "21"=>"t8_bersedia", "22"=>"t9_pengalaman", "23"=>"t9_bersedia", "24"=>"t10_pengalaman", "25"=>"t10_latihan", "26"=>"t10_bersedia", "27"=>"t11_pengalaman", "28"=>"t11_latihan", "29"=>"t11_bersedia", "30"=>"t12_pengalaman", "31"=>"t12_bersedia", "32"=>"t13_pengalaman", "33"=>"t13_bersedia", "34"=>"t14apengalaman", "35"=>"t14abersedia", "36"=>"t14bpengalaman", "37"=>"t14bbersedia", "38"=>"t15_pengalaman", "39"=>"t15_bersedia", "40"=>"t16_pengalaman", "41"=>"t16_bersedia", "42"=>"t17_pengalaman", "43"=>"t17_bersedia", "44"=>"t18_pengalaman", "45"=>"t18_bersedia", "46"=>"t19_pengalaman", "47"=>"t19_bersedia", "48"=>"t20_pengalaman", "49"=>"t20_bersedia", "50"=>"t21_pengalaman", "51"=>"t21_bersedia", "52"=>"t22_pengalaman", "53"=>"t22_bersedia", "54"=>"t23_pengalaman", "55"=>"t23_bersedia", "56"=>"t24_pengalaman", "57"=>"t24_bersedia", "58"=>"t25_pengalaman", "59"=>"t25_bersedia", "60"=>"t26_pengalaman", "61"=>"t26_bersedia", "62"=>"t27_pengalaman", "63"=>"t27_bersedia", "64"=>"t28_pengalaman", "65"=>"t28_bersedia", "66"=>"t29_pengalaman", "67"=>"t29_bersedia", "68"=>"t30_pengalaman", "69"=>"t30_bersedia", "70"=>"t31_pengalaman", "71"=>"t31_bersedia", "72"=>"t32_pengalaman", "73"=>"t32_bersedia", "74"=>"t33_pengalaman", "75"=>"t33_bersedia", "76"=>"t34_pengalaman", "77"=>"t34_bersedia", "78"=>"t35_kg"],
                    ],
                    
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id_kettugas = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $this->load->view('templateadmin/head');
            $this->load->view('admin/kettugas/edit', $data);
            $this->load->view('templateadmin/footer');
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id_kettugas = '".post("id")."'");
        }
    }

    public function tambah_data()
    {
        $this->load->view('templateadmin/head');
        $this->load->view('admin/kettugas/tambah');
        $this->load->view('templateadmin/footer');
    }


    public function simpan(){
        $id_biodata = post("id_biodata");
$t1_pengalaman = post("t1_pengalaman");
$t1_latihan = post("t1_latihan");
$t1_bersedia = post("t1_bersedia");
$t2_pengalaman = post("t2_pengalaman");
$t2_latihan = post("t2_latihan");
$t2_bersedia = post("t2_bersedia");
$t3_pengalaman = post("t3_pengalaman");
$t3_latihan = post("t3_latihan");
$t3_bersedia = post("t3_bersedia");
$t4_pengalaman = post("t4_pengalaman");
$t4_latihan = post("t4_latihan");
$t4_bersedia = post("t4_bersedia");
$t5_pengalaman = post("t5_pengalaman");
$t5_bersedia = post("t5_bersedia");
$t6_pengalaman = post("t6_pengalaman");
$t6_bersedia = post("t6_bersedia");
$t7_pengalaman = post("t7_pengalaman");
$t7_bersedia = post("t7_bersedia");
$t8_pengalaman = post("t8_pengalaman");
$t8_bersedia = post("t8_bersedia");
$t9_pengalaman = post("t9_pengalaman");
$t9_bersedia = post("t9_bersedia");
$t10_pengalaman = post("t10_pengalaman");
$t10_latihan = post("t10_latihan");
$t10_bersedia = post("t10_bersedia");
$t11_pengalaman = post("t11_pengalaman");
$t11_latihan = post("t11_latihan");
$t11_bersedia = post("t11_bersedia");
$t12_pengalaman = post("t12_pengalaman");
$t12_bersedia = post("t12_bersedia");
$t13_pengalaman = post("t13_pengalaman");
$t13_bersedia = post("t13_bersedia");
$t14apengalaman = post("t14apengalaman");
$t14abersedia = post("t14abersedia");
$t14bpengalaman = post("t14bpengalaman");
$t14bbersedia = post("t14bbersedia");
$t15_pengalaman = post("t15_pengalaman");
$t15_bersedia = post("t15_bersedia");
$t16_pengalaman = post("t16_pengalaman");
$t16_bersedia = post("t16_bersedia");
$t17_pengalaman = post("t17_pengalaman");
$t17_bersedia = post("t17_bersedia");
$t18_pengalaman = post("t18_pengalaman");
$t18_bersedia = post("t18_bersedia");
$t19_pengalaman = post("t19_pengalaman");
$t19_bersedia = post("t19_bersedia");
$t20_pengalaman = post("t20_pengalaman");
$t20_bersedia = post("t20_bersedia");
$t21_pengalaman = post("t21_pengalaman");
$t21_bersedia = post("t21_bersedia");
$t22_pengalaman = post("t22_pengalaman");
$t22_bersedia = post("t22_bersedia");
$t23_pengalaman = post("t23_pengalaman");
$t23_bersedia = post("t23_bersedia");
$t24_pengalaman = post("t24_pengalaman");
$t24_bersedia = post("t24_bersedia");
$t25_pengalaman = post("t25_pengalaman");
$t25_bersedia = post("t25_bersedia");
$t26_pengalaman = post("t26_pengalaman");
$t26_bersedia = post("t26_bersedia");
$t27_pengalaman = post("t27_pengalaman");
$t27_bersedia = post("t27_bersedia");
$t28_pengalaman = post("t28_pengalaman");
$t28_bersedia = post("t28_bersedia");
$t29_pengalaman = post("t29_pengalaman");
$t29_bersedia = post("t29_bersedia");
$t30_pengalaman = post("t30_pengalaman");
$t30_bersedia = post("t30_bersedia");
$t31_pengalaman = post("t31_pengalaman");
$t31_bersedia = post("t31_bersedia");
$t32_pengalaman = post("t32_pengalaman");
$t32_bersedia = post("t32_bersedia");
$t33_pengalaman = post("t33_pengalaman");
$t33_bersedia = post("t33_bersedia");
$t34_pengalaman = post("t34_pengalaman");
$t34_bersedia = post("t34_bersedia");
$t35_kg = post("t35_kg");

        

        $simpan = $this->db->query("
            INSERT INTO kettugas
            (id_biodata,t1_pengalaman,t1_latihan,t1_bersedia,t2_pengalaman,t2_latihan,t2_bersedia,t3_pengalaman,t3_latihan,t3_bersedia,t4_pengalaman,t4_latihan,t4_bersedia,t5_pengalaman,t5_bersedia,t6_pengalaman,t6_bersedia,t7_pengalaman,t7_bersedia,t8_pengalaman,t8_bersedia,t9_pengalaman,t9_bersedia,t10_pengalaman,t10_latihan,t10_bersedia,t11_pengalaman,t11_latihan,t11_bersedia,t12_pengalaman,t12_bersedia,t13_pengalaman,t13_bersedia,t14apengalaman,t14abersedia,t14bpengalaman,t14bbersedia,t15_pengalaman,t15_bersedia,t16_pengalaman,t16_bersedia,t17_pengalaman,t17_bersedia,t18_pengalaman,t18_bersedia,t19_pengalaman,t19_bersedia,t20_pengalaman,t20_bersedia,t21_pengalaman,t21_bersedia,t22_pengalaman,t22_bersedia,t23_pengalaman,t23_bersedia,t24_pengalaman,t24_bersedia,t25_pengalaman,t25_bersedia,t26_pengalaman,t26_bersedia,t27_pengalaman,t27_bersedia,t28_pengalaman,t28_bersedia,t29_pengalaman,t29_bersedia,t30_pengalaman,t30_bersedia,t31_pengalaman,t31_bersedia,t32_pengalaman,t32_bersedia,t33_pengalaman,t33_bersedia,t34_pengalaman,t34_bersedia,t35_kg) VALUES ('$id_biodata','$t1_pengalaman','$t1_latihan','$t1_bersedia','$t2_pengalaman','$t2_latihan','$t2_bersedia','$t3_pengalaman','$t3_latihan','$t3_bersedia','$t4_pengalaman','$t4_latihan','$t4_bersedia','$t5_pengalaman','$t5_bersedia','$t6_pengalaman','$t6_bersedia','$t7_pengalaman','$t7_bersedia','$t8_pengalaman','$t8_bersedia','$t9_pengalaman','$t9_bersedia','$t10_pengalaman','$t10_latihan','$t10_bersedia','$t11_pengalaman','$t11_latihan','$t11_bersedia','$t12_pengalaman','$t12_bersedia','$t13_pengalaman','$t13_bersedia','$t14apengalaman','$t14abersedia','$t14bpengalaman','$t14bbersedia','$t15_pengalaman','$t15_bersedia','$t16_pengalaman','$t16_bersedia','$t17_pengalaman','$t17_bersedia','$t18_pengalaman','$t18_bersedia','$t19_pengalaman','$t19_bersedia','$t20_pengalaman','$t20_bersedia','$t21_pengalaman','$t21_bersedia','$t22_pengalaman','$t22_bersedia','$t23_pengalaman','$t23_bersedia','$t24_pengalaman','$t24_bersedia','$t25_pengalaman','$t25_bersedia','$t26_pengalaman','$t26_bersedia','$t27_pengalaman','$t27_bersedia','$t28_pengalaman','$t28_bersedia','$t29_pengalaman','$t29_bersedia','$t30_pengalaman','$t30_bersedia','$t31_pengalaman','$t31_bersedia','$t32_pengalaman','$t32_bersedia','$t33_pengalaman','$t33_bersedia','$t34_pengalaman','$t34_bersedia','$t35_kg')
        ");
    

        if($simpan){
            redirect('admin/kettugas');
        }
    }

    public function update(){
          $key = post('id_kettugas'); $id_biodata = post("id_biodata");
$t1_pengalaman = post("t1_pengalaman");
$t1_latihan = post("t1_latihan");
$t1_bersedia = post("t1_bersedia");
$t2_pengalaman = post("t2_pengalaman");
$t2_latihan = post("t2_latihan");
$t2_bersedia = post("t2_bersedia");
$t3_pengalaman = post("t3_pengalaman");
$t3_latihan = post("t3_latihan");
$t3_bersedia = post("t3_bersedia");
$t4_pengalaman = post("t4_pengalaman");
$t4_latihan = post("t4_latihan");
$t4_bersedia = post("t4_bersedia");
$t5_pengalaman = post("t5_pengalaman");
$t5_bersedia = post("t5_bersedia");
$t6_pengalaman = post("t6_pengalaman");
$t6_bersedia = post("t6_bersedia");
$t7_pengalaman = post("t7_pengalaman");
$t7_bersedia = post("t7_bersedia");
$t8_pengalaman = post("t8_pengalaman");
$t8_bersedia = post("t8_bersedia");
$t9_pengalaman = post("t9_pengalaman");
$t9_bersedia = post("t9_bersedia");
$t10_pengalaman = post("t10_pengalaman");
$t10_latihan = post("t10_latihan");
$t10_bersedia = post("t10_bersedia");
$t11_pengalaman = post("t11_pengalaman");
$t11_latihan = post("t11_latihan");
$t11_bersedia = post("t11_bersedia");
$t12_pengalaman = post("t12_pengalaman");
$t12_bersedia = post("t12_bersedia");
$t13_pengalaman = post("t13_pengalaman");
$t13_bersedia = post("t13_bersedia");
$t14apengalaman = post("t14apengalaman");
$t14abersedia = post("t14abersedia");
$t14bpengalaman = post("t14bpengalaman");
$t14bbersedia = post("t14bbersedia");
$t15_pengalaman = post("t15_pengalaman");
$t15_bersedia = post("t15_bersedia");
$t16_pengalaman = post("t16_pengalaman");
$t16_bersedia = post("t16_bersedia");
$t17_pengalaman = post("t17_pengalaman");
$t17_bersedia = post("t17_bersedia");
$t18_pengalaman = post("t18_pengalaman");
$t18_bersedia = post("t18_bersedia");
$t19_pengalaman = post("t19_pengalaman");
$t19_bersedia = post("t19_bersedia");
$t20_pengalaman = post("t20_pengalaman");
$t20_bersedia = post("t20_bersedia");
$t21_pengalaman = post("t21_pengalaman");
$t21_bersedia = post("t21_bersedia");
$t22_pengalaman = post("t22_pengalaman");
$t22_bersedia = post("t22_bersedia");
$t23_pengalaman = post("t23_pengalaman");
$t23_bersedia = post("t23_bersedia");
$t24_pengalaman = post("t24_pengalaman");
$t24_bersedia = post("t24_bersedia");
$t25_pengalaman = post("t25_pengalaman");
$t25_bersedia = post("t25_bersedia");
$t26_pengalaman = post("t26_pengalaman");
$t26_bersedia = post("t26_bersedia");
$t27_pengalaman = post("t27_pengalaman");
$t27_bersedia = post("t27_bersedia");
$t28_pengalaman = post("t28_pengalaman");
$t28_bersedia = post("t28_bersedia");
$t29_pengalaman = post("t29_pengalaman");
$t29_bersedia = post("t29_bersedia");
$t30_pengalaman = post("t30_pengalaman");
$t30_bersedia = post("t30_bersedia");
$t31_pengalaman = post("t31_pengalaman");
$t31_bersedia = post("t31_bersedia");
$t32_pengalaman = post("t32_pengalaman");
$t32_bersedia = post("t32_bersedia");
$t33_pengalaman = post("t33_pengalaman");
$t33_bersedia = post("t33_bersedia");
$t34_pengalaman = post("t34_pengalaman");
$t34_bersedia = post("t34_bersedia");
$t35_kg = post("t35_kg");

        $simpan = $this->db->query("
            UPDATE kettugas SET  id_biodata = '$id_biodata', t1_pengalaman = '$t1_pengalaman', t1_latihan = '$t1_latihan', t1_bersedia = '$t1_bersedia', t2_pengalaman = '$t2_pengalaman', t2_latihan = '$t2_latihan', t2_bersedia = '$t2_bersedia', t3_pengalaman = '$t3_pengalaman', t3_latihan = '$t3_latihan', t3_bersedia = '$t3_bersedia', t4_pengalaman = '$t4_pengalaman', t4_latihan = '$t4_latihan', t4_bersedia = '$t4_bersedia', t5_pengalaman = '$t5_pengalaman', t5_bersedia = '$t5_bersedia', t6_pengalaman = '$t6_pengalaman', t6_bersedia = '$t6_bersedia', t7_pengalaman = '$t7_pengalaman', t7_bersedia = '$t7_bersedia', t8_pengalaman = '$t8_pengalaman', t8_bersedia = '$t8_bersedia', t9_pengalaman = '$t9_pengalaman', t9_bersedia = '$t9_bersedia', t10_pengalaman = '$t10_pengalaman', t10_latihan = '$t10_latihan', t10_bersedia = '$t10_bersedia', t11_pengalaman = '$t11_pengalaman', t11_latihan = '$t11_latihan', t11_bersedia = '$t11_bersedia', t12_pengalaman = '$t12_pengalaman', t12_bersedia = '$t12_bersedia', t13_pengalaman = '$t13_pengalaman', t13_bersedia = '$t13_bersedia', t14apengalaman = '$t14apengalaman', t14abersedia = '$t14abersedia', t14bpengalaman = '$t14bpengalaman', t14bbersedia = '$t14bbersedia', t15_pengalaman = '$t15_pengalaman', t15_bersedia = '$t15_bersedia', t16_pengalaman = '$t16_pengalaman', t16_bersedia = '$t16_bersedia', t17_pengalaman = '$t17_pengalaman', t17_bersedia = '$t17_bersedia', t18_pengalaman = '$t18_pengalaman', t18_bersedia = '$t18_bersedia', t19_pengalaman = '$t19_pengalaman', t19_bersedia = '$t19_bersedia', t20_pengalaman = '$t20_pengalaman', t20_bersedia = '$t20_bersedia', t21_pengalaman = '$t21_pengalaman', t21_bersedia = '$t21_bersedia', t22_pengalaman = '$t22_pengalaman', t22_bersedia = '$t22_bersedia', t23_pengalaman = '$t23_pengalaman', t23_bersedia = '$t23_bersedia', t24_pengalaman = '$t24_pengalaman', t24_bersedia = '$t24_bersedia', t25_pengalaman = '$t25_pengalaman', t25_bersedia = '$t25_bersedia', t26_pengalaman = '$t26_pengalaman', t26_bersedia = '$t26_bersedia', t27_pengalaman = '$t27_pengalaman', t27_bersedia = '$t27_bersedia', t28_pengalaman = '$t28_pengalaman', t28_bersedia = '$t28_bersedia', t29_pengalaman = '$t29_pengalaman', t29_bersedia = '$t29_bersedia', t30_pengalaman = '$t30_pengalaman', t30_bersedia = '$t30_bersedia', t31_pengalaman = '$t31_pengalaman', t31_bersedia = '$t31_bersedia', t32_pengalaman = '$t32_pengalaman', t32_bersedia = '$t32_bersedia', t33_pengalaman = '$t33_pengalaman', t33_bersedia = '$t33_bersedia', t34_pengalaman = '$t34_pengalaman', t34_bersedia = '$t34_bersedia', t35_kg = '$t35_kg' WHERE id_kettugas = '$key'
            ");
    

        if($simpan){
            redirect('admin/kettugas');
        }
    }
    
    public function exls(array $data = [], array $headers = [], $fileName = 'data-kettugas.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ["no","id biodata","t1 pengalaman","t1 latihan","t1 bersedia","t2 pengalaman","t2 latihan","t2 bersedia","t3 pengalaman","t3 latihan","t3 bersedia","t4 pengalaman","t4 latihan","t4 bersedia","t5 pengalaman","t5 bersedia","t6 pengalaman","t6 bersedia","t7 pengalaman","t7 bersedia","t8 pengalaman","t8 bersedia","t9 pengalaman","t9 bersedia","t10 pengalaman","t10 latihan","t10 bersedia","t11 pengalaman","t11 latihan","t11 bersedia","t12 pengalaman","t12 bersedia","t13 pengalaman","t13 bersedia","t14apengalaman","t14abersedia","t14bpengalaman","t14bbersedia","t15 pengalaman","t15 bersedia","t16 pengalaman","t16 bersedia","t17 pengalaman","t17 bersedia","t18 pengalaman","t18 bersedia","t19 pengalaman","t19 bersedia","t20 pengalaman","t20 bersedia","t21 pengalaman","t21 bersedia","t22 pengalaman","t22 bersedia","t23 pengalaman","t23 bersedia","t24 pengalaman","t24 bersedia","t25 pengalaman","t25 bersedia","t26 pengalaman","t26 bersedia","t27 pengalaman","t27 bersedia","t28 pengalaman","t28 bersedia","t29 pengalaman","t29 bersedia","t30 pengalaman","t30 bersedia","t31 pengalaman","t31 bersedia","t32 pengalaman","t32 bersedia","t33 pengalaman","t33 bersedia","t34 pengalaman","t34 bersedia","t35 kg", "action"];

        $calldata = ["id_biodata","t1_pengalaman","t1_latihan","t1_bersedia","t2_pengalaman","t2_latihan","t2_bersedia","t3_pengalaman","t3_latihan","t3_bersedia","t4_pengalaman","t4_latihan","t4_bersedia","t5_pengalaman","t5_bersedia","t6_pengalaman","t6_bersedia","t7_pengalaman","t7_bersedia","t8_pengalaman","t8_bersedia","t9_pengalaman","t9_bersedia","t10_pengalaman","t10_latihan","t10_bersedia","t11_pengalaman","t11_latihan","t11_bersedia","t12_pengalaman","t12_bersedia","t13_pengalaman","t13_bersedia","t14apengalaman","t14abersedia","t14bpengalaman","t14bbersedia","t15_pengalaman","t15_bersedia","t16_pengalaman","t16_bersedia","t17_pengalaman","t17_bersedia","t18_pengalaman","t18_bersedia","t19_pengalaman","t19_bersedia","t20_pengalaman","t20_bersedia","t21_pengalaman","t21_bersedia","t22_pengalaman","t22_bersedia","t23_pengalaman","t23_bersedia","t24_pengalaman","t24_bersedia","t25_pengalaman","t25_bersedia","t26_pengalaman","t26_bersedia","t27_pengalaman","t27_bersedia","t28_pengalaman","t28_bersedia","t29_pengalaman","t29_bersedia","t30_pengalaman","t30_bersedia","t31_pengalaman","t31_bersedia","t32_pengalaman","t32_bersedia","t33_pengalaman","t33_bersedia","t34_pengalaman","t34_bersedia","t35_kg"];

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
