<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_transaksi');
		$this->load->library('session');
	}

	public function index()
	{
		$id = $this->session->userdata('id');

		if ($id != null ) 
		{
			$data = array(
				'title' => 'Daftar Transaksi',
				'data_transaksi' => $this->m_transaksi->get_transaksi()
			);

			$this->load->view('admin/template/header');
			$this->load->view('admin/transaksi', $data);
			$this->load->view('admin/template/footer');
		}else{
			redirect('auth');
		}
	}
		
	public function history()
	{
		$id = $this->session->userdata('id');

		if ($id != null ) 
		{
			$data = array(
				'title' => 'Daftar Transaksi',
				'data_transaksi' => $this->m_transaksi->get_history_transaksi(),
			);

			$this->load->view('admin/template/header');
			$this->load->view('admin/history_transaksi', $data);
			$this->load->view('admin/template/footer');
		}else{
			redirect('auth');
		}
	}	

	public function hapus($id)
	{
		$this->m_transaksi->delete_transaksi($id);

		redirect('transaksi');
	}

	public function selesai($id)
	{
		$this->db->where('id', $id);
		$this->db->set('status','Selesai');
		
		$this->db->update('transaksi', $data);

		redirect('transaksi');

	}

	public function batal($id)
	{
		$this->db->where('id', $id);
		$this->db->set('status','Batal');
		
		$this->db->update('transaksi', $data);

		redirect('transaksi');

	}

	public function dashboard()
	{
		$data['data']=$this->m_transaksi->get_jumlah_transaksi();

		$this->load->view('admin/template/header');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/template/footer');
	}


}
