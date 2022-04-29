<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootstrap extends CI_Controller {

	function index()
	{
		$this->load->view('v_bootstrap');
	}

}
?>