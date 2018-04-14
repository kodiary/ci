<?php
class My_controller extends CI_Controller
{
	function render($view,$data)
	{
		$this->load->view('header');
		$this->load->view($view,$data);
		$this->load->view('footer');
	}
}