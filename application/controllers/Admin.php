<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('BukuModel');
        $this->load->model('AdminModel');
        $this->load->library('form_validation');
        $this->load->library('pagination');

        if (!$this->session->userdata('admin')) {
            redirect('auth/blocked');
        }
    }

    public function index()
    {
        $data['judul'] = 'Daftar Buku';

        if ($this->input->post('cari')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('judul_buku', $data['keyword']);
        $this->db->or_like('kategori', $data['keyword']);
        $this->db->or_like('pengarang', $data['keyword']);
        $this->db->from('buku');

        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['buku'] = $this->BukuModel->getBukuLim($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view('templates/adminHeader', $data);
        $this->load->view('templates/adminSidebar');
        $this->load->view('templates/adminTopbar');
        $this->load->view('admin/index', $data);
        $this->load->view('templates/adminFooter');
    }

    public function tambahBuku()
    {
        $dataa['judul'] = 'Tambah Buku Baru';
        $this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required');
        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'tahun_terbit', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adminHeader', $dataa);
            $this->load->view('templates/adminSidebar');
            $this->load->view('templates/adminTopbar');
            $this->load->view('admin/tambahbuku');
            $this->load->view('templates/adminFooter');
        } else {

            $kode_buku = $this->input->post('kode_buku');
            $judul_buku = $this->input->post('judul_buku');
            $kategori = $this->input->post('kategori');
            $pengarang = $this->input->post('pengarang');
            $tahun_terbit = $this->input->post('tahun_terbit');

            $uploadImage = $_FILES['image']['name'];

            if ($uploadImage) {
                $config['upload_path']          = './assets/img/buku/';
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = '2048';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $data = [
                        'kode_buku' => $kode_buku,
                        'judul_buku' => $judul_buku,
                        'kategori' => $kategori,
                        'pengarang' => $pengarang,
                        'status' => 'tersedia',
                        'tahun_terbit' => $tahun_terbit,
                        'gambar_buku' => $new_image
                    ];
                } else {
                    // echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Gagal Melakukan upload</div>');
                    redirect('admin/tambahbuku');
                }
            } else {
                $data = [
                    'kode_buku' => $kode_buku,
                    'judul_buku' => $judul_buku,
                    'kategori' => $kategori,
                    'pengarang' => $pengarang,
                    'status' => 'tersedia',
                    'tahun_terbit' => $tahun_terbit,
                    'gambar_buku' => 'default.png'
                ];
            }
            $this->BukuModel->addBuku($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Buku Berhasil ditambahkan</div>');
            redirect('admin/');
        }
    }

    public function editbuku($kode_buku)
    {
        $data['judul'] = 'Edit Buku';
        $data['buku'] = $this->BukuModel->getBukuByKode($kode_buku);
        $data['kategori'] = ['komik', 'novel', 'kamus', 'sains'];

        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'tahun_terbit', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adminHeader', $data);
            $this->load->view('templates/adminSidebar');
            $this->load->view('templates/adminTopbar');
            $this->load->view('admin/editbuku', $data);
            $this->load->view('templates/adminFooter');
        } else {

            $kode_buku = $this->input->post('kode_buku');
            $judul_buku = $this->input->post('judul_buku');
            $kategori = $this->input->post('kategori');
            $pengarang = $this->input->post('pengarang');
            $tahun_terbit = $this->input->post('tahun_terbit');

            $uploadImage = $_FILES['image']['name'];

            if ($uploadImage) {
                $config['upload_path']          = './assets/img/buku/';
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = '2048';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');

                    $old_image = $data['buku']['gambar_buku'];

                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/buku/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_buku', $new_image);
                } else {
                    // echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Gagal melakukan upload</div>');
                    redirect("admin/editbuku/$kode_buku");
                }
            }

            $data = [
                'judul_buku' => $judul_buku,
                'kategori' => $kategori,
                'pengarang' => $pengarang,
                'tahun_terbit' => $tahun_terbit,
            ];

            $this->db->where('kode_buku', $kode_buku);
            $this->db->update('buku', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Buku Berhasil Diubah</div>');
            redirect('admin');
        }
    }

    public function deletebuku($kode_buku)
    {
        $this->BukuModel->deleteBuku($kode_buku);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Buku Berhasil Dihapus</div>');
        redirect('admin');
    }

    public function peminjam()
    {
        $data['judul'] = 'Daftar Peminjam';
        $data['peminjam'] = $this->BukuModel->getPeminjam();
        $this->load->view('templates/adminHeader', $data);
        $this->load->view('templates/adminSidebar');
        $this->load->view('templates/adminTopbar');
        $this->load->view('admin/peminjam', $data);
        $this->load->view('templates/adminFooter');
    }

    public function gantiPassword()
    {
        $data['judul'] = 'Ganti Password';
        $data['admin'] = $this->db->get_where('admin', ['nama' => $this->session->userdata('admin')])->row_array();


        $this->form_validation->set_rules('password-lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password-baru1', 'Password Baru', 'required|trim|min_length[3]|matches[password-baru2]');
        $this->form_validation->set_rules('password-baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[password-baru1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adminHeader', $data);
            $this->load->view('templates/adminSidebar');
            $this->load->view('templates/adminTopbar');
            $this->load->view('admin/ganti-password', $data);
            $this->load->view('templates/adminFooter');
        } else {
            $passwordLama = $this->input->post('password-lama');
            $passwordBaru = $this->input->post('password-baru1');
            if (!password_verify($passwordLama, $data['admin']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password lama tidak sesuai</div>');
                redirect('admin/gantiPassword');
            } else {
                if ($passwordBaru == $passwordLama) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password baru tidak boleh sama dengan Password sebelumnya</div>');
                    redirect('admin/gantiPassword');
                } else {
                    $passwordHash = password_hash($passwordBaru, PASSWORD_DEFAULT);
                    $this->db->set('password', $passwordHash);
                    $this->db->where('nama', $this->session->userdata('admin'));
                    $this->db->update('admin');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Berhasil diganti</div>');
                    redirect('admin/gantiPassword');
                }
            }
        }
    }

    public function daftaradmin()
    {
        $data['judul'] = 'Daftar Admin';
        $data['admin'] = $this->AdminModel->getAllAdmin();

        $this->load->view('templates/adminHeader', $data);
        $this->load->view('templates/adminSidebar');
        $this->load->view('templates/adminTopbar');
        $this->load->view('admin/daftar-admin', $data);
        $this->load->view('templates/adminFooter');
    }

    public function tambahadmin()
    {

        $data['judul'] = 'Tambah Admin';

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[admin.nik]', [
            'is_unique' => 'NIK telah tedaftar'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]', [
            'is_unique' => 'Email telah tedaftar'
        ]);
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim|min_length[11]|max_length[13]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sesuai',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adminHeader', $data);
            $this->load->view('templates/adminSidebar');
            $this->load->view('templates/adminTopbar');
            $this->load->view('admin/tambah-admin', $data);
            $this->load->view('templates/adminFooter');
        } else {
            $data = [
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
            ];

            $this->AdminModel->tambahAdmin($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil ditambahkan</div>');
            redirect('admin/daftaradmin');
        }
    }

    public function daftarpengguna()
    {
        $data['judul'] = 'Daftar Pengguna';
        $data['pengguna'] = $this->AdminModel->getAllUser();

        $this->load->view('templates/adminHeader', $data);
        $this->load->view('templates/adminSidebar');
        $this->load->view('templates/adminTopbar');
        $this->load->view('admin/daftar-pengguna', $data);
        $this->load->view('templates/adminFooter');
    }
}
