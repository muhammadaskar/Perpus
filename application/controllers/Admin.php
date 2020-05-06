<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('BukuModel');
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
                $config['allowed_types']        = 'gif|jpg|png';
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
                    echo $this->upload->display_errors();
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
                $config['allowed_types']        = 'gif|jpg|png';
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
                    echo $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Gambar Wajib diedit</div>');
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
}
