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
}
