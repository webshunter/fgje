<?php
class m_new_majikans extends CI_Model{
    function __construct(){
        parent::__construct();
    }


	function tampil_data_majikan() {
		$sql = "SELECT * FROM datamajikan";
        $query = $this->db->query($sql);
        return $query->result();
	} 
	
	function tampil_data_majikandetail($id) {
		$sql = "SELECT datamajikan.*,dataagen.nama as namaagen,datagroup.nama as namagrup FROM datamajikan LEFT JOIN dataagen on datamajikan.kode_agen=dataagen.id_agen LEFT JOIN datagroup on datagroup.id_group=dataagen.kode_group where datamajikan.id_majikan='$id'";
        $query = $this->db->query($sql);
        return $query->result();
	} 

	function tampil_data_majikan2() {
		$sql = "SELECT datamajikan.*,dataagen.nama as namaagen FROM datamajikan LEFT JOIN dataagen on datamajikan.kode_agen=dataagen.id_agen";
        $query = $this->db->query($sql);
        return $query->result();
	} 




	function tampil_nama_agree1($id_majikan){
$kode_desa="";
        $result = DBS::conn("SELECT * FROM datamajikan WHERE id_majikan='$id_majikan'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	} 

	function tampil_data_suhan() {
		$sql = "SELECT *,dataagen.nama as namaagen,datamajikan.nama as namamajikannya,datagroup.nama as namagroupnya
FROM datasuhan 
LEFT JOIN datamajikan 
ON datasuhan.id_majikan=datamajikan.id_majikan 
LEFT JOIN dataagen 
ON dataagen.id_agen=datasuhan.id_agen
LEFT JOIN datagroup
ON datagroup.id_group=datasuhan.id_group;";
		$tampil = $this->db->query($sql);
		return $tampil->result();
	}
		function tampil_data_suhandata($where, $limit) {
		$sql = "SELECT *,dataagen.nama as namaagen,datamajikan.nama as namamajikannya,datagroup.nama as namagroupnya
FROM datasuhan 
LEFT JOIN datamajikan 
ON datasuhan.id_majikan=datamajikan.id_majikan 
LEFT JOIN dataagen 
ON dataagen.id_agen=datasuhan.id_agen
LEFT JOIN datagroup
ON datagroup.id_group=datasuhan.id_group $where $limit";
		$tampil = $this->db->query($sql);
		return $tampil->result();
	}

			function tampil_data_suhandetail($id) {
		$sql = "SELECT *,dataagen.nama as namaagen,datamajikan.nama as namamajikannya,datagroup.nama as namagroupnya
FROM datasuhan 
LEFT JOIN datamajikan 
ON datasuhan.id_majikan=datamajikan.id_majikan 
LEFT JOIN dataagen 
ON dataagen.id_agen=datasuhan.id_agen
LEFT JOIN datagroup
ON datagroup.id_group=datasuhan.id_group
WHERE datasuhan.id_suhan='$id'
;";
        $query = $this->db->query($sql);
        return $query->result();
	}

				function tampil_datahistory($id) {
		$sql = "SELECT * from suhanhistory where id_suhan='$id'";
        $query = $this->db->query($sql);
        return $query->result();
	} 

				function tampil_datahistoryvisapermit($id) {
		$sql = "SELECT * from visapermithistory where id_visapermit='$id'";
        $query = $this->db->query($sql);
        return $query->result();
	} 

function ambidatasuhan($id){
$kode_desa="";
        $result = DBS::conn("SELECT * FROM datasuhan where id_suhan='$id'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['no_suhan'];
			}
		return $kode_desa;
	}

	function ambidatavisapermit($id){
$kode_desa="";
        $result = DBS::conn("SELECT * FROM datavisapermit where id_visapermit='$id'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['no_visapermit'];
			}
		return $kode_desa;
	}

	function ambidatasuhanmajikan($id){
$kode_desa="";
        $result = DBS::conn("SELECT * FROM datasuhan LEFT JOIN datamajikan ON datamajikan.id_majikan = datasuhan.id_majikan where datasuhan.id_suhan='$id'");
			while($row = mysqli_fetch_array($result)){
                $kode_desa =$row['nama'];
			}
		return $kode_desa;
	}

		function tampil_datatki($id) {
		$sql = "SELECT *,personal.id_biodata as idnyabio from majikan 
		LEFT JOIN personal ON personal.id_biodata = majikan.id_biodata 
        LEFT JOIN visa ON personal.id_biodata = visa.id_biodata
		where majikan.kode_suhan='$id'";
        $query = $this->db->query($sql);
        return $query->result();
	} 

 		function tampil_datatkivisapermit($id) {
		$sql = "SELECT *,personal.id_biodata as idnyabio from majikan 
		LEFT JOIN personal ON personal.id_biodata = majikan.id_biodata 
        LEFT JOIN visa ON personal.id_biodata = visa.id_biodata
		where majikan.kode_visapermit='$id'";
        $query = $this->db->query($sql);
        return $query->result();
	} 
 



	function tampil_data_visapermit() {
		$sql = "SELECT *,dataagen.nama as namaagen,datamajikan.nama as namamajikannya,datagroup.nama as namagroupnya
FROM datavisapermit 
LEFT JOIN datamajikan 
ON datavisapermit.id_majikan=datamajikan.id_majikan 
LEFT JOIN dataagen 
ON dataagen.id_agen=datavisapermit.id_agen
LEFT JOIN datagroup
ON datagroup.id_group=datavisapermit.id_group
LEFT JOIN datasuhan
ON datasuhan.id_suhan=datavisapermit.id_suhan;";
		$tampil = $this->db->query($sql);
		return $tampil->result();
	}

		function tampil_data_visapermitdata($idsuhan) {
		$sql = "SELECT *,dataagen.nama as namaagen,datamajikan.nama as namamajikannya,datagroup.nama as namagroupnya
FROM datavisapermit 
LEFT JOIN datamajikan 
ON datavisapermit.id_majikan=datamajikan.id_majikan 
LEFT JOIN dataagen 
ON dataagen.id_agen=datavisapermit.id_agen
LEFT JOIN datagroup
ON datagroup.id_group=datavisapermit.id_group
LEFT JOIN datasuhan
ON datasuhan.id_suhan=datavisapermit.id_suhan WHERE datavisapermit.id_suhan='$idsuhan';";
		$tampil = $this->db->query($sql);
		return $tampil->result();
	}

		function tampil_data_visapermitdetail($id) {
		$sql = "SELECT *,dataagen.nama as namaagen,datamajikan.nama as namamajikannya,datagroup.nama as namagroupnya
FROM datavisapermit 
LEFT JOIN datamajikan 
ON datavisapermit.id_majikan=datamajikan.id_majikan 
LEFT JOIN dataagen 
ON dataagen.id_agen=datavisapermit.id_agen
LEFT JOIN datagroup
ON datagroup.id_group=datavisapermit.id_group
LEFT JOIN datasuhan
ON datasuhan.id_suhan=datavisapermit.id_suhan
WHERE datavisapermit.id_visapermit='$id';";
		$tampil = $this->db->query($sql);
		return $tampil->result();
	}
	function tampil_data_agen(){
		$sql = "SELECT * FROM dataagen";
                $query = $this->db->query($sql);

            return $query->result();
	} 

 // 	function simpan_data_majikan($kode, $nama, $hp, $email,$alamat,$status){
	// 	$data = array(
	// 		'kode_majikan'=>$kode, 
	// 		'nama'=>$nama,
	// 		'hp'=>$hp, 
	// 		'email'=>$email, 
	// 		'alamat'=>$alamat, 
	// 		'status'=>$status, 
	// 		'kode_agen' => $this->input->post('agen'),

	// 		);
	// 	$this->db->insert('datamajikan',$data);
	// }


		function updatesuhan_majikan(){
		$idnya = $this->input->post('idnya');
		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');
			$data = array(
				'id_group' => $group,
				'id_agen' => $kode_agen,
				'id_majikan' => $kodemajikan,
				);
			$this->db->where('id_suhan', $idnya);
			$this->db->update('datasuhan', $data);
	}

			function updatevisapermit_majikan(){
		$idnya = $this->input->post('idnya');
		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');
		$nosuhan = $this->input->post('nosuhan');
			$data = array(
				'id_group' => $group,
				'id_agen' => $kode_agen,
				'id_majikan' => $kodemajikan,
				'id_suhan' => $nosuhan,
				);
			$this->db->where('id_visapermit', $idnya);
			$this->db->update('datavisapermit', $data);
	}


	function simpan_data_majikan($kode, $nama, $hp, $email,$alamat,$status) {

		
		$this->load->library('upload');
		$nmfile = $kode; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/dokmajikan/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx|pdf|xls|xlsx|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
		$config['file_name'] = $nmfile; //nama yang terupload nantinya


		$this->upload->initialize($config);
		
		if(empty($_FILES['filenya']['name']))
        {
            	 $data = array(
            	 	'kode_majikan'=>$kode, 
					'nama'=>$nama,
					'namamajikan' => $this->input->post('namamajikan'),
					'hp'=>$hp, 
					'email'=>$email, 
					'alamat'=>$alamat, 
					'status'=>$status, 
					'kode_group'=>$this->input->post('group'), 
					'kode_agen' => $this->input->post('kodeagen'),
				);
			$this->db->insert('datamajikan', $data);

		}else{
			if ($this->upload->do_upload('filenya'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'kode_majikan'=>$kode, 
					'nama'=>$nama,
					'namamajikan' => $this->input->post('namamajikan'),
					'hp'=>$hp, 
					'email'=>$email, 
					'alamat'=>$alamat, 
					'status'=>$status, 
					'kode_group'=>$this->input->post('group'), 
					'kode_agen' => $this->input->post('kodeagen'),
					'file' => $gbr['file_name'],

					
				);
			$this->db->insert('datamajikan', $data);
			
			}



		}
	}

	function getposisiList_majikan(){

	
        $result = array();
        $this->db->select('*');
        $this->db->from('datamajikan');
        $this->db->order_by('id_majikan','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Nama Majikan-';
            $result[$row->id_majikan]= $row->nama;
        }

        return $result;
    }
    function getsuhanList(){
        $id_majikan = $this->input->post('id_majikan');

	$sql = "SELECT * FROM datasuhan where id_majikan='".$id_majikan."'";
                $query = $this->db->query($sql);

            return $query->result();

    }

    function getagenList2(){
        $kode_group = $this->input->post('kode_group2');

	$sql = "SELECT * FROM dataagen where id_group='".$kode_group."'";
                $query = $this->db->query($sql);

            return $query->result();

    }


        function getagenlist_group($idgrup){
        $result = array();
        $this->db->select('*');
        $this->db->from('dataagen');
        $this->db->where('kode_group',$idgrup);
        $this->db->order_by('kode_group','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Nama Agen-';
            $result[$row->id_agen]= $row->kode_agen.' : '. $row->nama;
        }

        return $result;
    }


	function getposisiList_suhan(){

	
        $result = array();
        $this->db->select('*');
        $this->db->from('datasuhan');
        $this->db->order_by('no_suhan','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih No Suhan-';
            $result[$row->id_suhan]= $row->no_suhan;
        }

        return $result;
    }

        function getmajikanlist_agen($kodeagen){
        $result = array();
        $this->db->select('*');
        $this->db->from('datamajikan');
        $this->db->where('kode_agen',$kodeagen);
        $this->db->order_by('nama','ASC');
        $array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Nama Majikan-';
            $result[$row->id_majikan]= $row->nama;
        }
        return $result;
    }

        function ambilmajikan($kodeagen){
	$sql = "SELECT * FROM datamajikan where kode_agen='".$kodeagen."' ORDER BY nama ASC";
                $query = $this->db->query($sql);

            return $query->result();

    }

        function ambilsuhannya($kodeagen){
	$sql = "SELECT * FROM datasuhan where id_majikan='".$kodeagen."'";
                $query = $this->db->query($sql);

            return $query->result();

    }


 	function simpan_data_suhan() {
 		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');
 		$nosu = $this->input->post('no');
 		$tgte = $this->input->post('tglterbit');
 		$tgex = $this->input->post('tglexp');
 		$tgtr = $this->input->post('tglterima');
 		$tgsi = $this->input->post('tglsimpan');
 		$tgba = $this->input->post('tglbawa');
 		$tgmi = $this->input->post('tglminta');

 		$quota = $this->input->post('quota');
		$this->load->library('upload');
		$nmfile = $nosu; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/doksuhan/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx|xls|xlsx|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
		$config['file_name'] = $nmfile; //nama yang terupload nantinya


		$this->upload->initialize($config);
		
		if(empty($_FILES['filenya']['name']))
        {
            $data = array(
 			'id_group' => $group,
 			'id_agen' => $kode_agen,
 			'id_majikan' => $kodemajikan,
 			'no_suhan' => $nosu,
 			'tglterbit' => $tgte,
 			'tglexp' => $tgex,
 			'tglterima' => $tgtr,
 			'tglsimpan' => $tgsi,
 			'tglbawa' => $tgba,
 			'tglminta' => $tgmi,
 			'quotasuhan' => $quota,
 			);
 		$this->db->insert('datasuhan',$data);

		}else{
			if ($this->upload->do_upload('filenya'))
            {
				$gbr = $this->upload->data();
				$data = array(
 			'id_group' => $group,
 			'id_agen' => $kode_agen,
 			'id_majikan' => $kodemajikan,
 			'no_suhan' => $nosu,
 			'tglterbit' => $tgte,
 			'tglexp' => $tgex,
 			'tglterima' => $tgtr,
 			'tglsimpan' => $tgsi,
 			'tglbawa' => $tgba,
 			'tglminta' => $tgmi,
 			'quotasuhan' => $quota,
			'filesuhan' => $gbr['file_name'],
				);
 		$this->db->insert('datasuhan',$data);
			}

		}
 	}
 		function simpan_data_visapermit() {
		$group = $this->input->post('group');
 		$kode_agen = $this->input->post('kode_agen');
		$kodemajikan = $this->input->post('kodemajikan');
		$nosuhan = $this->input->post('nosuhan');
		
 		$nosu = $this->input->post('no');
 		$tgte = $this->input->post('tglterbit');
 		$tgex = $this->input->post('tglexp');
 		$tgtr = $this->input->post('tglterima');
 		$tgsi = $this->input->post('tglsimpan');
 		$tgba = $this->input->post('tglbawa');
 		$tgmi = $this->input->post('tglminta');
 		$quota = $this->input->post('quota');

		$this->load->library('upload');

		$nmfile = $nosu; //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/dokvisapermit/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx|xls|xlsx|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
		$config['file_name'] = $nmfile; //nama yang terupload nantinya


		$this->upload->initialize($config);
		
		if(empty($_FILES['filenya']['name']))
        {
$data = array(
 				'id_group' => $group,
 			'id_agen' => $kode_agen,
 			'id_majikan' => $kodemajikan,
 			'id_suhan' => $nosuhan,
 			'no_visapermit' => $nosu,
 			'tglterbitvs' => $tgte,
 			'tglexpvs' => $tgex,
 			'tglterimavs' => $tgtr,
 			'tglsimpanvs' => $tgsi,
 			'tglbawavs' => $tgba,
 			'tglmintavs' => $tgmi,
 			'quotavs' => $quota,
 			);
 		$this->db->insert('datavisapermit',$data);

		}else{
			if ($this->upload->do_upload('filenya'))
            {
				$gbr = $this->upload->data();

				$data = array(
 			'id_group' => $group,
 			'id_agen' => $kode_agen,
 			'id_majikan' => $kodemajikan,
 			'id_suhan' => $nosuhan,
 			'no_visapermit' => $nosu,
 			'tglterbitvs' => $tgte,
 			'tglexpvs' => $tgex,
 			'tglterimavs' => $tgtr,
 			'tglsimpanvs' => $tgsi,
 			'tglbawavs' => $tgba,
 			'tglmintavs' => $tgmi,
 			'quotavs' => $quota,
 			'filevisapermit' => $gbr['file_name'],
 			);
 		$this->db->insert('datavisapermit',$data);
			}

		}
 	}


 	// function simpan_data_visapermit2() {
 	// 	$maji = $this->input->post('majikan');
 	// 	$nosuhan = $this->input->post('nosuhan');
 	// 	$nosu = $this->input->post('no');
 	// 	$tgte = date("Y.m.d", strtotime($this->input->post('tglterbit')));
 	// 	$tgex = date("Y.m.d", strtotime($this->input->post('tglexp')));
 	// 	$tgtr = date("Y.m.d", strtotime($this->input->post('tglterima')));
 	// 	$tgsi = date("Y.m.d", strtotime($this->input->post('tglsimpan')));
 	// 	$tgba = date("Y.m.d", strtotime($this->input->post('tglbawa')));
 	// 	$tgmi = date("Y.m.d", strtotime($this->input->post('tglminta')));
 	// 	$quota = $this->input->post('quota');
 	// 	$data = array(
 	// 		'id_visapermit' => '',
 	// 		'id_majikan' => $maji,
 	// 		'no_suhan' => $nosuhan,
 	// 		'no_visapermit' => $nosu,
 	// 		'tglterbit' => $tgte,
 	// 		'tglexp' => $tgex,
 	// 		'tglterima' => $tgtr,
 	// 		'tglsimpan' => $tgsi,
 	// 		'tglbawa' => $tgba,
 	// 		'tglminta' => $tgmi,
 	// 		'quota' => $quota,
 	// 		);
 	// 	$this->db->insert('datavisapermit',$data);
 	// }

 	function update_data_suhan($id) {
		$maji = $this->input->post('majikan');
 		$nosu = $this->input->post('no');
 		$tgte = $this->input->post('tglterbit');
 		$tgex = $this->input->post('tglexp');
 		$tgtr = $this->input->post('tglterima');
 		$tgsi = $this->input->post('tglsimpan');
 		$tgba = $this->input->post('tglbawa');
 		$tgmi = $this->input->post('tglminta');
 		$quota = $this->input->post('quota');
		$data = array(
			'id_majikan' => $maji,
 			'no_suhan' => $nosu,
 			'tglterbit' => $tgte,
 			'tglexp' => $tgex,
 			'tglterima' => $tgtr,
 			'tglsimpan' => $tgsi,
 			'tglbawa' => $tgba,
 			'tglminta' => $tgmi,
 			'quota' => $quota,
			);
		$this->db->where('id_suhan', $id);
		$this->db->update('datasuhan', $data);
	}

	function update_data_visapermit($id) {
		$maji = $this->input->post('majikan');
		$nosuhan = $this->input->post('nosuhan');
 		$nosu = $this->input->post('no');
 		$tgte = date("Y.m.d", strtotime($this->input->post('tglterbit')));
 		$tgex = date("Y.m.d", strtotime($this->input->post('tglexp')));
 		$tgtr = date("Y.m.d", strtotime($this->input->post('tglterima')));
 		$tgsi = date("Y.m.d", strtotime($this->input->post('tglsimpan')));
 		$tgba = date("Y.m.d", strtotime($this->input->post('tglbawa')));
 		$tgmi = date("Y.m.d", strtotime($this->input->post('tglminta')));
 		$quota = $this->input->post('quota');
		$data = array(
			'id_majikan' => $maji,
			'no_suhan' => $nosuhan,
 			'no_visapermit' => $nosu,
 			'tglterbit' => $tgte,
 			'tglexp' => $tgex,
 			'tglterima' => $tgtr,
 			'tglsimpan' => $tgsi,
 			'tglbawa' => $tgba,
 			'tglminta' => $tgmi,
 			'quota' => $quota,
			);
		$this->db->where('id_visapermit', $id);
		$this->db->update('datavisapermit', $data);
	}

	function hapus_data_suhan($id) {
		$this->db->where('id_suhan', $id);
		$this->db->delete('datasuhan');
	}

	function hapus_data_visapermit($id) {
		$this->db->where('id_visapermit', $id);
		$this->db->delete('datavisapermit');
	}

	function ambil_id_majikan($id) {
		return $this->db->get_where('datamajikan', array('id_majikan' => $id))->row();
	}



	function ambil_id_suhan($id) {
		$sql = "SELECT *
FROM datasuhan
INNER JOIN datamajikan
ON datasuhan.id_majikan=datamajikan.id_majikan where id_suhan='$id';";
		$tampil = $this->db->query($sql);
		return $tampil->row();
		//return $this->db->get_where('datasuhan', array('id_suhan' => $id))->row();
	}



	function ambil_id_visapermit($id) {
		return $this->db->get_where('datavisapermit', array('id_visapermit' => $id))->row();
	}
		function hapus_majikan() {
		$id = $this->input->post('id_majikan');
		$namafile = $this->input->post('file');
unlink("assets/dokmajikan/".$namafile);
		$this->db->where('id_majikan', $id);
		$this->db->delete('datamajikan');
	}


	 	function update_suhan() {
	 $id = $this->input->post('id_suhan');
 		$nosu = $this->input->post('no');
 		$tgte = $this->input->post('tglterbit');
 		$tgex = $this->input->post('tglexp');
 		$tgtr = $this->input->post('tglterima');
 		$tgsi = $this->input->post('tglsimpan');
 		$tgba = $this->input->post('tglbawa');
 		$tgmi = $this->input->post('tglminta');
 		$quota = $this->input->post('quota');
		$this->load->library('upload');
		$namafilenys=$_FILES['gambarnya']['name'];
		$nmfile = $this->input->post('no').time(); //nama file saya beri nama langsung dan diikuti fu
        $config['upload_path'] = './assets/doksuhan/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|doc|docx|xls|xlsx|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '5120'; //maksimum besar file 2M
		$config['file_name'] = $nmfile; //nama yang terupload nantinya

		$this->upload->initialize($config);
		
		if(empty($_FILES['gambarnya']['name']))
        {
            $data = array(
 			'no_suhan' => $nosu,
 			'tglterbit' => $tgte,
 			'tglexp' => $tgex,
 			'tglterima' => $tgtr,
 			'tglsimpan' => $tgsi,
 			'tglbawa' => $tgba,
 			'tglminta' => $tgmi,
 			'quotasuhan' => $quota,
 			);
 			$this->db->where('id_suhan', $id);
			$this->db->update('datasuhan', $data);

		}else{
			if ($this->upload->do_upload('gambarnya'))
            {
				$gbr = $this->upload->data();
				$data = array(
 			'no_suhan' => $nosu,
 			'tglterbit' => $tgte,
 			'tglexp' => $tgex,
 			'tglterima' => $tgtr,
 			'tglsimpan' => $tgsi,
 			'tglbawa' => $tgba,
 			'tglminta' => $tgmi,
 			'quotasuhan' => $quota,
			'filesuhan' => $gbr['file_name'],
				);
 			$this->db->where('id_suhan', $id);
			$this->db->update('datasuhan', $data);
			}

		}
 	}



		function hapus_suhan() {
		$id = $this->input->post('id_suhan');
		$namafile = $this->input->post('file');
		unlink("assets/doksuhan/".$namafile);
		$this->db->where('id_suhan', $id);
		$this->db->delete('datasuhan');
	}

	function update_visapermit() {
		$id = $this->input->post('id_visapermit');
		$data = array(
				'no_visapermit' => $this->input->post('no'),
				'tglterbitvs' => $this->input->post('tglterbit'),
				'tglexpvs' => $this->input->post('tglexp'),
				'tglterimavs' => $this->input->post('tglterima'),
				'tglsimpanvs' => $this->input->post('tglsimpan'),
				'tglbawavs'=>$this->input->post('tglbawa'),
				'tglmintavs'=>$this->input->post('tglminta'),
				'quotavs' => $this->input->post('quota'),
			);
		$this->db->where('id_visapermit', $id);
		$this->db->update('datavisapermit', $data);
	}

		function hapus_visapermit() {
		$id = $this->input->post('id_visapermit');
		$namafile = $this->input->post('file');
		unlink("assets/dokvisapermit/".$namafile);
		$this->db->where('id_visapermit', $id);
		$this->db->delete('datavisapermit');
	}


 function simpan_history_suhan($id){

		$data = array (
			'id_suhan'=> $this->input->post('id_suhanhistory'),
			'tgl_terima'=> $this->input->post('tgl_terima'),
			);

		$this->db->insert('suhanhistory',$data);
	}

		function update_history_suhan() {
		$id = $this->input->post('id_suhanhistory');
		$data = array(
			'tgl_terima'=> $this->input->post('tgl_terima'),
			);
		$this->db->where('id_suhanhistory', $id);
		$this->db->update('suhanhistory', $data);
	}


		function hapus_history_suhan($id) {
		$id_suhan=$this->input->post('id_suhanhistory');
		$this->db->where('id_suhanhistory',$id_suhan);
		$this->db->delete('suhanhistory');
	}


 function simpan_history_visapermit($id){

		$data = array (
			'id_visapermit'=> $this->input->post('id_visapermithistory'),
			'tgl_terima'=> $this->input->post('tgl_terima'),
			);

		$this->db->insert('visapermithistory',$data);
	}

		function update_history_visapermit() {
		$id = $this->input->post('id_visapermithistory');
		$data = array(
			'tgl_terima'=> $this->input->post('tgl_terima'),
			);
		$this->db->where('id_visapermithistory', $id);
		$this->db->update('visapermithistory', $data);
	}


		function hapus_history_visapermit($id) {
		$id_visapermit=$this->input->post('id_visapermithistory');
		$this->db->where('id_visapermithistory',$id_visapermit);
		$this->db->delete('visapermithistory');
	}
}
?>