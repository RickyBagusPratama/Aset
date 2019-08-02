<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

function login($uname, $pass)
	{
		$query = "
			select
				j.id_jabatan, j.nama_jabatan, u.username
			from
				user u, jabatan j
			where
				u.username = '$uname' and password = '$pass'
				and u.id_jabatan = j.id_jabatan
		";

		return $this->db->query($query);
	}

function check_login($username, $password) {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $query = $this->db->get("user");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data_ambil['login'] = 'ada';
                $data_ambil['username'] = $row->username;
                $data_ambil['type'] = $row->id_jabatan;
                $this->session->set_userdata($data_ambil);
            }
            return true;
            //header('location:'.base_url().'');
        } else {
            return false;
        }
    }
//===================================================================================
function tabel($terhapus)
	{
		$query = $this->db->query('select * from aset where terhapus = "'.$terhapus.'" ORDER BY namabarang ASC');
		return $query->result();
	}	


function insert($k_barang,$nama,$k_baik,$lokasi,$keterangan){
		$query = $this->db->query("INSERT INTO  `yakinyakin`.`aset` (
`kodebarang` ,
`namabarang` ,
`keadaanbarang` ,
`idlokasi` ,
`keterangan`
)
VALUES (
	 '$k_barang', '$nama', '$k_baik',  '$lokasi',  '$keterangan')");
		return true;
	}	

function get_aset($k_barang){
	$this->db->where("kodebarang",$k_barang);
	$data=$this->db->get ("aset");
	return $data->num_rows();
}

function edit($id){
		$query = $this->db->query("select * from aset where kodebarang='$id'");
		return $query->row();
	}

function edit_proses($k_barang,$nama,$k_baik,$lokasi,$keterangan){
		$data = array(
			'kodebarang' => $k_barang,
            'namabarang' => $nama,
            'keadaanbarang'=>$k_baik,
          	'idlokasi' => $lokasi,
            'keterangan' => $keterangan          
        );
        $this->db->where('kodebarang', $k_barang);
        $this->db->update('aset', $data);
        return true;
	}

function delete($id){
		$query = $this->db->query("update aset set terhapus = 'ya' where kodebarang='$id'");
		return true;
	}
//==========================================================================================================
function pinjam()
	{
		$query = $this->db->query('select p.*,b.namabarang from peminjaman p join barang b on (p.kodebarang=b.kodebarang) ORDER BY ID_PEMINJAM DESC');
		return $query->result();
	}
	
function insert_pinjam($n_peminjam,$n_barang){
		$query = $this->db->query("INSERT INTO  `yakinyakin`.`peminjaman` (
`id_peminjam` ,
`namapeminjam` ,
`kodebarang` ,
`tanggalpinjam`,
`waktupinjam`,
`tanggalkembali`,
`waktukembali`
)
VALUES (
NULL ,  '$n_peminjam', '$n_barang',  CURDATE(), CURTIME(), '0000-00-00', '00:00:00')");
		return true;
	}	

function edit_pinjam($id){
		$query = $this->db->query("select * from peminjaman where id_peminjam='$id'");
		return $query->row();
	}

function edit_proses_kembali($id){
		$this->db->query("UPDATE  `yakinyakin`.`peminjaman` SET  `tanggalkembali` =  CURDATE() , `waktukembali` =  CURTIME()  WHERE  `peminjaman`.`id_peminjam` 
			='$id'");
		return true;
	}		


function edit_proses_pinjam($n_peminjam,$n_barang,$tgl_pinjam,$tgl_kembali,$wkt_pinjam,$wkt_kembali,$id){
		$data = array(
            'namapeminjam' => $n_peminjam,
            'kodebarang' => $n_barang,
            'tanggalpinjam' => $tgl_pinjam,
          	'tanggalkembali' => $tgl_kembali,
            'waktupinjam' => $wkt_pinjam,
            'waktukembali' => $wkt_kembali          
        );
        $this->db->where('id_peminjam', $id);
        $this->db->update('peminjaman', $data);
        return true;
	}		

function delete_pinjam($id){
		$query = $this->db->query("delete from peminjaman where id_peminjam='$id'");
		return true;
	}

function count_pinjam($id_pegawai){
	$query = $this->db->query("select pe.idpegawai from peminjaman p join pegawai pe on (p.namapeminjam=pe.pegawai) where p.tanggalkembali='0000-00-00' and pe.idpegawai=".$id_pegawai);
	return $query->num_rows();
}

//===============================================================================================

function tabel_memo()
	{
		$query = $this->db->query('select * from memo ORDER BY ID_MEMO DESC');
		return $query->result();
	}

function proses_insert_memo($tanggal, $memo){
		$query = $this->db->query("INSERT INTO  `yakinyakin`.`memo` (
`tanggal` ,
`memo` 
)
VALUES (
 '$tanggal', '$memo')");
		return true;
	}

function edit_memo($id){
		$query = $this->db->query("select * from memo where id_memo='$id'");
		return $query->row();
	}	

function edit_proses_memo($tgl_memo,$isi_memo,$id){
		$data = array(
			'tanggal' => $tgl_memo,
            'memo' => $isi_memo,     
        );
        $this->db->where('id_memo', $id);
        $this->db->update('memo', $data);
        return true;
	}

function delete_memo($id){
		$query = $this->db->query("delete from memo where id_memo='$id'");
		return true;
	}

//====================================================
public function cari_peminjam($cari)
	{
		$this->db->like('namapeminjam',$cari);
		$this->db->select(' p.*, b.namabarang from peminjaman p join barang b on (p.kodebarang=b.kodebarang)');				
		$res = $this->db->get();
		return $res->result();
	}

public function cari_barang($cari)
	{
		$res = $this->db->select(' p.*,b.namabarang from peminjaman p join barang b on (p.kodebarang=b.kodebarang) where b.namabarang 
			like "%'.$cari.'%"');				
		$res = $this->db->get();
		return $res->result();
	}
function cari_aset($nama)
	{
		$this->db->like('namabarang', $nama);
		$res = $this->db->get('aset');				

		return $res->result();
	}
//----------------------------------------------------------------------------------------------------------------------------
function tabel_barang()
	{
		$query = $this->db->query('select * from barang ORDER BY kodebarang DESC');
		return $query->result();
	}

function tabel_brg()
	{
		$query = $this->db->query('select * from barang where kodebarang not in (select kodebarang from aset) ORDER BY kodebarang DESC');
		return $query->result();
	}

function proses_insert_barang($kodebarang, $namabarang){
		$query = $this->db->query("INSERT INTO  `yakinyakin`.`barang` (
`kodebarang` ,
`namabarang` 
)
VALUES (
 '$kodebarang', '$namabarang')");
		return true;
	}


function edit_barang($id){
		$query = $this->db->query("select * from barang where kodebarang='$id'");
		return $query->row();
	}	

function edit_proses_barang($kd_barang,$nama_barang,$id){
		$data = array(
			'kodebarang' => $kd_barang,
            'namabarang' => $nama_barang,     
        );
        $this->db->where('kodebarang', $id);
        $this->db->update('barang', $data);
        return true;
	}

function delete_barang($id){
		$query = $this->db->query("delete from barang where kodebarang='$id'");
		return true;
	}
//--------------------------------------------------------------------------------------------------------------------------------------------

function tabel_lokasi()
	{
		$query = $this->db->query('select * from lokasi ORDER BY idlokasi DESC');
		return $query->result();
	}

function proses_insert_lokasi($id_lokasi, $lokasi){
		$query = $this->db->query("INSERT INTO  `yakinyakin`.`lokasi` (
`idlokasi` ,
`lokasi` 
)
VALUES (
 '$id_lokasi', '$lokasi')");
		return true;
	}


function edit_lokasi($id){
		$query = $this->db->query("select * from lokasi where idlokasi='$id'");
		return $query->row();
	}	

function edit_proses_lokasi($id_lokasi,$lokasi,$id){
		$data = array(
			'idlokasi' => $id_lokasi,
            'lokasi' => $lokasi     
        );
        $this->db->where('idlokasi', $id);
        $this->db->update('lokasi', $data);
        return true;
	}

function delete_lokasi($id){
		$query = $this->db->query("delete from lokasi where idlokasi='$id'");
		return true;
	}

//---------------------------------------------------------------------------------------------------------------------------------------

function tabel_pegawai()
	{
		$query = $this->db->query('select * from pegawai ORDER BY idpegawai DESC');
		return $query->result();
	}

function proses_insert_pegawai($id_pegawai, $pegawai,$alamat,$nohape){
		$query = $this->db->query("INSERT INTO  `yakinyakin`.`pegawai` (
`idpegawai` ,
`pegawai` ,
`alamat` ,
`nohape` 
)
VALUES (
 '$id_pegawai', '$pegawai', '$alamat', '$nohape')");
		return true;
	}


function edit_pegawai($id){
		$query = $this->db->query("select * from pegawai where idpegawai='$id'");
		return $query->row();
	}	


function edit_proses_pegawai($id_pegawai,$pegawai,$alamat,$nohape,$id){
		$data = array(
			'idpegawai' => $id_pegawai,
            'pegawai' => $pegawai,
            'alamat' => $alamat,
            'nohape' => $nohape,      
        );
        $this->db->where('idpegawai', $id);
        $this->db->update('pegawai', $data);
        return true;
	}

function delete_pegawai($id){
		$query = $this->db->query("delete from pegawai where idpegawai='$id'");
		return true;
	}
//========================================================================================================
function terpinjam()
	{
		$query = $this->db->query('select p.*,b.namabarang from peminjaman p join barang b on (p.kodebarang=b.kodebarang) where tanggalkembali="0000-00-00" ORDER BY ID_PEMINJAM DESC');
		return $query->result();
	}

function tersedia()
	{
		$query = $this->db->query('SELECT namabarang, count(kodebarang) jumlah
									FROM barang
									where kodebarang not in (select kodebarang from peminjaman where tanggalkembali = "0000-00-00" )
									group by namabarang ORDER BY namabarang ASC');
		return $query->result();
	}

}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */