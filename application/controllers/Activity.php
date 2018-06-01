<?php

class Activity extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('activity_model');
	}

	public function index() {
		$data['activities'] = $this->activity_model->get_all_activities();
		$this->load->view('account/activity_view', $data);
	}

	public function activity_add() {
		$data = array(
				'activity_name' => $this->input->post('activity_name'),
				'activity_explanation' => $this->input->post('activity_explanation'),
			);

		$insert = $this->activity_model->activity_add($data);
		echo json_encode(array("status" => true));
	} 

	public function ajax_edit($id) {
		$data = $this->activity_model->get_by_id($id);
		echo json_encode($data);
	}

	public function activity_update() {
		$data = array(
			'activity_name' => $this->input->post('activity_name'),
				'activity_explanation' => $this->input->post('activity_explanation'),		
		);
	$this->activity_model->activity_update(array('activity_id'=> $this->input->post('activity_id')), $data);

	echo json_encode(array("status" => TRUE));
	}
	public function activity_delete($id){
		$this->activity_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
}