<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicines extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('medicines_model');
	}

	function index()
	{
		$this->load->view('medicines');
	}

	function load_data()
	{
		$data = $this->medicines_model->load_data();
		echo json_encode($data);
	}

	function insert()
	{
		$data = array(
			
			'frequency'				=>	$this->input->post('frequency'),
			'intake_time'			=>	$this->input->post('intake_time'),
			'infant_safety'			=>	$this->input->post('infant_safety')
		);

		$this->medicines_model->insert($data);
	}

	function update()
	{
		$data = array(
			$this->input->post('table_column')	=>	$this->input->post('value')
		);

		$this->medicines_model->update($data, $this->input->post('id'));
	}

	function delete()
	{
		$this->medicines_model->delete($this->input->post('id'));
	}
	

}
