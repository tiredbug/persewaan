<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('m_pembayaran', 'mod');
		$this->load->model('m_customer');
		$this->load->model('m_produk');
	}


	public function index()
	{
		$data['title']='Tabel pembayaran';
		//$data['kodeunik'] = $this->m_pembayaran->buat_kode();
		$data['result']=$this->mod->tampil_pembayaran()['result'];
		$data['total_data']=$this->mod->tampil_pembayaran()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('pembayaran/pembayaran_tampil', $data);
	}

	public function tampil()
	{
		// echo "<tr><td>tampil disini</td><td>tampil disini</td><td>tampil disini</td><td>tampil disini</td></tr>";
	}
	public function insertToCart($value='')
	{
		$data=[
			"id_produk"	=> $this->input->post('id_produk'),
			"id_paket"	=> $this->input->post('id_paket'),
			"jumlah"	=> $this->input->post('jumlah'),
			"potongan"	=> $this->input->post('potongan'),
			"biaya"		=> $this->input->post('biaya'),
			"subtotal"	=> $this->input->post('subtotal'),			
		];
		$this->mod->tambah_cart($data);
	}
	public function tambah()
	{
		$data['title']='Tambah pembayaran';
		$data['kodeunik'] = $this->mod->buat_kode();
		$data['result_customer_pilihan'] = $this->m_customer->tampil_customer_pilihan()['result'];
		$data['result_produk_pilihan'] = $this->m_produk->tampil_produk_pilihan()['result'];
		$this->parser->parse('pembayaran/pembayaran_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_pembayaran"	=> $this->input->post('id_pembayaran'),
			"nama"	=> $this->input->post('nama'),
			
		];
		$this->session->set_userdata('user_id');

		$this->mod->tambah_pembayaran($data);
		redirect(site_url('pembayaran'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah pembayaran';
		$data['result']=$this->mod->detail_pembayaran($id);
		$this->parser->parse('pembayaran/pembayaran_ubah', $data);
	}

	public function ubah_proses()
	{
		$data=[
			"id_pembayaran"	=> $this->input->post('id_pembayaran'),
			"nama"	=> $this->input->post('nama')
		];

		$this->mod->ubah_pembayaran($data);
		redirect(site_url('pembayaran'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('pembayaran'));
	}
}

/* End of file pembayaran.php */
/* Location: ./application/controllers/pembayaran.php */