<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_wisang_pengaduan extends CI_Model {

    function pengaduan()
    {
        $this->db->select('*');
        $this->db->FROM('pengaduan');
        $this->db->JOIN('masyarakat','pengaduan.id_pengaduan=masyarakat.id');
        return $this->db->get();
    }

    function join1()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id_kategori=pengaduan.id_kategori');
        return $this->db->get();
    }

    function pengaduan2()
    {
        return $this->db->get('pengaduan');
    }

    function join_pengaduandata()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('sub_kategori', 'sub_kategori.sub_kategori=pengaduan.sub_kategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        return $this->db->get();
    }

    function add_pengaduan($id)
    {
        $this->db->select('*');
        $this->db->from('tanggapan');
        $this->db->join('pengaduan', 'pengaduan.id_pengaduan=tanggapan.id_pengaduan');
        $this->db->join('petugas', 'petugas.nama_petugas=tanggapan.nama_petugas');
        $this->db->where('pengaduan.id_pengaduan', $id);
        return $this->db->get();
    }

    

    function insertPengaduan($tambahPengaduan)
    {
        $this->db->insert('pengaduan', $tambahPengaduan);
    }

    

    function joinpengaduan2($id)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('sub_kategori', 'sub_kategori.sub_kategori=pengaduan.sub_kategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        $this->db->where('id_pengaduan', $id);
        return $this->db->get();
    }

    function tanggapan($id)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('tanggapan', 'tanggapan.id_pengaduan=pengaduan.id_pengaduan');
        $this->db->where('id_tanggapan', $id);
        return $this->db->get();
    }

    function sub_pengaduan($data)
    {
        $this->db->insert('pengaduan',$data);
    }



    function joinjo()
    {
        $this->db->select('*');
        $this->db->FROM('pengaduan');
        $this->db->JOIN('kategori','kategori.id_kategori=pengaduan.id_kategori');
        return $this->db->get();
    }

    function joinji()
    {
        $this->db->select('*');
        $this->db->FROM('pengaduan');
        $this->db->JOIN('sub_kategori','sub_kategori.id_kategori=pengaduan.sub_kategori');
        return $this->db->get();
    }
}