<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function get_user ()
	{
		$query = $this->db->order_by('id','desc')->get('user');
		return $query->result();
	}

	public function get_user_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('user');
		$query = $this->db->get();
		return $query->result();
	}

	public function logged_in()
	{
	return $this->session->userdata('id');
	}

	function check_login($field1, $field2)
	   {
	       $this->db->select('*');
	       $this->db->from('user');
	       $this->db->where($field1);
	       $this->db->where($field2);
	       $this->db->limit(1);
	       $query = $this->db->get();
	       if ($query->num_rows() == 0) {
	           return FALSE;
	       } else {
	           return $query->result();
	       }
	   }

	public function register_user($data)
	{
		$query = $this->db->insert("user", $data);
		if($query){
		    return true;
		}else{
		    return false;
		}

	}
	public function update_user($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}


}