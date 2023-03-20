<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login_petugas extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Petugas Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['bar_graph'] = array(
            'pengaduan' => $this->db->get('pengaduan')->num_rows(),
            // 'status' => $this->db->get_where('petugas', ['pengaduan' => 'proses'])->num_rows(),
            // 'status' => $this->db->get_where('petugas', ['pengaduan' => 'selesai'])->num_rows(),
        );

        $this->load->view('templates/temp_home_petugas/header', $data);
        $this->load->view('templates/temp_home_petugas/topbar', $data);
        $this->load->view('templates/temp_home_petugas/sidebar', $data);
        $this->load->view('home_petugas/home', $data);
        $this->load->view('templates/temp_home_petugas/footer', $data);
    }

    public function kategori()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $this->load->model('m_wisang_kategori');
        $data['sub_kategori'] = $this->m_wisang_kategori->kategori()->result_array();
        $this->load->model('m_wisang_kategori');

        $this->load->view('templates/temp_home_petugas/header', $data);
        $this->load->view('templates/temp_home_petugas/topbar', $data);
        $this->load->view('templates/temp_home_petugas/sidebar', $data);
        $this->load->view('home_petugas/wisang_kategori', $data);
        $this->load->view('templates/temp_home_petugas/footer', $data);
    }

    public function masyarakat()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['masyarakat'] = $this->db->get('masyarakat')->result_array();

        $this->load->view('templates/temp_home_petugas/header', $data);
        $this->load->view('templates/temp_home_petugas/topbar', $data);
        $this->load->view('templates/temp_home_petugas/sidebar', $data);
        $this->load->view('home_petugas/wisang_masyarakat', $data);
        $this->load->view('templates/temp_home_petugas/footer', $data);
    }

    public function petugas()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->db->get('petugas')->result_array();

        $this->load->view('templates/temp_home_petugas/header', $data);
        $this->load->view('templates/temp_home_petugas/topbar', $data);
        $this->load->view('templates/temp_home_petugas/sidebar', $data);
        $this->load->view('home_petugas/wisang_petugas', $data);
        $this->load->view('templates/temp_home_petugas/footer', $data);
    }

    public function pengaduan()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();

        $this->load->view('templates/temp_home_petugas/header', $data);
        $this->load->view('templates/temp_home_petugas/topbar', $data);
        $this->load->view('templates/temp_home_petugas/sidebar', $data);
        $this->load->view('home_petugas/wisang_pengaduan', $data);
        $this->load->view('templates/temp_home_petugas/footer', $data);
    }

    public function laporan()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->db->get('petugas')->result_array();

        $this->load->view('templates/temp_home_petugas/header', $data);
        $this->load->view('templates/temp_home_petugas/topbar', $data);
        $this->load->view('templates/temp_home_petugas/sidebar', $data);
        $this->load->view('home_petugas/wisang_petugas', $data);
        $this->load->view('templates/temp_home_petugas/footer', $data);
    }
}
