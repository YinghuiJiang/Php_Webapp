<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('patients_model');
	}

	function index()
	{
		$this->load->view('patients');
	}

	//load data from patients model
	function load_data()
	{
		$data = $this->patients_model->load_data();
		echo json_encode($data);
	}

	//insert data into patients model
	function insert()
	{
		$data = array(
			
			'gender'		=>	$this->input->post('gender'),
			'stage'			=>	$this->input->post('stage')
		);

		$this->patients_model->insert($data);
	}

	//update data in patients model
	function update()
	{
		$data = array(
			$this->input->post('table_column')	=>	$this->input->post('value')
		);

		$this->patients_model->update($data, $this->input->post('id'));
	}

	//delete data from patients model
	function delete()
	{
		$this->patients_model->delete($this->input->post('id'));
	}
	

}
