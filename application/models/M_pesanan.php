<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanan extends CI_Model {

	public function get_pesanan ()
	{
		$query = $this->db->order_by('id','desc')->get('menu');
		return $query->result();
	}

	public function insert_pesanan($pemesan){
		$query = $this->db->insert("pesanan", $pemesan);
		if($query){
		    return true;
		}else{
		    return false;
		}
	}

}