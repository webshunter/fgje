<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Tambahvisapermit extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_tambahvisapermit');	
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

				$data['tampil_data_sektor'] = $this->M_tambahvisapermit->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahvisapermit->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahvisapermit->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahvisapermit->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahvisapermit->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahvisapermit->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahvisapermit->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahvisapermit->tampil_data_jobs();


				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_personal'] = $this->M_tambahvisapermit->tampil_data_personal($this->session->userdata("detailuser"));



				
			//user sudah login
				$data['namamodule'] = "tambahvisapermit";
				$data['namafileview'] = "tambahvisapermitadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "tambahvisapermit";
				$data['namafileview'] = "tambahvisapermitagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	function v_ubahvisapermit(){

				$data['tampil_data_sektor'] = $this->M_tambahvisapermit->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahvisapermit->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahvisapermit->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahvisapermit->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahvisapermit->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahvisapermit->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahvisapermit->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahvisapermit->tampil_data_jobs();


				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_personal'] = $this->M_tambahvisapermit->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tampil_data_visapermit'] = $this->M_tambahvisapermit->tampil_data_visapermit($this->session->userdata("detailuser"));



				
			//user sudah login
				$data['namamodule'] = "tambahvisapermit";
				$data['namafileview'] = "ubahvisapermitadmin";
				echo Modules::run('template/admin_template', $data);


	}
	function ubahvisapermitdata() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahvisapermit->ubahvisapermit();

		redirect('detailvisapermit');
		}
	function tambahvisapermitdata() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahvisapermit->tambahvisapermit();

		redirect('detailvisapermit');
		}

function setidbiodata() {

if (isset($_POST['setid'])) {
   $dataid = $this->input->post("idbiodata");
   $jenis = $this->input->post("jeniskelamin");

		 $this->session->set_userdata("idbiodata",$dataid);
		 $this->session->set_userdata("jeniskelamin",$jenis);

		redirect('tambahvisapermit');
		}
if (isset($_POST['resetid'])) {
    $this->session->set_userdata("idbiodata","");
        $this->session->set_userdata("jeniskelamin","");

		redirect('tambahvisapermit');
} 
		}

}