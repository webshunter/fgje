<?php
class M_datadokumenmaleformal extends CI_Model{
    function __construct(){
        parent::__construct();
    }
 
 function tampil_data_personal(){
		$sql = "SELECT * FROM personal WHERE id_biodata LIKE 'mf%' order by id_biodata DESC" ;
                $query = $this->db->query($sql);

            return $query->result();
	}
	
	 function delete_personal($id)
    {
        //delete employee record
        $this->db->where('id_biodata', $id);
        $this->db->delete('personal');
        redirect('datadokumenmaleformal');
    } 

}
?>