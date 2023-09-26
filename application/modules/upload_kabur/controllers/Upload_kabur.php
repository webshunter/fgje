<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_kabur extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_kabur');			
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
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_kabur->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_kabur'] = $this->M_upload_kabur->tampil_data_kabur($detailidnya);
				$data['hitungan'] = $this->M_upload_kabur->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_kabur->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_kabur";
				$data['namafileview'] = "kaburadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_kabur->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_kabur'] = $this->M_upload_kabur->tampil_data_kabur($detailidnya);
				$data['namamodule'] = "upload_kabur";
				$data['namafileview'] = "kaburadmin";
				echo Modules::run('template/kabur_template', $data);
			}
		}	 
	}

	function simpan_data_kabur(){
		
		$this->M_upload_kabur->simpan_data_kabur();

		redirect('upload_kabur');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_kabur";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_kabur->simpan_foto_kabur($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_kabur->hapus_foto_kabur();
	}


	function update_data_kabur() {
			$this->M_upload_kabur->update_data_kabur();
			redirect('upload_kabur');
	}

	function hapus_data_kabur() {
		$this->M_upload_kabur->hapus_data_kabur();
		redirect('upload_kabur');
	}
}