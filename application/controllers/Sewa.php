<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sewa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('m_sewa', 'mod');
		$this->load->model('m_customer');
		$this->load->model('m_produk');
		$this->load->model('m_harga');
		
	}
	public function hitung_otomatis()
	{

        $hitung=$this->mod->hitung($this->input->post('id_harga'));
        $jumlah=$this->input->post('jumlah');
        $hasil = $hitung->harga*$jumlah;
        
        print_r(json_encode($hasil));die;
       
        //$this->load->view('perkalian',$data);
	}


	public function index()
	{
		$data['title']='Tabel sewa';
		//$data['kodeunik'] = $this->m_sewa->buat_kode();
		$data['result']=$this->mod->tampil_sewa()['result'];
		$data['total_data']=$this->mod->tampil_sewa()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('sewa/sewa_tampil', $data);
	}

	public function tampil()
	{
		$result=$this->mod->cart();
		 foreach ($result as $cart)

		 	{echo "<tr> 
		 <td>".$cart->nama_produk."</td>
		 <td>".$cart->durasi."</td>
		 <td>".$cart->harga."</td>
		 <td>".$cart->jumlah."</td>
		 <td>".$cart->biaya."</td>
		 <td>".$cart->jam_pinjam."</td>
		 <td>".$cart->jam_harus_kembali."</td>
		 <td>".$cart->status."</td>
		 <td><button data-id_cart='".$cart->id_cart."' type='button' onclick='hapus(this)'>hapus</button></td>
		 </tr>";}


	}
	public function insertToCart()
	{
		$id_harga=$this->input->post('id_harga');
		$dt_harga=$this->mod->ambil_harga($id_harga);
		$durasi=$dt_harga->durasi;
		$harga=$dt_harga->harga;
		$tgl_pinjam=date('Y-m-d',strtotime($this->input->post('tgl_pinjam')))." ".$this->input->post('jam_pinjam');
		$jam_harus_kembali = date('Y-m-d H:i:s', strtotime("+".$durasi." hours",strtotime($tgl_pinjam)));
		$data=[
			"id_produk"	=> $this->input->post('id_produk'),
			"id_harga"	=> $this->input->post('id_harga'),
			"jam_pinjam"	=> $tgl_pinjam,
			"harga"	=> $harga,
			"jam_harus_kembali"	=> $jam_harus_kembali,
			"jumlah"	=> $this->input->post('jumlah'),
			"biaya"		=> $this->input->post('biaya'),
			//"subtotal"	=> $this->input->post('biaya')*$this->input->post('jumlah'),			
		];
		$this->mod->tambah_cart($data);
	}
	
	public function tambah()
	{
		$data['title']='Tambah sewa';
		$data['kodeunik'] = $this->mod->buat_kode();
		$data['result_customer_pilihan'] = $this->m_customer->tampil_customer_pilihan()['result'];
		$data['result_produk_pilihan'] = $this->m_produk->tampil_produk_pilihan()['result'];
		$data['result_harga_pilihan'] = $this->m_harga->tampil_harga_pilihan()['result'];
		$this->parser->parse('sewa/sewa_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_sewa"	=> $this->input->post('id_sewa'),
			"nama"	=> $this->input->post('nama'),
			
		];
		$this->session->set_userdata('user_id');

		$this->mod->tambah_sewa($data);
		redirect(site_url('sewa'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah sewa';
		$data['result']=$this->mod->detail_sewa($id);
		$this->parser->parse('sewa/sewa_ubah', $data);
	}

	public function ubah_proses()
	{
		$data=[
			"id_sewa"	=> $this->input->post('id_sewa'),
			"nama"	=> $this->input->post('nama')
		];

		$this->mod->ubah_sewa($data);
		redirect(site_url('sewa'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('sewa'));
	}
	public function deleteCart($id)
	{
		 $this->mod->deleteCart($id);
	}
}

/* End of file sewa.php */
/* Location: ./application/controllers/sewa.php */