<?php
class News_model extends CI_Model
{
	function getAll()
	{
		return $this->db->get('news')->result();
	}
}