<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditccruser extends CI_Controller {

	public function index()
	{
		$this->load->view('account/auditccruser');
	}
}