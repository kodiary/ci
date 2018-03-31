<?php
class News extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin'))
			redirect('admin');
	}
	function index()
	{
		$this->load->model('news_model');
		$data['news'] = $this->news_model->getAll();
		//$data['x'] = 5;
		$this->load->view('admin/news',$data);
	}
}