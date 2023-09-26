<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Tambahsuhan extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_tambahsuhan');	
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

				$data['tampil_data_sektor'] = $this->M_tambahsuhan->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahsuhan->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahsuhan->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahsuhan->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahsuhan->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahsuhan->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahsuhan->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahsuhan->tampil_data_jobs();


				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_personal'] = $this->M_tambahsuhan->tampil_data_personal($this->session->userdata("detailuser"));



				
			//user sudah login
				$data['namamodule'] = "tambahsuhan";
				$data['namafileview'] = "tambahsuhanadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "tambahsuhan";
				$data['namafileview'] = "tambahsuhanagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function v_ubahsuhan(){

				$data['tampil_data_sektor'] = $this->M_tambahsuhan->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahsuhan->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahsuhan->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahsuhan->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahsuhan->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahsuhan->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahsuhan->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahsuhan->tampil_data_jobs();


				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_personal'] = $this->M_tambahsuhan->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tampil_data_suhan'] = $this->M_tambahsuhan->tampil_data_suhan($this->session->userdata("detailuser"));



				
			//user sudah login
				$data['namamodule'] = "tambahsuhan";
				$data['namafileview'] = "ubahsuhanadmin";
				echo Modules::run('template/admin_template', $data);
	}

	function ubahsuhandata() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahsuhan->ubahsuhan();

		redirect('detailsuhan');
		}

	function tambahsuhandata() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahsuhan->tambahsuhan();

		redirect('detailsuhan');
		}

function setidbiodata() {

if (isset($_POST['setid'])) {
   $dataid = $this->input->post("idbiodata");
   $jenis = $this->input->post("jeniskelamin");

		 $this->session->set_userdata("idbiodata",$dataid);
		 $this->session->set_userdata("jeniskelamin",$jenis);

		redirect('tambahsuhan');
		}
if (isset($_POST['resetid'])) {
    $this->session->set_userdata("idbiodata","");
        $this->session->set_userdata("jeniskelamin","");

		redirect('tambahsuhan');
} 
		}

}