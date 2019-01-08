<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Denda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('m_denda', 'mod');
	}


	public function index()
	{
		$data['title']='Tabel denda';
		//$data['kodeunik'] = $this->m_denda->buat_kode();
		$data['result']=$this->mod->tampil_denda()['result'];
		$data['total_data']=$this->mod->tampil_denda()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('denda/denda_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah denda';
		$data['kodeunik'] = $this->mod->buat_kode();
		$this->parser->parse('denda/denda_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_denda"	=> $this->input->post('id_denda'),
			"nama"	=> $this->input->post('nama'),
			"harga"	=> $this->input->post('harga'),
			"keterangan"	=> $this->input->post('keterangan'),
			
		];

		$this->mod->tambah_denda($data);
		redirect(site_url('denda'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah denda';
		$data['result']=$this->mod->detail_denda($id);
		$this->parser->parse('denda/denda_ubah', $data);
	}

	public function ubah_proses()
	{
		$data=[
			"id_denda"	=> $this->input->post('id_denda'),
			"nama"	=> $this->input->post('nama'),
			"harga"	=> $this->input->post('harga'),
			"keterangan"	=> $this->input->post('keterangan'),
		];

		$this->mod->ubah_denda($data);
		redirect(site_url('denda'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('denda'));
	}
}

/* End of file denda.php */
/* Location: ./application/controllers/denda.php */