<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login_masyarakat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation', 'upload');
		$this->load->model('m_wisang_join');
	}

	public function index()
	{
		$data['title'] = 'Home Page';
		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		$pengaduan = array(
			'status' => 'pending',
		);
		$this->db->where($pengaduan);
		$pengaduan = $this->db->get('pengaduan')->num_rows();
		$proses = array(
			'status' => 'proses',
		);
		$this->db->where($proses);
		$proses = $this->db->get('pengaduan')->num_rows();
		$selesai = array(
			'status' => 'selesai',
		);
		$this->db->where($selesai);
		$selesai = $this->db->get('pengaduan')->num_rows();

		$data['jumlah'] = array(
			'pengaduan' => $pengaduan,
			'proses' => $proses,
			'selesai' => $selesai,
		);

		$this->load->view('templates/temp_home/header', $data);
		$this->load->view('templates/temp_home/sidebar', $data);
		$this->load->view('templates/temp_home/topbar', $data);
		$this->load->view('home/home', $data);
		$this->load->view('templates/temp_home/footer', $data);
	}

	public function pengaduan()
	{
		$data['title'] = 'Home Page';
		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		$data['pengaduan'] = $this->db->get('pengaduan')->result_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['sub_kategori'] = $this->db->get('sub_kategori')->result_array();
		$data['pengaduanjoin'] = $this->m_wisang_join->pengaduanjoin()->result_array();


		$data['pengaduan'] = $this->m_wisang_join->pengaduan()->result_array();
		$this->load->model('m_wisang_join');

		$this->load->view('templates/temp_home/header', $data);
		$this->load->view('templates/temp_home/sidebar', $data);
		$this->load->view('templates/temp_home/topbar', $data);
		$this->load->view('home/pengaduan', $data);
		$this->load->view('templates/temp_home/footer', $data);
	}

	public function isipengaduan()
	{
		$tgl_pengaduan = $this->input->post('tgl_pengaduan');
		$kategori = $this->input->post('kategori');
		$sub_kategori = $this->input->post('sub_kategori');
		$isi_laporan = $this->input->post('isi_laporan');

		$config['upload_path']          =  './upload/img/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';

		$this->upload->initialize($config);

		$this->upload->do_upload('foto');
		$upload_foto = $this->upload->data('file_name');

		$data = array(
			// 'nik' => $this->input->post('nik'),
			'tgl_pengaduan' => date('Y-m-d'),
			'id_kategori' => $kategori,
			'id_subkategori' => $sub_kategori,
			'isi_laporan' => $isi_laporan,
			'foto' => $upload_foto,
			'id_pengaduan' => $this->input->post('kategori')
		);
		$this->db->insert('pengaduan', $data);
		redirect('C_login_masyarakat/pengaduan');
	}


	public function get_sub_kategori($id_kategori)
	{
		// $id_kategori = $this->input->post(id);
		$sub_kategori = $this->db->get_where('sub_kategori', ['id_kategori' => $id_kategori])->result();
		$data = "<option value=''>Pilih salah satu</option>";
		foreach ($sub_kategori as $value) {
			$data .= "<option value='" . $value->id . "'>" . $value->sub_kategori . "</option>";
		}
		echo $data;

		// echo json_encode($sub_kategori);
	}
	// public function get_sub_kategori()
	// {
	// 	$id_kategori = $this->input->post('id');
	// 	$sub_kategori = $this->db->get_where('sub_kategori', ['id_kategori' => $id_kategori])->result();
	// 	echo json_encode($sub_kategori);
	// }

	// public function laporan_pdf(){

    //     $data['masyarakat'] = $this->db->get_where('masyarakat',['name' => $this->session->userdata('email')])->row_array();
    //     $data['pengaduan']=$this->db->get_where('pengaduan',array('laporan' => $this->session->userdata('laporan')))->result_array();
    
    //     $this->load->library('pdf');
    
    //     $this->pdf->setPaper('A4', 'potrait');
    //     $this->pdf->filename = "laporan-petanikode.pdf";
    //     $this->pdf->load_view('laporan_pdf', $data);
    
    
    // }
}
