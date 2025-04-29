<?php
class Patients_model extends CI_Model
{
	public function __construct(){
        //load database
        parent::__construct();
        $this->load->database();
    }
	
	function load_data()
	{
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get('patients');
		return $query->result_array();
	}

	function insert($data)
	{
		$this->db->insert('patients', $data);
	}

	function update($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('patients', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('patients');
	}
}
?>