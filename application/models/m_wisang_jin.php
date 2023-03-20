<?php
class m_wisang_jin extends CI_Model
{

    public function userAccess()
    {
        return $this->db->get('masyarakat');
        $user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function tipeKamar()
    {
        return $this->db->get('pengaduan');
    }
    public function sub_pengaduan($data)
    {
        $this->db->insert('pengaduan', $data);
    }

    function insertPetugas($tambahPetugas)
    {
        $this->db->insert('petugas', $tambahPetugas);
    }
    function insertAdmin($tambahAdmin)
    {
        $this->db->insert('petugas', $tambahAdmin);
    }
    public function tambahKamar($add)
    {
        $this->db->insert('pengaduan', $add);
    }
    function getRiwayat()
    {
        $user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->select('*');
        $this->db->from('pengaduan');
        // $this->db->join('sub_kategori','sub_kategori.id=sub_kategori.id_subkategori');
        $this->db->join('kategori', 'kategori.id=sub_kategori.id_kategori');
        $this->db->where('nik', $user['nik']);
        return $this->db->get()->result_array();
        // return $this->db->get('pengaduan')->result_array();
    }
    function insertPengaduan($fungsi_tambah)
    {
        $this->db->insert('pengaduan', $fungsi_tambah);
    }

    // Join Pengaduan
    function join_pengaduan()
    {
        // $user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->select('*');
        $this->db->from('masyarakat');
        $this->db->join('pengaduan', 'pengaduan.nik=masyarakat.nik');
        return $this->db->get();
    }
    function getRiwayatAdmin()
    {
        return $this->db->get('pengaduan')->result_array();
        // $user = $this->db->get_where('masyarakat',['username'=>$this->session->userdata('username')])->row_array();
        // $this->db->select('*');
        // $this->db->from('pengaduan');
        // $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        // $this->db->join('sub_kategori', 'sub_kategori.sub_kategori=pengaduan.sub_kategori');
        // $this->db->join('kategori', 'kategori.kategori=pengaduan.kategori');
        // return $this->db->get();
    }

    function Proses1($id)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        $this->db->join('sub_kategori', 'sub_kategori.id_subkategori=pengaduan.sub_kategori');
        $this->db->join('kategori', 'kategori.id_kategori=sub_kategori.id_kategori');
        $this->db->where('id_pengaduan', $id);
        return $this->db->get()->row_array();
    }

    function prosesTanggapan($id)
    {
        $this->db->select('*');
        $this->db->from('tanggapan');
        $this->db->join('petugas', 'petugas.id_petugas=tanggapan.id_petugas');
        $this->db->where('id_pengaduan', $id);
        return $this->db->get()->result_array();
    }
    function petugasData($username)
    {
        return $this->db->get_where('petugas', ['username' => $username]);
    }
    function updateSelesai($id_pengaduan, $update)
    {
        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->update('pengaduan', $update);
    }




}
