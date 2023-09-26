<?php
class M_detailasuransi extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 

 function tampil_data_sektor(){
		$sql = "SELECT kode_jenis,isi,isi_taiwan,no_urut,jeniskelamin FROM datasektor";
                $query = $this->db->query($sql);

            return $query->result();
	} 

 function tampil_data_negara(){
		$sql = "SELECT kode_negara,isi,mandarin FROM datanegara";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function tampil_data_calling(){
		$sql = "SELECT kode_calling,isi FROM datacalling";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_namaasuransi(){
		$sql = "SELECT * FROM datanamaasuransi";
                $query = $this->db->query($sql);

            return $query->result();
	} 
	
	function tampil_data_skillnya(){
		$sql = "SELECT kode_skillnya,isi FROM dataskillnya";
                $query = $this->db->query($sql);

            return $query->result();
	} 
 
	function tampil_data_agama(){
		$sql = "SELECT id_agama,isi,mandarin FROM dataagama";
                $query = $this->db->query($sql);

            return $query->result();
	} 

		function tampil_data_pendidikan(){
		$sql = "SELECT isi,mandarin FROM datapendidikan";
                $query = $this->db->query($sql);

            return $query->result();
	} 
		function tampil_data_provinsi(){
		$sql = "SELECT isi,mandarin FROM dataprovinsi";
                $query = $this->db->query($sql);

            return $query->result();
	}
			function tampil_pil_asuransi(){
		$sql = "SELECT * FROM dataasuransi";
                $query = $this->db->query($sql);

            return $query->result();
	}

	function hitung_data_asuransi($idnya){
		$sql = "SELECT count(*) as total FROM asuransi WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}
		function hitung_data_asuransifull($idnya){
		$sql = "SELECT count(*) as total FROM asuransifull WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql)->row_array();

          return $query['total'];
	}


			function tampil_data_personal($idnya){
		$sql = "SELECT * FROM personal WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
				function tampil_data_asuransi($idnya){
		$sql = "SELECT * FROM asuransi WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tambahasuransi() {
            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'noasuransi' => $this->input->post('noasuransi'),
            	 	'namaasuransi' => $this->input->post('namaasuransi'),
					'tglasuransi' => $this->input->post('tglasuransi'),
					'jumlah' => $this->input->post('jumlah'),
				

				);
			$this->db->insert('asuransi', $data);
	} 
	function ubahasuransi() {
 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'noasuransi' => $this->input->post('noasuransi'),
            	 	'namaasuransi' => $this->input->post('namaasuransi'),
					'tglasuransi' => $this->input->post('tglasuransi'),
					'jumlah' => $this->input->post('jumlah'),

				);
			//$this->db->insert('asuransipermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('asuransi', $data);
	} 

		function tampil_data_asuransifull($idnya){
		$sql = "SELECT * FROM asuransifull WHERE id_biodata='".$idnya."'";
                $query = $this->db->query($sql);

            return $query->result();
	}
	function tambahasuransifull() {
            	 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'noasuransi' => $this->input->post('noasuransi'),
            	 	'namaasuransi' => $this->input->post('namaasuransi'),
					'tglasuransi' => $this->input->post('tglasuransi'),
					'jumlah' => $this->input->post('jumlah'),
				

				);
			$this->db->insert('asuransifull', $data);
	} 
	function ubahasuransifull() {
 $data = array(  
            	 	'id_biodata' => $this->input->post('idbiodata'),
            	 	'noasuransi' => $this->input->post('noasuransi'),
            	 	'namaasuransi' => $this->input->post('namaasuransi'),
					'tglasuransi' => $this->input->post('tglasuransi'),
					'jumlah' => $this->input->post('jumlah'),

				);
			//$this->db->insert('asuransipermit', $data);
			$this->db->where('id_biodata', $this->input->post('idbiodata'));
			$this->db->update('asuransifull', $data);
	} 


}
?>