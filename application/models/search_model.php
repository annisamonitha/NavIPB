<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model{
	public function_construct(){
		parent::_construct();
		$this->load->database();
	}
	public function search($key){
		$this->db->like('db_name',$key);
		$query=$this->db->get('database');
		return $query->result();
	}

	function cari_data(){
		$this->db->from('database');
		$query=$this->db->get();
		return $query->result();
	}
}
