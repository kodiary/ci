<?php
class News extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin'))
			redirect('admin');
		$this->load->model('news_model');
	}
	function index()
	{
		$data['news'] = $this->news_model->getAll();
		$this->load->view('admin/news/index',$data);
	}

	function add()
	{
		$this->load->view('admin/news/add');
	}

	function save()
	{
		$this->news_model->save();
		$this->session->set_flashdata('success','News saved successfully');
		redirect('admin/news/index');
	}

}