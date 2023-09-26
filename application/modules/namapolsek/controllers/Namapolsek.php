<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

class namapolsek extends MY_Controller{
	public function __construct(){
            parent::__construct();
			$this->load->model('M_session');			
			$this->load->model('M_namapolsek');			
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
			//user sudah login
				$data['tampil_data_namapolsek'] = $this->M_namapolsek->tampil_data_namapolsek();
				$data['namamodule'] = "namapolsek";
				$data['namafileview'] = "namapolsek";
				echo Modules::run('template/admin_template', $data);
			}
			else if ($id_user && $status==2){
				
				$data['namamodule'] = "namapolsek";
				$data['namafileview'] = "namapolsek";
				echo Modules::run('template/agen_template', $data); 
			}
		}	 
	}

	function simpan_data_namapolsek(){
		// $player = array();
		// $player=$this->input->post('daerah');
		// echo "".sizeof($player);
		$nama_polda	= $this->input->post('nama_polda');
		$alamat	= $this->input->post('alamat');
		
		$this->M_namapolsek->simpan_data_namapolsek($nama_polda,$alamat);

		redirect('namapolsek');
	}

	function update_data_namapolsek() {
			$this->M_namapolsek->update_data_namapolsek();
			redirect('namapolsek');
	}

	function hapus_data_namapolsek() {
		$this->M_namapolsek->hapus_data_namapolsek();
		redirect('namapolsek');
	}
}