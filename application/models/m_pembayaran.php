<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_pembayaran extends CI_Model {

	public $table='pembayaran';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(pembayaran.id_pembayaran,4) as kode', FALSE);
		  $this->db->order_by('id_pembayaran','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('pembayaran');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $ym = date('ym');
		  $kodejadi = "TRB-$ym-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	function tampil_pembayaran()
	{
		// $this->db->select('v_pembayaran')
		// 	->from($this->table);
		// $query=$this->db->get_compiled_select();

		// $data['result']=$this->db->query($query)->result();
		// $data['total_data']=$this->db->count_all_results();
		// return $data;
		$this->db->select('*');
    $this->db->from('pembayaran');
    //$this->db->join('produk', 'produk.id_produk = pembayaran.id_produk');
    $this->db->join('sewa', 'sewa.id_sewa = pembayaran.id_sewa');
    // $this->db->join('customer', 'customer.id_customer = pembayaran.id_customer');
    $query=$this->db->get_compiled_select();
    $data['result']=$this->db->query($query)->result();
	$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	

		

	public function detail_pembayaran($id_pembayaran)
	{
		$this->db->select()
			->from($this->table)
			->where("id_pembayaran", $id_pembayaran);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_pembayaran($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('pembayaran');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_pembayaran($data)
	{
		$this->db->where("id_pembayaran", $this->input->post('id_pembayaran'));
		$query=$this->db->set($data)->get_compiled_update('pembayaran');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_pembayaran', $id);
    $this->db->delete('pembayaran');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
	public function tambah_cart($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('cart');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

}

/* End of file m_pembayaran.php */
/* Location: ./application/models/m_pembayaran.php */