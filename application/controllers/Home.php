<?php
class Home extends CI_Controller
{
	function index()
	{
		$this->load->view('home');
	}
	function about()
	{
		$this->load->view('about');
	}
}