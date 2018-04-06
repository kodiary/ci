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
	function index($offset=0)
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('admin/news/index');
		$config['total_rows'] = $this->news_model->countAll();
		$config['per_page'] = 3;
		$config['reuse_query_string'] = TRUE;
		$this->pagination->initialize($config);
		$data['news'] = $this->news_model->getAll($config['per_page'],$offset);
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

	function edit($id)
	{
		$data['news'] = $this->news_model->getById($id);
		$this->load->view('admin/news/edit',$data);
	}

	function update($id)
	{
		$this->news_model->update($id);
		$this->session->set_flashdata('success','News updated successfully');
		redirect('admin/news/index');
	}

	function delete($id)
	{
		$this->news_model->delete($id);
		$this->session->set_flashdata('success','News deleted successfully');
		redirect('admin/news/index');
	} 

}