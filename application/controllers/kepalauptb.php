<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kepalauptb extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}


	/*
	 * Fungsi cek
	 *
	 * Fungsinya buat seleksi dia udah login apa nggk,
	 * kalo beloman dan bukan jabatannya, out
	 */
	public function _cek()
	{
		if ( ! $this->session->userdata('id_jabatan') OR $this->session->userdata('nama_jabatan') != 'Kepala UPTB')
		{
			redirect('home');
		}
	}
//======================================================================================================
	public function index()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
		$data1['tabel'] = $this->m_user->tabel("tidak");
		$data['content'] = $this->load->view('kepalauptb/index', $data1, true);
        $this->load->view('template', $data);
	}
		else redirect ("home");
	}
//======================================================================================================
	public function insert_memo(){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
			$data['content'] = $this->load->view('kepalauptb/input_memo', "", true);
        	$this->load->view('template', $data);
		}
		else redirect ("home");
	}	

	public function proses_insert_memo(){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
		$tanggal = $this->input->post('tanggal');
		$memo = $this->input->post('memo');
		$this->m_user->proses_insert_memo($tanggal, $memo);
		redirect('kepalauptb/memo');
		}
		else redirect ("home");
	}

	public function delete($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
		$this->m_user->delete_memo($id);
		redirect('kepalauptb/memo');
		}
		else redirect ("home");
	}


	public function memo()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
		$data1['tabel'] = $this->m_user->tabel_memo();
		$data['content'] = $this->load->view('kepalauptb/memo', $data1, true);
        $this->load->view('template', $data);
	}
		else redirect ("home");
	}


	public function memo_edit($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
		$data1['id'] = $id;
		$data1['row'] = $this->m_user->edit_memo($id);
		$data['content'] = $this->load->view('kepalauptb/memo_edit', $data1, true);
        $this->load->view('template', $data);	
	}
		else redirect ("home");
	}


	public function edit_proses_memo($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
		$tgl_memo = $this->input->post('tanggal');
		$isi_memo = $this->input->post('memo');
		$this->m_user->edit_proses_memo($tgl_memo,$isi_memo,$id);
		redirect('kepalauptb/memo');
	}
		else redirect ("home");
	}
//=====================================================================================================
	public function pinjam_k_uptb()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
		$data1['tabel'] = $this->m_user->pinjam();
		$data['content'] = $this->load->view('kepalauptb/pinjam_k_uptb', $data1, true);
        $this->load->view('template', $data);
    }
		else redirect ("home");
    }

    public function cari_peminjam()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
		$nama = $this->input->post('peminjam');
		$data1['tabel'] = $this->m_user->cari_peminjam($nama);

		$data['content'] = $this->load->view('kepalauptb/pinjam_k_uptb', $data1, true);
        $this->load->view('template', $data);
	}
		else redirect ("home");
	}
//==================================================================================================
	public function pegawai_k_uptb()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
		$data1['tabel'] = $this->m_user->tabel_pegawai();
		$data['content'] = $this->load->view('kepalauptb/pegawai_k_uptb', $data1, true);
        $this->load->view('template', $data);
	}
		else redirect ("home");
	}

//=========================================================================================
	public function terpinjam()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
		$data1['tabel'] = $this->m_user->terpinjam();
		$data['content'] = $this->load->view('kepalauptb/terpinjam', $data1, true);
  	    $this->load->view('template', $data);
  	    }
		else redirect ("home");
	}

	public function tersedia()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
		$data1['tabel'] = $this->m_user->tersedia();
		$data['content'] = $this->load->view('kepalauptb/tersedia', $data1, true);
  	    $this->load->view('template', $data);
  	    }
		else redirect ("home");
	}
//=========================================================================================
public function riwayat_k_uptb()
	{	if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
		$data1['tabel'] = $this->m_user->tabel("ya");
		$data['content'] = $this->load->view('kepalauptb/riwayat_k_uptb', $data1, true);
        $this->load->view('template', $data);
        }
		else redirect ("home");

	}
//==========================================================================================
	public function cari_peminjam_k_uptb()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
		if($this->input->post('cari')=="namapeminjam")
		{
			$data1['tabel']=$this->m_user->cari_peminjam($this->input->post('peminjam'),0);
		}
		elseif ($this->input->post('cari')=="namabarang") {
				$data1['tabel']=$this->m_user->cari_barang($this->input->post('peminjam'),0);
		}
		$data['content'] = $this->load->view('kepalauptb/pinjam_k_uptb', $data1, true);
        $this->load->view('template', $data);
		}
		else redirect ("home");
	}
	
	public function cari_aset_k_uptb()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==1){
		$nama = $this->input->post('aset');
		$data1['tabel'] = $this->m_user->cari_aset($nama);

		$data['content'] = $this->load->view('kepalauptb/index', $data1, true);
        $this->load->view('template', $data);
	}
		else redirect ("home");
	}
}

/* End of file Kepala_UPTB.php */
/* Location: ./application/controllers/Kepala_UPTB.php */