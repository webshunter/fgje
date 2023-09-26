<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailworking extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailworking');	
			$this->load->library('form_validation');
		
	}
	
	function index(){
	$session = $this->M_session->get_session();
		if (!$session['session_userid'] && !$session['session_status']){
			//user belum login
			$data['namamodule'] = "login";
			$data['namafileview'] = "login";
			echo Modules::run('template/login_template', $data);
		}
		else{
		$id_user = $session['session_userid'];
		$status = $session['session_status'];
			//user sudah login
			if ($id_user && $status==1){

				$data['tampil_data_sektor'] = $this->M_detailworking->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailworking->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailworking->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailworking->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailworking->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailworking->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailworking->tampil_data_provinsi();

				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_working'] = $this->M_detailworking->tampil_data_working($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailworking->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungworking'] = $this->M_detailworking->hitung_data_working($this->session->userdata("detailuser"));
 				$data['option_posisi'] = $this->M_detailworking->getposisiList();
$data['pilihan_posisi'] = $this->M_detailworking->tampil_data_posisi();
				$data['pilihan_alasan'] = $this->M_detailworking->tampil_data_alasan();
				
			//user sudah login
				$data['namamodule'] = "detailworking";
				$data['namafileview'] = "detailworking";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detailworking";
				$data['namafileview'] = "detailworkingagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}



function setidbiodata() {

if (isset($_POST['setid'])) {
   $dataid = $this->input->post("idbiodata");
   $jenis = $this->input->post("jeniskelamin");

		 $this->session->set_userdata("idbiodata",$dataid);
		 $this->session->set_userdata("jeniskelamin",$jenis);

		redirect('tambahbio');
		}
if (isset($_POST['resetid'])) {
    $this->session->set_userdata("idbiodata","");
        $this->session->set_userdata("jeniskelamin","");

		redirect('tambahbio');
} 
		}

}