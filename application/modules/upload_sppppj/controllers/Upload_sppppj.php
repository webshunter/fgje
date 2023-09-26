<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class upload_sppppj extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_upload_sppppj');			
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
				$data['tampil_data_personal'] = $this->M_upload_sppppj->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_sppppj'] = $this->M_upload_sppppj->tampil_data_sppppj($detailidnya);
				$data['hitungan'] = $this->M_upload_sppppj->hitungan($detailidnya);
				$data['ambildatafoto'] = $this->M_upload_sppppj->ambildatafoto($detailidnya);
				$data['namamodule'] = "upload_sppppj";
				$data['namafileview'] = "sppppjadmin";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				$detailidnya=$this->session->userdata("detailuser");
				$data['tampil_data_personal'] = $this->M_upload_sppppj->tampil_data_personal($this->session->userdata("detailuser"));
				$data['detailpersonalid'] = $this->session->userdata("detailuser");
				$data['tampil_data_sppppj'] = $this->M_upload_sppppj->tampil_data_sppppj($detailidnya);
				$data['namamodule'] = "upload_sppppj";
				$data['namafileview'] = "sppppjadmin";
				echo Modules::run('template/sppppj_template', $data);
			}
		}	 
	}

	function simpan_data_sppppj(){
		
		$this->M_upload_sppppj->simpan_data_sppppj();

		redirect('upload_sppppj');
	}

		function uploadfile(){



		$data['namamodule'] = "upload_sppppj";
				$data['namafileview'] = "upload";
				echo Modules::run('template/admin_template', $data);
	}


	//Untuk proses upload foto
	function proses_upload(){
		$detailidnya=$this->session->userdata("detailuser");
	$this->M_upload_sppppj->simpan_foto_sppppj($detailidnya);
	}


	//Untuk menghapus foto
	function remove_foto(){
$this->M_upload_sppppj->hapus_foto_sppppj();
	}


	function update_data_sppppj() {
			$this->M_upload_sppppj->update_data_sppppj();
			redirect('upload_sppppj');
	}

	function hapus_data_sppppj() {
		$this->M_upload_sppppj->hapus_data_sppppj();
		redirect('upload_sppppj');
	}
}