<?php
class Home extends My_controller
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
		$this->render('home',$data);
	}
	function about()
	{
		$this->load->view('about');
	}
	function detail($id)
	{
		$data['model'] = $this->news_model->getById($id);
		$this->render('news_detail',$data);
	}
}