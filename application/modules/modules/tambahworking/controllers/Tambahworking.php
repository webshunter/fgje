<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class Tambahworking extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_tambahworking');	
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

				$data['tampil_data_sektor'] = $this->M_tambahworking->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahworking->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahworking->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahworking->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahworking->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahworking->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahworking->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahworking->tampil_data_jobs();
				$data['pilihan_jenis_usaha'] = $this->M_tambahworking->tampil_data_kategoripekerjaan();
				$data['pilihan_penjelasan'] = $this->M_tambahworking->tampil_data_penjelasan();
				$data['pilihan_posisi'] = $this->M_tambahworking->tampil_data_posisi();
				$data['pilihan_alasan'] = $this->M_tambahworking->tampil_data_alasan();
 				$data['option_posisi'] = $this->M_tambahworking->getposisiList();


				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_personal'] = $this->M_tambahworking->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tampil_data_working'] = $this->M_tambahworking->tampil_data_working($this->session->userdata("detailuser"));
				//$data['tampil_dataterbang'] = $this->M_tambahworking->tampil_dataterbang();



				
			//user sudah login
				$data['namamodule'] = "tambahworking";
				$data['namafileview'] = "tambahworkingadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "tambahworking";
				$data['namafileview'] = "tambahworkingagen";
				echo Modules::run('template/agen_template', $data); 
			}
		
		}
		 
	}

	 function select_penjelasan(){
        $data['option_penjelasan'] = $this->M_tambahworking->getPenjelasanList();
        $this->load->view('tambahworking/detailpenjelasan',$data);

    }


	function v_ubahworking($id_nim){

				$data['tampil_data_sektor'] = $this->M_tambahworking->tampil_data_sektor();
				$data['tampil_data_negara'] = $this->M_tambahworking->tampil_data_negara();
				$data['tampil_data_calling'] = $this->M_tambahworking->tampil_data_calling();
				$data['tampil_data_skillnya'] = $this->M_tambahworking->tampil_data_skillnya();
				$data['tampil_data_agama'] = $this->M_tambahworking->tampil_data_agama();
				$data['tampil_data_pendidikan'] = $this->M_tambahworking->tampil_data_pendidikan();
				$data['tampil_data_provinsi'] = $this->M_tambahworking->tampil_data_provinsi();
				$data['tampil_data_jobs'] = $this->M_tambahworking->tampil_data_jobs();
				$data['pilihan_jenis_usaha'] = $this->M_tambahworking->tampil_data_kategoripekerjaan();
				$data['pilihan_penjelasan'] = $this->M_tambahworking->tampil_data_penjelasan();
				$data['pilihan_posisi'] = $this->M_tambahworking->tampil_data_posisi();
 				$data['option_posisi'] = $this->M_tambahworking->getposisiList();

				$data['pilihan_alasan'] = $this->M_tambahworking->tampil_data_alasan();
				//$data['tampil_dataterbang'] = $this->M_tambahworking->tampil_dataterbang();


				$data['negaranya'] = $id_nim;
				$data['idbiodatanya'] = $this->session->userdata("detailuser");
				$data['jenisnya'] = $this->session->userdata("jeniskelamin");
				$data['tampil_data_personal'] = $this->M_tambahworking->tampil_data_personal($this->session->userdata("detailuser"));
				$data['tampil_data_working'] = $this->M_tambahworking->tampil_data_working($this->session->userdata("detailuser"));

				$data['tampil_data_workingdetail'] = $this->M_tambahworking->tampil_data_workingdetail($this->session->userdata("detailuser"),$id_nim);


				
			//user sudah login
				$data['namamodule'] = "tambahworking";
				$data['namafileview'] = "ubahworkingadmin";
				echo Modules::run('template/admin_template', $data);


	}

function ubahworkingdata() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahworking->ubahworking();

		redirect('detailworking');
		}


	function tambahworkingdata() {

// echo "".$this->session->userdata("detailuser");
$this->M_tambahworking->tambahworking();

		redirect('detailworking');
		}

function setidbiodata() {

if (isset($_POST['setid'])) {
   $dataid = $this->input->post("idbiodata");
   $jenis = $this->input->post("jeniskelamin");

		 $this->session->set_userdata("idbiodata",$dataid);
		 $this->session->set_userdata("jeniskelamin",$jenis);

		redirect('tambahworking');
		}
if (isset($_POST['resetid'])) {
    $this->session->set_userdata("idbiodata","");
        $this->session->set_userdata("jeniskelamin","");

		redirect('tambahworking');
} 
}


function hapusworking($id){
	$this->M_tambahworking->hapus_working($id);
	redirect("detailworking");
}

}