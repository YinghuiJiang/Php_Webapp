<?php
class patient_med_list_model extends CI_Model
{
	public function __construct(){
        //load database
        parent::__construct();
        $this->load->database();
    }
	
	public function load_query1_result(){
		

		$sql_1= "SELECT * From patients WHERE gender='female' AND stage='adult'";
		$query_1 = $this->db->query($sql_1);
		return $query_1->result_array();
		
		
	}

	public function load_query2_result(){
		

		$sql_2= "SELECT * From medicines WHERE intake_time='8pm'";
		$query_2 = $this->db->query($sql_2);
		return $query_2->result_array();
		
		
	}

	public function load_query3_result(){
		

		$sql_3= "SELECT * From patients WHERE gender='male' AND stage='infant'";
		$query_3 = $this->db->query($sql_3);
		return $query_3->result_array();
		
		
	}

	public function load_query4_result(){
		

		$sql_4= "SELECT * From medicines WHERE intake_time='8am'";
		$query_4 = $this->db->query($sql_4);
		return $query_4->result_array();
		
		
	}

	//get cartesian product of two query arrays
	public function get_cartesian_product($array1, $array2) {
		$result = array();
		foreach ($array1 as $item1) {
			foreach ($array2 as $item2) {
				$result[] = array_merge($item1, $item2);
			}
		}
		return $result->result_array();
	}
	
	
}
?>