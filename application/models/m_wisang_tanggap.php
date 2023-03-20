<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_wisang_tanggap extends CI_Model
{
	public function userData($username)
	{
		return $this->db->get_where('petugas', ['username' => $username]);
	}

	// kategori
	public function kategori()
	{
		return $this->db->get('kategori');
	}

	public function editKategori($update)
	{
		$this->db->update('kategori', $update);
	}


	public function tambahKategori($add)
	{
		$this->db->insert('kategori', $add);
	}

	public function subkategori()
	{
		return $this->db->get('subkategori');
	}

	public function tambahSub($add)
	{
		$this->db->insert('subkategori', $add);
	}

	public function editSub($update)
	{

		$this->db->update('subkategori', $update);
	}

	// masyarakat
	public function masyarakat()
	{
		return $this->db->get('masyarakat');
	}

	// petugas
	public function petugas()
	{
		return $this->db->get('petugas');
	}
	public function get_petugas()
	{
		return $this->db->get_where('petugas',['level'=>'petugas']);
	}

	public function get_admin()
	{
		return $this->db->get_where('petugas',['level'=>'admin']);
	}

	// pengaduan
	public function tambahTindakan($add)
	{
		$this->db->insert('tanggapan', $add);
	}

    function tanggapan($id)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        $this->db->join('kategori', 'kategori.id=pengaduan.kategori');
        $this->db->join('subkategori', 'subkategori.subkategori_id=pengaduan.subkategori');
        $this->db->where('id_pengaduan', $id);
        return  $this->db->get();
    }

    public function tanggapanPetugas($id)
    {
        $this->db->select('*');
        $this->db->from('tanggapan');
        $this->db->join('petugas', 'petugas.id_petugas=tanggapan.id_petugas');
        $this->db->where('id_pengaduan', $id);
        return  $this->db->get();
    }
}