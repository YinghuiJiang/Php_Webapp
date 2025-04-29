<?php
class Medicines_model extends CI_Model
{
	public function __construct(){
        //load database
        parent::__construct();
        $this->load->database();
    }
	
	function load_data()
	{
		$this->db->order_by('med_ID', 'ASC');
		$query = $this->db->get('medicines');
		return $query->result_array();
	}

	function insert($data)
	{
		$this->db->insert('medicines', $data);
	}

	function update($data, $id)
	{
		$this->db->where('med_ID', $id);
		$this->db->update('medicines', $data);
	}

	function delete($id)
	{
		$this->db->where('med_ID', $id);
		$this->db->delete('medicines');
	}
}
?>