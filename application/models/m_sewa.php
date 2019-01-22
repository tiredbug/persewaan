<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_sewa extends CI_Model {

	public $table='sewa';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(sewa.id_sewa,4) as kode', FALSE);
		  $this->db->order_by('id_sewa','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('sewa');      //cek dulu apakah ada sudah ada kode di tabel.    
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

	public function hitung($id_harga)
	{
		$this->db->select('harga')
			->from('harga')
			->where('id_harga',$id_harga);
		$query=$this->db->get();
		return  $query->row();
	}

	public function tampil_sewa()
	{
	$this->db->select('*');
    $this->db->from('sewa');
    $this->db->join('karyawan', 'karyawan.id_karyawan = sewa.id_karyawan');
    $this->db->join('customer', 'customer.id_customer = sewa.id_customer');
    $query=$this->db->get_compiled_select();
    $data['result']=$this->db->query($query)->result();
	$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	
	public function detail_sewa($id_sewa)
	{
		$this->db->select()
			->from($this->table)
			->where("id_sewa", $id_sewa);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_sewa($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('sewa');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_sewa($data)
	{
		$this->db->where("id_sewa", $this->input->post('id_sewa'));
		$query=$this->db->set($data)->get_compiled_update('sewa');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_sewa', $id);
    $this->db->delete('sewa');
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

/* End of file m_sewa.php */
/* Location: ./application/models/m_sewa.php */