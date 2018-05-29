<?php

class Schedule extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('schedule_model');
	}

	public function index() {
		$data['schedules'] = $this->schedule_model->get_all_schedules();
		$this->load->view('account/schedule_view', $data);
	}

	public function schedule_add() {
		$data = array(
				'course_name' => $this->input->post('course_name'),
				'course_day' => $this->input->post('course_day'),
				'course_time' => $this->input->post('course_time'),
				'course_place' => $this->input->post('course_place'),
				'course_note' => $this->input->post('course_note'),
			);

		$insert = $this->schedule_model->schedule_add($data);
		echo json_encode(array("status" => true));
	} 

	public function ajax_edit($id) {
		$data = $this->schedule_model->get_by_id($id);
		echo json_encode($data);
	}

	public function schedule_update() {
		$data = array(	
				'course_name' => $this->input->post('course_name'),
				'course_day' => $this->input->post('course_day'),
				'course_time' => $this->input->post('course_time'),
				'course_place' => $this->input->post('course_place'),
				'course_note' => $this->input->post('course_note'),
			);
	$this->schedule_model->schedule_update(array('course_id'=> $this->input->post('course_id')), $data);

	echo json_encode(array("status" => TRUE));
	}
	public function schedule_delete($id){
		$this->schedule_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
}