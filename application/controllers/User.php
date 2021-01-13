<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_menu');
		$this->load->model('m_pesanan');
		$this->load->model('m_transaksi');
	}

	public function index()
	{
		$data = array(
			'title' => 'Daftar Menu',
			'data_menu' => $this->m_menu->get_makanan(),
			'data_minuman' => $this->m_menu->get_minuman()
		);



		$this->load->view('user/index', $data);
	}

	public function pesan()
	{
		$pemesan = array(
			'nama_pemesan' => $this->input->post('pemesan'),
			'no_meja' => $this->input->post('no_meja'),
			'tambahan_pesanan' => $this->input->post('tambahan')
		);

		$this->m_pesanan->insert_pesanan($pemesan);
		$last_id = $this->db->insert_id();

		$menu = $this->input->post('menu_id');
		$qty = $this->input->post('qty');

		if(count($menu) > 0){
			foreach($menu as $item=>$v){
				$transaksi = array(
					'pesanan_id' => $last_id,
					'menu_id' => $menu[$item],
					'jumlah_pesanan' => $qty[$item]
				);
				$this->m_transaksi->insert_transaksi($transaksi);
			}
		}
		redirect('user/berhasil');
	}

	public function berhasil()
	{
		$this->load->view('user/berhasil');
	}
}
