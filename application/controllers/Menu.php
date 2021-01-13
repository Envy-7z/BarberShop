<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_menu');
		$this->load->library('session');
	}
	
	public function index()
	{
		$id = $this->session->userdata('id');

		if ($id != null ) 
		{
			$data = array(
				'title' => 'Daftar Menu',
				'data_menu' => $this->m_menu->get_menu()
			);

			$this->load->view('admin/template/header');
			$this->load->view('admin/menu', $data);
			$this->load->view('admin/template/footer');
		}else{
			redirect('auth');
		}
	}


	public function tambah()
	{
		$id = $this->session->userdata('id');

		if ($id != null ) 
		{
			$this->load->view('admin/template/header');
			$this->load->view('admin/tambah');
			$this->load->view('admin/template/footer');
		}else{
			redirect('auth');
		}
	}

	public function proses_tambah()
	{
		$data = array(
		    'nama_menu' => $this->input->post("nama_menu"),
		    'stock_menu' => $this->input->post("stock_menu"),
		    'harga_menu' => $this->input->post("harga_menu"),
		    'kategori'	=> $this->input->post("kategori")

		);

		$this->m_menu->insert_menu($data);
		$id = $this->db->insert_id();

		if ($_FILES != null) {
			$this->upload_foto($id, $_FILES);
		}

		redirect('menu');
	}

	private function upload_foto($id, $files)
	{
		$path = realpath(APPPATH . '../foto');
		$konfigurasi = array(
				'allowed_types' => 'jpg|png|jpeg',
				'upload_path' => $path,
				'overwrite' => true
				);

		$this->load->library('upload',$konfigurasi);

		$_FILES['gambar_menu']['name'] = $files['gambar_menu']['name'];
		$_FILES['gambar_menu']['type'] = $files['gambar_menu']['type'];
		$_FILES['gambar_menu']['tmp_name'] = $files['gambar_menu']['tmp_name'];
		$_FILES['gambar_menu']['error'] = $files['gambar_menu']['error'];
		$_FILES['gambar_menu']['size'] = $files['gambar_menu']['size'];	

		if ($this->upload->do_upload('gambar_menu')){
			print_r ($files);

			$data_menu = array(

				'gambar_menu' => $_FILES['gambar_menu']['name']
			);

			$this->m_menu->update_data($id, $data_menu);
			return 'Success Upload';

		} else {
			return 'Error Upload';
		}
	}

	public function edit($id)
	{
		$data['menu'] = $this->m_menu->get_menu_by_id($id);

		$this->load->view('admin/template/header');
		$this->load->view('admin/edit', $data);
		$this->load->view('admin/template/footer');
	}

	public function proses_edit()
	{	

		$id = $this->input->post("id");

		$data = array(
		    'nama_menu' => $this->input->post("nama_menu"),
		    'stock_menu' => $this->input->post("stock_menu"),
		    'harga_menu' => $this->input->post("harga_menu"),
		    'kategori' => $this->input->post("kategori")

		);

		$this->m_menu->update_data($id, $data);

		if ($_FILES != null) {
			$this->upload_foto($id, $_FILES);
		}

		redirect('menu');
	}

	public function hapus($id)
	{
		$this->m_menu->delete_menu($id);

		redirect('menu');
	}
}