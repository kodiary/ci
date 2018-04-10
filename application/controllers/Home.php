<?php
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}
	function index($offset=0)
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('home/index');
		$config['total_rows'] = $this->news_model->countAll();
		$config['per_page'] = 5;
		$config['reuse_query_string'] = TRUE;
		$data['news'] = $this->news_model->getAll($config['per_page'],$offset);
		$this->pagination->initialize($config);
		$this->load->view('home',$data);
	}
	function about()
	{
		$this->load->view('about');
	}
}