<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class petugasaset extends CI_Controller {

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
		if ( ! $this->session->userdata('id_jabatan') OR $this->session->userdata('nama_jabatan') != 'Petugas Aset')
		{
			redirect('home');
		}
	}

	public function index()
	{	if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$data1['tabel'] = $this->m_user->tabel("tidak");
		$data['content'] = $this->load->view('petugasaset/index', $data1, true);
        $this->load->view('template', $data);
        }
		else redirect ("home");

	}
	
	public function cetak(){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$data1['tabel'] = $this->m_user->tabel("tidak");
		$data['content'] =$this->load->view('petugasaset/print', $data1, true);
        $this->load->view('template', $data);
        }
		else redirect ("home");
	}

	public function insert($error=""){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$data1['barang'] = $this->m_user->tabel_brg();
		$data1['lokasi'] = $this->m_user->tabel_lokasi();
		$data['content'] = $this->load->view('petugasaset/input', $data1, true);
		if($error!="")$data ['error'] = $error;
        $this->load->view('template', $data);
	}
		else redirect ("home");
	}

	public function proses_insert(){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$k_barang = $this->input->post('kodebarang');
		$nama = $this->input->post('namabarang');
		$k_baik= $this->input->post('keadaanbarang');
		$lokasi= $this->input->post('idlokasi');
		$keterangan= $this->input->post('keterangan');
		if($this->m_user->get_aset($k_barang)>0) redirect ('petugasaset/insert/error');
		else{
			$this->m_user->insert($k_barang,$nama,$k_baik,$lokasi,$keterangan);
			redirect('petugasaset');
			}
	}
		else redirect ("home");
	}

	public function edit($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$data1['id'] = $id;
		$data1['barang'] = $this->m_user->tabel_barang();
		$data1['lokasi'] = $this->m_user->tabel_lokasi();
		$data1['row'] = $this->m_user->edit($id);
		$data['content'] = $this->load->view('petugasaset/edit', $data1, true);
        $this->load->view('template', $data);	
	}
		else redirect ("home");
	}

	public function proses_edit($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$k_barang = $this->input->post('kodebarang');
		$nama = $this->input->post('namabarang');
		$k_baik= $this->input->post('keadaanbarang');
		$lokasi= $this->input->post('idlokasi');
		$keterangan= $this->input->post('keterangan');
		$this->m_user->edit_proses($k_barang,$nama,$k_baik,$lokasi,$keterangan);
		redirect('petugasaset');
	}
		else redirect ("home");
	}

	public function delete($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$this->m_user->delete($id);
		redirect('petugasaset');
		}
		else redirect ("home");
	}
//=======================================================================================================
	public function riwayat()
	{	if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$data1['tabel'] = $this->m_user->tabel("ya");
		$data['content'] = $this->load->view('petugasaset/riwayat', $data1, true);
        $this->load->view('template', $data);
        }
		else redirect ("home");

	}
//=======================================================================================================
	public function memo_aset()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$data1['tabel'] = $this->m_user->tabel_memo();
		$data['content'] = $this->load->view('petugasaset/memo_aset', $data1, true);
        $this->load->view('template', $data);
    }
		else redirect ("home");
    }
//===============================================================================================
    public function pinjam()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$data1['tabel'] = $this->m_user->pinjam();
		
		$data['content'] = $this->load->view('petugasaset/pinjam', $data1, true);
        $this->load->view('template', $data);
        }
		else redirect ("home");
	}

    public function insert_pinjam(){
    	if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$data1['nama'] = $this->m_user->tabel_pegawai();
		$data1['barang'] = $this->m_user->tabel_barang();
		$data['content'] = $this->load->view('petugasaset/pinjam_input',$data1, true);
        $this->load->view('template', $data);
	}
		else redirect ("home");
	}

	public function proses_insert_pinjam(){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$n_peminjam = $this->input->post('namapeminjam');
		$n_barang = $this->input->post('namabarang');
		$this->m_user->insert_pinjam($n_peminjam,$n_barang);
		redirect('petugasaset/pinjam');
	}
		else redirect ("home");
	}

	public function edit_pinjaman($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$data1['id'] = $id;
		$data1['nama'] = $this->m_user->tabel_pegawai();
		$data1['barang'] = $this->m_user->tabel_barang();
		$data1['row'] = $this->m_user->edit_pinjam($id);
		$data['content'] = $this->load->view('petugasaset/pinjam_edit', $data1, true);
        $this->load->view('template', $data);	
	}
		else redirect ("home");
	}
	
	public function edit_kembalian($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$this->m_user->edit_proses_kembali($id);
		redirect('petugasaset/pinjam');
	}
		else redirect ("home");
	}


	public function proses_edit_pinjam($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$n_peminjam = $this->input->post('namapeminjam');
		$n_barang = $this->input->post('namabarang');
		$tgl_pinjam = $this->input->post('tanggalpinjam');
		$tgl_kembali = $this->input->post('tanggalkembali');
		$wkt_pinjam = $this->input->post('waktupinjam');
		$wkt_kembali = $this->input->post('waktukembali');
		$this->m_user->edit_proses_pinjam($n_peminjam,$n_barang,$tgl_pinjam,$tgl_kembali,$wkt_pinjam,$wkt_kembali,$id);
		redirect('petugasaset/pinjam');
	}
		else redirect ("home");
	}

	public function delete_pinjam($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$this->m_user->delete_pinjam($id);
		redirect('petugasaset/pinjam');
	}
		else redirect ("home");
	}
//==========================================================
	public function cari_peminjam()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		if($this->input->post('cari')=="namapeminjam")
		{
			$data1['tabel']=$this->m_user->cari_peminjam($this->input->post('peminjam'));
		}
		elseif ($this->input->post('cari')=="namabarang") {
			$data1['tabel']=$this->m_user->cari_barang($this->input->post('peminjam'));
		}
		$data['content'] = $this->load->view('petugasaset/pinjam', $data1, true);
        $this->load->view('template', $data);
	}
		else redirect ("home");
	}
	
	public function cari_aset()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==4){
		$nama = $this->input->post('aset');
		$data1['tabel'] = $this->m_user->cari_aset($nama);

		$data['content'] = $this->load->view('petugasaset/index', $data1, true);
        $this->load->view('template', $data);
	}
		else redirect ("home");
	}

}

/* End of file Kepala_UPTB.php */
/* Location: ./application/controllers/Kepala_UPTB.php */