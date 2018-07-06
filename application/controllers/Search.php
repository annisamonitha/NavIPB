<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  

class Search extends CI_Controller {  
    function __construct(){  
        parent::__construct();  
        $this->load->helper('url');
		$this->load->model('Search_model');
		$this->load->helper('form');  
    } 
	public function cari(){
		$keyword=$this->input->post('keyword');
		$data['searching']=$this->Search_model->get_search_keyword($keyword);
		$this->load->view('account/ipb1user', $data);
	} 

    public function index() {
		$data['searching']=$this->Search_model->get_all(); 
        $this->load->view('account/ipb1user', $data);  
    }
}  
