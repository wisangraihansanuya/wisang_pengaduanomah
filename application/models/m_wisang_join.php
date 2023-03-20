<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_wisang_join extends CI_Model {

    public function kategori()
    {
        $this->db->select('*');
        $this->db->FROM('sub_kategori');
        $this->db->JOIN('kategori','kategori.id=sub_kategori.id_kategori');
        return $this->db->get();
    }

    public function pengaduan()
    {
        $this->db->select('*');
        $this->db->FROM('pengaduan');
        $this->db->JOIN('masyarakat','pengaduan.id_pengaduan=masyarakat.id');
        // $this->db->JOIN('kategori','kategori.id=id_kategori.sub_kategori');
        return $this->db->get();
    }

    function pengaduanjoin()
    {
        $this->db->select('*');
        $this->db->FROM('pengaduan');
        $this->db->JOIN('kategori','kategori.id=pengaduan.id_kategori');
        return $this->db->get();
    }
    public function listpengaduan()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nama=pengaduan.nama');
        $this->db->join('kategori', 'kategori.id=pengaduan.kategori');
        return $this->db->get();
    }
}