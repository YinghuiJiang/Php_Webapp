<?php
class Patient_med_list_model extends CI_Model
{
	public function __construct(){
        //load database
        parent::__construct();
        $this->load->database();
    }
	
	//get cartesian product 
	public function get_cartesian($gender, $stage, $intake_time) {
		
		//get patients with condition from table 'patients'
		$this->db->where('gender', $gender);
        $this->db->where('stage', $stage);
        $patients = $this->db->get('patients')->result_array();

		//get medications with condition from table 'medicines'
		$this->db->where('intake_time', $intake_time);
        $medicines = $this->db->get('medicines')->result_array();

		//get all combinations of patients and medications
		$results = array();
        foreach ($patients as $patient) {
            foreach ($medicines as $medicine) {
                $results[] = array_merge($patient, $medicine);
            }
        }
        return $results;
	}

	public function fetch_options(){

		//get distinct values from table 'patients' and 'medicines'
		return [
            'gender' => $this->db->select('gender')->distinct()->get('patients')->result_array(),
            'stage' => $this->db->select('stage')->distinct()->get('patients')->result_array(),
            'intake_time' => $this->db->select('intake_time')->distinct()->get('medicines')->result_array()
        ];
	}
	
	
}
?>