<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Tambahmedical extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_tambahmedical');	
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

				$data['tampil_data_sektor'] = $this->M_tambahmedical->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahmedical->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahmedical->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahmedical->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahmedical->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahmedical->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahmedical->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahmedical->tampil_data_jobs();
				$data['tampil_data_pilihanmedical'] = $this->M_tambahmedical->tampil_data_pilihanmedical();


				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_personal'] = $this->M_tambahmedical->tampil_data_personal($this->session->userdata("detailuser"));



				
			//user sudah login
				$data['namamodule'] = "tambahmedical";
				$data['namafileview'] = "tambahmedicaladmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "tambahmedical";
				$data['namafileview'] = "tambahmedicalagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}
function v_ubahmedical(){

				$data['tampil_data_sektor'] = $this->M_tambahmedical->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahmedical->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahmedical->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahmedical->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahmedical->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahmedical->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahmedical->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahmedical->tampil_data_jobs();
				$data['tampil_data_pilihanmedical'] = $this->M_tambahmedical->tampil_data_pilihanmedical();

				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_medical'] = $this->M_tambahmedical->tampil_data_medical($this->session->userdata("detailuser"));

				$data['tampil_data_personal'] = $this->M_tambahmedical->tampil_data_personal($this->session->userdata("detailuser"));



				
			//user sudah login
				$data['namamodule'] = "tambahmedical";
				$data['namafileview'] = "ubahmedicaladmin";
				echo Modules::run('template/admin_template', $data);


}

	function ubahmedicaldata() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahmedical->ubahmedical();

		redirect('detailmedical');
		}


	function tambahmedicaldata() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahmedical->tambahmedical();

		redirect('detailmedical');
		}

function setidbiodata() {

if (isset($_POST['setid'])) {
   $dataid = $this->input->post("idbiodata");
   $jenis = $this->input->post("jeniskelamin");

		 $this->session->set_userdata("idbiodata",$dataid);
		 $this->session->set_userdata("jeniskelamin",$jenis);

		redirect('tambahmedical');
		}
if (isset($_POST['resetid'])) {
    $this->session->set_userdata("idbiodata","");
        $this->session->set_userdata("jeniskelamin","");

		redirect('tambahmedical');
} 
	}


	function hapusmedical($id){
		$this->M_tambahmedical->hapus_medical($id);
		redirect("detailmedical");
	}

}