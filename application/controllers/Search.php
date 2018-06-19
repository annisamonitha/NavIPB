<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  

class Search extends CI_Controller {  
    function __construct(){  
        parent::__construct();  
        $this->load->helper('url');
		$this->load->model('Search_model');
		$this->load->helper('form');  
    } 
	public function keyword(){
		$key=$this->input->post('');
		$data['database']=$this->Search_model->search($key);
		$this->load->view('account/ipb1user');
	} 

    public function index() {
		$data['database']=this->Search_model->cari_data()->result(); 
        $this->load->view('account/ipb1user');  
    }
}  
