<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_med_list extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Patient_med_list_model');
	}

	public function index()
	{
		$data = $this->Patient_med_list_model->fetch_options();
		
		if ($this->input->post()) {
            $options = $this->input->post();
            $data['results'] = $this->Patient_med_list_model->get_cartesian(
                $options['gender'],
                $options['stage'],
                $options['intake_time']
            );
        }

		$this->load->view('patient_med_list', $data);
	}
	

	
	
}
