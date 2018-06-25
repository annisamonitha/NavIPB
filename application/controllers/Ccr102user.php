<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccr102user extends CI_Controller {

	public function index()
	{
		$this->load->view('account/ccr102user');
	}
}