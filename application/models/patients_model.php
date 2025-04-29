<?php
class Patients_model extends CI_Model
{
	public function __construct(){
        //load database
        parent::__construct();
        $this->load->database();
    }
	//load data from table 'patients'
	function load_data()
	{
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get('patients');
		return $query->result_array();
	}

	//insert data into table 'patients'
	function insert($data)
	{
		$this->db->insert('patients', $data);
	}

	//update data in table 'patients'
	function update($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('patients', $data);
	}
	//delete data from table 'patients'
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('patients');
	}
}
?>