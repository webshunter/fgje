<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Detailpap extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_detailpap');	
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

				$data['tampil_data_sektor'] = $this->M_detailpap->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailpap->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailpap->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailpap->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailpap->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailpap->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailpap->tampil_data_provinsi();

				$data['detailpapid'] = $this->session->userdata("detailuser");
				$data['tampil_data_pap'] = $this->M_detailpap->tampil_data_pap($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailpap->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungpap'] = $this->M_detailpap->hitung_data_pap($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detailpap";
				$data['namafileview'] = "detailpap";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "detailpap";
				$data['namafileview'] = "detailpapagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

		function vtambahpap() {
				$data['tampil_data_sektor'] = $this->M_detailpap->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailpap->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailpap->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailpap->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailpap->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailpap->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailpap->tampil_data_provinsi();

				$data['detailpapid'] = $this->session->userdata("detailuser");
								$data['idbiodatanya'] = $this->session->userdata("detailuser");

				$data['tampil_data_pap'] = $this->M_detailpap->tampil_data_pap($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailpap->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungpap'] = $this->M_detailpap->hitung_data_pap($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detailpap";
				$data['namafileview'] = "tambahpap";
				echo Modules::run('template/admin_template', $data);

		}

				function vubahpap() {
				$data['tampil_data_sektor'] = $this->M_detailpap->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_detailpap->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_detailpap->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_detailpap->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_detailpap->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_detailpap->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_detailpap->tampil_data_provinsi();

				$data['detailpapid'] = $this->session->userdata("detailuser");
								$data['idbiodatanya'] = $this->session->userdata("detailuser");

				$data['tampil_data_pap'] = $this->M_detailpap->tampil_data_pap($this->session->userdata("detailuser"));
				$data['tampil_data_personal'] = $this->M_detailpap->tampil_data_personal($this->session->userdata("detailuser"));

				$data['hitungpap'] = $this->M_detailpap->hitung_data_pap($this->session->userdata("detailuser"));

				
			//user sudah login
				$data['namamodule'] = "detailpap";
				$data['namafileview'] = "ubahpap";
				echo Modules::run('template/admin_template', $data);

		}



	function tambahpap() {

$this->M_detailpap->tambahpap();

		redirect('detailpap');
		}
			function ubahpap() {

$this->M_detailpap->ubahpap();

		redirect('detailpap');
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