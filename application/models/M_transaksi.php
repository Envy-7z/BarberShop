<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function get_user_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('user');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_transaksi ()
	{
		$this->db->select('transaksi.*, pesanan.nama_pemesan, menu.nama_menu, menu.harga_menu');
		$this->db->from('transaksi');
		$this->db->join('pesanan','pesanan.id = transaksi.pesanan_id');
		$this->db->join('menu','menu.id = transaksi.menu_id');
		$this->db->where('status','Proses');
		$this->db->order_by('transaksi.id','desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_history_transaksi ()
	{
		$this->db->select('transaksi.*, pesanan.nama_pemesan, menu.nama_menu, menu.harga_menu');
		$this->db->from('transaksi');
		$this->db->join('pesanan','pesanan.id = transaksi.pesanan_id');
		$this->db->join('menu','menu.id = transaksi.menu_id');
		$this->db->where("(status='Selesai' OR status='Batal')");
		$this->db->order_by('transaksi.id','desc');
		$query = $this->db->get();
		return $query->result();
	}


	public function insert_transaksi($transaksi){
		$query = $this->db->insert("transaksi", $transaksi);
		if($query){
		    return true;
		}else{
		    return false;
		}
	}
	
	public function delete_transaksi($id)
	{
		$this->db->where('id', $id);
		$this->db->from('transaksi');
		return $this->db->delete();
		
	}

	public function update_transaksi($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('transaksi', $data);
	}

    public function get_jumlah_transaksi(){
    	$this->db->select('status');
    	$this->db->from('transaksi');
    	$this->db->where('status', 'Selesai');
    	$query = $this->db->get();
        // $query = $this->db->query("SELECT merk,SUM(stok) AS stok FROM barang GROUP BY merk");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 
}


	