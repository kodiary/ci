<?php
class News_model extends CI_Model
{
	function getAll($limit,$offset)
	{
		$keyword = $this->input->get('keyword');
		if($keyword){
			$this->db->like(array('title'=>$keyword));
			$this->db->or_like(array('description'=>$keyword));
			$this->db->or_like(array('author'=>$keyword));
		}
		$this->db->limit($limit);
		$this->db->offset($offset);
		$this->db->order_by('id DESC');
		return $this->db->get('news')->result();
	}
	function countAll()
	{
		$keyword = $this->input->get('keyword');
		if($keyword){
			$this->db->like(array('title'=>$keyword));
			$this->db->or_like(array('description'=>$keyword));
			$this->db->or_like(array('author'=>$keyword));
		}
		return $this->db->get('news')->num_rows();
	}
	function getById($id)
	{
		return $this->db->get_where('news',array('id'=>$id))->row();
	}
	function save()
	{
		$arr['title'] = $this->input->post('title');
		$arr['author'] = $this->input->post('author');
		$arr['description'] = $this->input->post('description');
		$this->db->insert('news',$arr);
	}
	function update($id)
	{
		$arr['title'] = $this->input->post('title');
		$arr['author'] = $this->input->post('author');
		$arr['description'] = $this->input->post('description');
		$this->db->where(array('id'=>$id));
		$this->db->update('news',$arr);
	}
	function delete($id)
	{
		$this->db->where(array('id'=>$id));
		$this->db->delete('news');
	}
}