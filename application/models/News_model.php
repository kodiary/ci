<?php
class News_model extends CI_Model
{
	function getAll()
	{
		$this->db->order_by('id DESC');
		return $this->db->get('news')->result();
	}
	function save()
	{
		$arr['title'] = $this->input->post('title');
		$arr['author'] = $this->input->post('author');
		$arr['description'] = $this->input->post('description');
		$this->db->insert('news',$arr);
	}
}