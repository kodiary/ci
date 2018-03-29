<?php
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin'))
			redirect('admin');
	}
	function index()
	{
		$this->load->view('admin/dashboard');
	}
}