<?php

class Schedule_model extends CI_Model {

	var $table = 'schedules';

	public function schedule_add($data)	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}  

	public function get_all_schedules() {
		$this->db->from('schedules');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_by_id($id) {
		$this->db->from($this->table);
		$this->db->where('course_id', $id);
		$query = $this->db->get();

		return $query->row();
	}

	public function schedule_update($where, $data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id){
		$this->db->where('course_id', $id);
		$this->db->delete($this->table);
	}
}
