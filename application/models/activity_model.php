<?php

class Activity_model extends CI_Model {

	var $table = 'activities';

	public function activity_add($data)	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}  

	public function get_all_activities() {
		$this->db->from('activities');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_by_id($id) {
		$this->db->from($this->table);
		$this->db->where('activity_id', $id);
		$query = $this->db->get();

		return $query->row();
	}

	public function activity_update($where, $data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id){
		$this->db->where('activity_id', $id);
		$this->db->delete($this->table);
	}
}
