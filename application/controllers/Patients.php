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

	function load_data()
	{
		$data = $this->patients_model->load_data();
		echo json_encode($data);
	}

	function insert()
	{
		$data = array(
			
			'gender'		=>	$this->input->post('gender'),
			'stage'			=>	$this->input->post('stage')
		);

		$this->patients_model->insert($data);
	}

	function update()
	{
		$data = array(
			$this->input->post('table_column')	=>	$this->input->post('value')
		);

		$this->patients_model->update($data, $this->input->post('id'));
	}

	function delete()
	{
		$this->patients_model->delete($this->input->post('id'));
	}
	

}
