<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Tambahpaspor extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_tambahpaspor');	
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

				$data['tampil_data_sektor'] = $this->M_tambahpaspor->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahpaspor->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahpaspor->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahpaspor->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahpaspor->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahpaspor->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahpaspor->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahpaspor->tampil_data_jobs();


				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_personal'] = $this->M_tambahpaspor->tampil_data_personal($this->session->userdata("detailuser"));



				
			//user sudah login
				$data['namamodule'] = "tambahpaspor";
				$data['namafileview'] = "tambahpasporadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "tambahpaspor";
				$data['namafileview'] = "tambahpasporagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
	function V_ubahpaspor(){

				$data['tampil_data_sektor'] = $this->M_tambahpaspor->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahpaspor->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahpaspor->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahpaspor->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahpaspor->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahpaspor->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahpaspor->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahpaspor->tampil_data_jobs();


				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_personal'] = $this->M_tambahpaspor->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tampil_data_paspor'] = $this->M_tambahpaspor->tampil_data_paspor($this->session->userdata("detailuser"));



				
			//user sudah login
				$data['namamodule'] = "tambahpaspor";
				$data['namafileview'] = "ubahpasporadmin";
				echo Modules::run('template/admin_template', $data);


	}

function ubahpaspordata() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahpaspor->ubahpaspor();

		redirect('detailpaspor');
		}

function ubahpaspordatalama() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahpaspor->ubahpasporlama();

		redirect('detailpaspor');
		}
		
		function hapuspaspordata() {
		$this->M_tambahpaspor->hapuspaspordata();
		redirect('detailpaspor');
	}
function hapuspaspordatalama() {
		$this->M_tambahpaspor->hapuspaspordatalama();
		redirect('detailpaspor');
	}
	function tambahpaspordata() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahpaspor->tambahpaspor();

		redirect('detailpaspor');
		}

			function tambahpaspordatalama() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahpaspor->tambahpasporlama();

		redirect('detailpaspor');
		}

function setidbiodata() {

if (isset($_POST['setid'])) {
   $dataid = $this->input->post("idbiodata");
   $jenis = $this->input->post("jeniskelamin");

		 $this->session->set_userdata("idbiodata",$dataid);
		 $this->session->set_userdata("jeniskelamin",$jenis);

		redirect('tambahpaspor');
		}
if (isset($_POST['resetid'])) {
    $this->session->set_userdata("idbiodata","");
        $this->session->set_userdata("jeniskelamin","");

		redirect('tambahpaspor');
} 
		}

}