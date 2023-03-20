<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_login_admin extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Admin Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
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

        $this->load->view('templates/temp_home_admin/header', $data);
        $this->load->view('templates/temp_home_admin/topbar', $data);
        $this->load->view('templates/temp_home_admin/sidebar', $data);
        $this->load->view('home_admin/home_admin', $data);
        $this->load->view('templates/temp_home_admin/footer', $data);
    }

    public function kategori()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $this->load->model('m_wisang_kategori');
        $data['sub_kategori'] = $this->m_wisang_kategori->kategori()->result_array();
        $this->load->model('m_wisang_kategori');

        $this->load->view('templates/temp_home_admin/header', $data);
        $this->load->view('templates/temp_home_admin/topbar', $data);
        $this->load->view('templates/temp_home_admin/sidebar', $data);
        $this->load->view('home_admin/wisang_kategori', $data);
        $this->load->view('templates/temp_home_admin/footer', $data);
    }

    public function masyarakat()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['masyarakat'] = $this->db->get('masyarakat')->result_array();

        $this->load->view('templates/temp_home_admin/header', $data);
        $this->load->view('templates/temp_home_admin/topbar', $data);
        $this->load->view('templates/temp_home_admin/sidebar', $data);
        $this->load->view('home_admin/wisang_masyarakat', $data);
        $this->load->view('templates/temp_home_admin/footer', $data);
    }

    public function petugas()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->db->get('petugas')->result_array();

        $this->load->view('templates/temp_home_admin/header', $data);
        $this->load->view('templates/temp_home_admin/topbar', $data);
        $this->load->view('templates/temp_home_admin/sidebar', $data);
        $this->load->view('home_admin/wisang_petugas', $data);
        $this->load->view('templates/temp_home_admin/footer', $data);
    }

    public function pengaduan()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();

        $this->load->model('m_wisang_kategori');
        $data['kategori'] = $this->m_wisang_kategori->kategori()->result_array();
        $this->load->model('m_wisang_kategori');

        $this->load->view('templates/temp_home_admin/header', $data);
        $this->load->view('templates/temp_home_admin/topbar', $data);
        $this->load->view('templates/temp_home_admin/sidebar', $data);
        $this->load->view('home_admin/wisang_pengaduan', $data);
        $this->load->view('templates/temp_home_admin/footer', $data);
    }

    // public function laporan()
    // {
    //     $data['title'] = 'Home Page';
    //     $data['user'] = $this->db->get_where('pengaduan', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['pengaduan'] = $this->db->get('pengaduan')->result_array();


    //     $this->load->view('templates/temp_home_admin/header', $data);
    //     $this->load->view('templates/temp_home_admin/topbar', $data);
    //     $this->load->view('templates/temp_home_admin/sidebar', $data);
    //     $this->load->view('home_admin/wisang_laporan', $data);
    //     $this->load->view('templates/temp_home_admin/footer', $data);
    // }

    public function tambahkategori()
    {
        $kategori = $this->input->post('kategori');
        $data = array(
            'kategori' => $kategori,
        );
        $this->db->insert('kategori', $data);
        redirect('C_login_admin/kategori');
    }

    public function tambahsubkategori()
    {
        $data = array(
            'id_kategori' => $this->input->post('kategori'),
            'subkategori' => $this->input->post('sub_kategori')
        );

        $this->db->insert('subkategori', $data);
        // echo "trest";
        redirect('C_login_admin/kategori');
    }

    public function tambahpetugas()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'level' => htmlspecialchars($this->input->post('level', true)),
            'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
            'password' => password_hash(
                $this->input->post('password1'),
                PASSWORD_DEFAULT
            ),
            'is_active' => 1,
            'level' => 3,
        ];
        $this->db->insert('petugas', $data);
        redirect('C_login_admin/petugas');
    }

    public function delete_kategori($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kategori');
        redirect('C_login_admin/kategori/');
    }
    public function delete_subkategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('sub_kategori');
        redirect('C_login_admin/kategori/');
    }

    public function delete_petugas($id_petugas)
    {
        $this->db->where('id_petugas', $id_petugas);
        $this->db->delete('petugas');
        redirect('C_login_admin/petugas/');
    }
    public function edit_kategori($edit_id)
    {
        $edit_id = $this->input->post('edit_id');
        $edit_kategori = $this->input->post('edit_kategori');

        $update = array(
            'kategori' =>  $edit_kategori,

        );
        $this->db->where('id', $edit_id);
        $this->db->update('kategori', $update);
        redirect('C_login_admin/kategori');
    }
    public function edit_sub_kategori($edit_id)
    {
        $edit_sub_kategori = $this->input->post('edit_sub_kategori');

        $update = array(
            'sub_kategori' =>  $edit_sub_kategori,
        );
        $this->db->where('subkategori_id', $edit_id);
        $this->db->update('sub_kategori', $update);
        redirect('C_login_admin/kategori');
    }

    public function user_suspend($id)
    {
        $suspend = [
            'user_status' => 'dormant',
        ];

        $this->db->where('id', $id);
        $this->M_basicModel->suspend($suspend);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
		Account successfully suspended! 
		</div>');
        redirect('C_View/userlist');
    }

    public function user_unsuspend($id)
    {
        $unsuspend = [
            'user_status' => 'active',
        ];

        $this->db->where('id', $id);
        $this->M_basicModel->unsuspend($unsuspend);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
		Account successfully activated! 
		</div>');
        redirect('C_View/userlist');
    }

    public function laporan_pdf()
    {

        $data['pengaduan'] = $this->db->get_where('pengaduan', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('laporan_pdf', $data);
    }

    public function tindakan($id)
	{
		$data = $this->m_wisang_tanggap->userData($this->session->userdata('username'))->row_array();

		$tanggapan = $this->input->post('tanggapan');
		$status = $this->input->post('status');


		$add = [

			'id_pengaduan' => $id,
			'tanggapan' => $tanggapan,
			'tanggal_tanggapan' =>  date('Y-m-d'),
			'id_petugas' => $data['id_petugas'],
			// 'status' => $status,
		];

		$update = [
			'status' => $status
		];

		$this->db->where('id_pengaduan', $id);
		$this->db->update('pengaduan', $update);

		$this->m_wisang_join->tambahTindakan($add);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil mengirim tanggapan !
			  </div>');
		redirect('c_login_admin/pengaduan');
	}

    public function tanggapan($id)
    {

        $data['user'] = $this->m_wisang_tanggap->userData($this->session->userdata('username'))->row_array();
        $data['masyarakat'] = $this->m_wisang_tanggap->masyarakat()->result_array();
        $data['petugas'] = $this->m_wisang_tanggap->petugas()->result_array();
        $data['tanggapan'] = $this->m_wisang_tanggap->tanggapan($id)->row_array();
        $data['tanggapanPetugas'] = $this->m_wisang_tanggap->tanggapanPetugas($id)->row_array();

        $data['title'] = 'Tanggapan';
        $this->load->view('templates/temp_home_admin/header', $data);
        $this->load->view('templates/temp_home_admin/topbar', $data);
        $this->load->view('templates/temp_home_admin/sidebar', $data);
        $this->load->view('home_admin/tanggapan', $data);
        $this->load->view('templates/temp_home_admin/footer', $data);
    }
}
