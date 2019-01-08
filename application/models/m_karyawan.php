<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_karyawan extends CI_Model {

	public $table='karyawan';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(karyawan.id_karyawan,4) as kode', FALSE);
		  $this->db->order_by('id_karyawan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('karyawan');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "KY-$ym-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tampil_karyawan()
	{
		$this->db->select(["id_karyawan", "nama","id_user","alamat","no_hp","jabatan"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function tampil_karyawan_pilihan()
	{
		$this->db->select(["id_karyawan", "nama"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function detail_karyawan($id_karyawan)
	{
		$this->db->select()
			->from($this->table)
			->where("id_karyawan", $id_karyawan);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_karyawan($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('karyawan');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_karyawan($data)
	{
		$this->db->where("id_karyawan", $this->input->post('id_karyawan'));
		$query=$this->db->set($data)->get_compiled_update('karyawan');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_karyawan', $id);
    $this->db->delete('karyawan');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
}

/* End of file m_karyawan.php */
/* Location: ./application/models/m_karyawan.php */