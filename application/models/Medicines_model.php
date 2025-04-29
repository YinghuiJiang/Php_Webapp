<?php
class Medicines_model extends CI_Model
{
	public function __construct(){
        //load database
        parent::__construct();
        $this->load->database();
    }
	//load data from table 'medicines' 
	function load_data()
	{
		$this->db->order_by('med_ID', 'ASC');
		$query = $this->db->get('medicines');
		return $query->result_array();
	}
	//insert data to table 'medicines'
	function insert($data)
	{
		$this->db->insert('medicines', $data);
	}
	//update data in the table 'medicines'
	function update($data, $id)
	{
		$this->db->where('med_ID', $id);
		$this->db->update('medicines', $data);
	}
	//delete data from table 'medicines'
	function delete($id)
	{
		$this->db->where('med_ID', $id);
		$this->db->delete('medicines');
	}
}
?>