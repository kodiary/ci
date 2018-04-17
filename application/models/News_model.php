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
		if(isset($_FILES['image']['name']))
		{
			$this->load->library('upload');
			$config['upload_path'] = APPPATH.'../uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = date('YmdHms').'_'.rand(1,999999);
			$this->upload->initialize($config);
			if($this->upload->do_upload('image'))
			{
				$uploaded = $this->upload->data();
				$arr['image'] = $uploaded['file_name'];
				$this->resize_image(APPPATH.'../uploads/'.$arr['image'],900);
				$this->createThumbnail(PPPATH.'../uploads/'.$arr['image'],APPPATH.'../uploads/thumbnail/'.$arr['image'],400,300);
				//$arr['image'] = 
			}
		}
		$this->db->insert('news',$arr);
	}
	function resize_image($source,$width)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] = $source;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = $width;

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		$this->image_lib->clear();
	}
	function createThumbnail($source,$destination,$width,$height)
	{
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = $source;
		$config['new_image'] = $destination;
		$config['maintain_ratio'] = FALSE;
		$config['width']         = $width;
		$config['height'] = $height;

		$this->image_lib->initialize($config);

		$this->image_lib->resize();
		$this->image_lib->clear();
	}
	function update($id)
	{
		$arr['title'] = $this->input->post('title');
		$arr['author'] = $this->input->post('author');
		$arr['description'] = $this->input->post('description');
		if(isset($_FILES['image']['name']))
		{
			$this->load->library('upload');
			$config['upload_path'] = APPPATH.'../uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = date('YmdHms').'_'.rand(1,999999);
			$this->upload->initialize($config);
			if($this->upload->do_upload('image'))
			{
				$uploaded = $this->upload->data();
				$arr['image'] = $uploaded['file_name'];
				$this->resize_image(APPPATH.'../uploads/'.$arr['image'],900);
				$this->createThumbnail(APPPATH.'../uploads/'.$arr['image'],APPPATH.'../uploads/thumbnail/'.$arr['image'],400,300);
				//$arr['image'] = 
			}
		}
		$this->db->where(array('id'=>$id));
		$this->db->update('news',$arr);
	}
	function delete($id)
	{
		$this->db->where(array('id'=>$id));
		$this->db->delete('news');
	}
}