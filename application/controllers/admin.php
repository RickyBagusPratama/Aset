<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

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
		if ( ! $this->session->userdata('id_jabatan') OR $this->session->userdata('nama_jabatan') != 'admin')
		{
			redirect('home');
		}
	}

	public function index()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$data1['tabel'] = $this->m_user->tabel_barang();
		$data['content'] = $this->load->view('admin/index', $data1, true);
        $this->load->view('template', $data);
        }
		else redirect ("home");
	}

	public function insert_barang(){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$data['content'] = $this->load->view('admin/input_barang', "", true);
        $this->load->view('template', $data);
        }
		else redirect ("home");
	}

	public function proses_insert_barang(){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$kodebarang = $this->input->post('kodebarang');
		$namabarang = $this->input->post('namabarang');
		$this->m_user->proses_insert_barang($kodebarang, $namabarang);
		redirect('admin');
		}
		else redirect ("home");
	}

	public function barang_edit($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$data1['id'] = $id;
		$data1['row'] = $this->m_user->edit_barang($id);
		$data['content'] = $this->load->view('admin/barang_edit', $data1, true);
        $this->load->view('template', $data);
        }
		else redirect ("home");	
	}


	public function edit_proses_barang($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$kd_barang = $this->input->post('kodebarang');
		$nama_barang = $this->input->post('namabarang');
		$this->m_user->edit_proses_barang($kd_barang,$nama_barang,$id);
		redirect('admin');
		}
		else redirect ("home");
	}

	public function delete($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$this->m_user->delete_barang($id);
		redirect('admin');
		}
		else redirect ("home");
		
	}

	/*public function barang()
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$data1['tabel'] = $this->m_user->tabel_barang();
		$data['content'] = $this->load->view('admin/barang', $data1, true);
        $this->load->view('template', $data);
        }
		else redirect ("home");
	}*/

//-----------------------------------------------------------------------------------------------------------------------------------------
	public function insert_lokasi(){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$data['content'] = $this->load->view('admin/input_lokasi', "", true);
        $this->load->view('template', $data);
        }
		else redirect ("home");
	}

	public function proses_insert_lokasi(){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$idlokasi = $this->input->post('idlokasi');
		$lokasi = $this->input->post('lokasi');
		$this->m_user->proses_insert_lokasi($idlokasi, $lokasi);
		redirect('admin/lokasi');
		}
		else redirect ("home");
	}

	public function lokasi_edit($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$data1['id'] = $id;
		$data1['row'] = $this->m_user->edit_lokasi($id);
		$data['content'] = $this->load->view('admin/lokasi_edit', $data1, true);
        $this->load->view('template', $data);
        }
		else redirect ("home");	
	}


	public function edit_proses_lokasi($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$id_lokasi = $this->input->post('idlokasi');
		$lokasi = $this->input->post('lokasi');
		$this->m_user->edit_proses_lokasi($id_lokasi,$lokasi,$id);
		redirect('admin/lokasi');
		}
		else redirect ("home");
	}

	public function delete_lokasi($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$this->m_user->delete_lokasi($id);
		redirect('admin/lokasi');
		}
		else redirect ("home");
		
	}

	public function lokasi()
	{	if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$data1['tabel'] = $this->m_user->tabel_lokasi();
		$data['content'] = $this->load->view('admin/lokasi', $data1, true);
        $this->load->view('template', $data);
        }
		else redirect ("home");
	}

//-----------------------------------------------------------------------------------------------------------------------------------------

	public function insert_pegawai(){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$data['content'] = $this->load->view('admin/input_pegawai', "", true);
        $this->load->view('template', $data);
        }
		else redirect ("home");
	}

	public function proses_insert_pegawai(){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$idpegawai = $this->input->post('idpegawai');
		$pegawai = $this->input->post('pegawai');
		$alamat = $this->input->post('alamat');
		$nohape = $this->input->post('nohape');
		$this->m_user->proses_insert_pegawai($idpegawai,$pegawai,$alamat,$nohape);
		redirect('admin/pegawai');
		}
		else redirect ("home");
	}

	public function pegawai_edit($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$data1['id'] = $id;
		$data1['row'] = $this->m_user->edit_pegawai($id);
		$data['content'] = $this->load->view('admin/pegawai_edit', $data1, true);
        $this->load->view('template', $data);
        }
		else redirect ("home");	
	}


	public function edit_proses_pegawai($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		$id_pegawai = $this->input->post('idpegawai');
		$pegawai = $this->input->post('pegawai');
		$alamat = $this->input->post('alamat');
		$nohape = $this->input->post('nohape');
		$this->m_user->edit_proses_pegawai($id_pegawai,$pegawai,$alamat,$nohape,$id);
		redirect('admin/pegawai');
		}
		else redirect ("home");
	}
	
	public function delete_pegawai($id){
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
		if($this->m_user->count_pinjam($id)<=0){
			$this->m_user->delete_pegawai($id);
			redirect('admin/pegawai');
			}
		else redirect('admin/pegawai/pinjam');
		}
		else redirect ("home");
	}

	public function pegawai($kembali="")
	{
		if($this->session->userdata("login")=="ada" && $this->session->userdata("type")==5){
			if ($kembali!="") $data['error'] = $kembali;
			$data1['tabel'] = $this->m_user->tabel_pegawai();
			$data['content'] = $this->load->view('admin/pegawai', $data1, true);
        	$this->load->view('template', $data);
		}
		else redirect ("home");
	}	

}

/* End of file Kepala_UPTB.php */
/* Location: ./application/controllers/Kepala_UPTB.php */