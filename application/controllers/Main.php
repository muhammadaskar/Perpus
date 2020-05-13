<?php
/*------------------- ------------------------------
|       Author : 
        - Muhammad Askar
        - Last updated : 1 May 2020
        - Location     : Sudiang, Makassar City
---------------------------------------------------*/
class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('BukuModel');
        $this->load->model('UserModel', 'User');
        $this->load->library('form_validation');
        // is_logged_in(); // method ada di dir helpers
    }

    public function index()
    {
        $data['judul'] = 'Beranda';
        $data['buku'] = $this->BukuModel->getBukuLimit();
        $data['komik'] = $this->BukuModel->getBukuKategoriKomik();
        $data['novel'] = $this->BukuModel->getBukuKategoriNovel();
        $data['kamus'] = $this->BukuModel->getBukuKategoriKamus();
        $data['sains'] = $this->BukuModel->getBukuKategoriSains();
        $data['user'] = $this->User->getUserByEmail();
        $this->load->view('templates/header', $data);
        $this->load->view('beranda', $data);
        $this->load->view('templates/footer');
    }

    public function detail($kode_buku)
    {

        $data['judul'] = 'Detail Buku';
        $data['buku'] = $this->BukuModel->getBukuByKode($kode_buku);
        $data['user'] = $this->User->getUserByEmail();
        $this->load->view('templates/header', $data);
        $this->load->view('buku/detail', $data);
        $this->load->view('templates/footer');
    }

    public function pinjam()
    {
        is_logged_in();
        $kode_buku = $this->input->post('kode_buku');
        $user_id = $this->session->userdata('id');
        $tanggal_pinjam = date("Y-m-d H:i:s", strtotime('+1 day'));
        $tanggal_kembali = date("Y-m-d H:i:s", strtotime('+8 days'));

        $data = [
            'kode_buku' => $kode_buku,
            'user_id' => $user_id,
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali' => $tanggal_kembali
        ];

        $this->db->insert('peminjaman', $data);
        $this->BukuModel->setStatus($kode_buku);
        $this->session->set_flashdata('flash', 'dipinjam');
        redirect('main');
    }

    public function koleksi()
    {
        $user_id = $this->session->userdata('id');
        $data['koleksi'] = $this->BukuModel->yangDipinjam($user_id);

        $data['judul'] = 'Koleksi Saya';
        $data['user'] = $this->User->getUserByEmail();
        $this->load->view('templates/header', $data);
        $this->load->view('buku/koleksi', $data);
        $this->load->view('templates/footer');
    }

    public function kembalikan($kode_buku)
    {
        $this->db->where('kode_buku', $kode_buku);
        $this->db->delete('peminjaman');
        $this->BukuModel->setKembalikan($kode_buku);
        $this->session->set_flashdata('flash', 'dikembalikan');
        redirect('main');
    }

    public function cari()
    {

        $data['judul'] = 'Cari Buku';

        if ($this->input->post('cari')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('judul_buku', $data['keyword']);
        $this->db->or_like('kode_buku', $data['keyword']);
        $this->db->or_like('kategori', $data['keyword']);
        $this->db->or_like('pengarang', $data['keyword']);
        $data['buku'] = $this->BukuModel->getBuku($data['keyword']);
        $data['user'] = $this->User->getUserByEmail();
        $this->load->view('templates/header', $data);
        $this->load->view('buku/hasil', $data);
        $this->load->view('templates/footer');
    }

    public function semua()
    {
        $data['judul'] = 'Daftar Buku Perpustakaan';
        $data['buku'] = $this->BukuModel->getAllBuku();
        $data['user'] = $this->User->getUserByEmail();
        $this->load->view('templates/header', $data);
        $this->load->view('buku/semuabuku', $data);
        $this->load->view('templates/footer');
    }

    public function editprofil()
    {
        $data['judul'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/edit-profil', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Profil Berhasil diubah</div>');
            redirect('main/editprofil');
        }
    }

    public function gantipassword()
    {
        $data['judul'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password-lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password-baru1', 'Password Baru', 'required|trim|min_length[3]|matches[password-baru2]');
        $this->form_validation->set_rules('password-baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[password-baru1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/ganti-password', $data);
            $this->load->view('templates/footer');
        } else {
            $passwordLama = $this->input->post('password-lama');
            $passwordBaru = $this->input->post('password-baru1');

            if (!password_verify($passwordLama, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password lama tidak sesuai</div>');
                redirect('main/gantipassword');
            } else {
                if ($passwordBaru == $passwordLama) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Password lama tidak boleh sama dengan password baru</div>');
                    redirect('main/gantipassword');
                } else {
                    $passwordHash = password_hash($passwordBaru, PASSWORD_DEFAULT);
                    $this->db->set('password', $passwordHash);
                    $this->db->where('email', $data['user']['email']);
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Password berhasil diubah</div>');
                    redirect('main/gantipassword');
                }
            }
        }
    }
}
