<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipb3user extends CI_Controller {

	public function index()
	{
		$this->load->view('account/ipb3user');
	}
}