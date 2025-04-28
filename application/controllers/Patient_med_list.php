<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_med_list extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('patient_med_list_model');
	}

	public function index()
	{
		$this->load->view('patient_med_list');
	}

	public function load_query_result1()
	{
		$result = $this->patient_med_list_model->get_cartesian_product(load_query1_result(), load_query2_result());
		echo json_encode($result);
	}

	public function load_query_result2()
	{
		$result = $this->patient_med_list_model->get_cartesian_product(load_query3_result(), load_query4_result());
		echo json_encode($result);
	}
	
}
