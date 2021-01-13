<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model {

	public function get_menu ()
	{
		$query = $this->db->order_by('id','desc')->get('menu');
		return $query->result();
	}


	public function get_menu_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('menu');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_makanan()
	{
		$this->db->select('*');
		$this->db->where('kategori', 'services');
		$this->db->from('menu');
		$query = $this->db->get();
		return $query->result();

	}	

	public function get_minuman()
	{
		$this->db->select('*');
		$this->db->where('kategori', 'styles');
		$this->db->from('menu');
		$query = $this->db->get();
		return $query->result();

	}

	public function insert_menu($data)
	{
		$query = $this->db->insert("menu", $data);
		if($query){
		    return true;
		}else{
		    return false;
		}

	}

	public function update_data($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('menu', $data);
	}

	public function delete_menu($id)
	{
		$this->db->where('id', $id);
		$this->db->from('menu');
		return $this->db->delete();
		
	}


}