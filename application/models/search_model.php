<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model{

	public function cari($keyword){
		$this->db->like('searching_name',$keyword);
		$query=$this->db->get('searching');
		return $query->result();
	}
	
	public function get_all(){
		return $this->db->get('searching')->result();
	}
	
	public function get_search_keyword($keyword){
		$this->db->select('*');
		$this->db->from('searching');
		$this->db->like('searching_name',$keyword); 
		return $this->db->get()->result();
	}
}
