<?php

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BukuModel');
    }

    public function index()
    {
        $data['judul'] = 'Beranda';
        $data['buku'] = $this->BukuModel->getAllBuku();
        $data['komik'] = $this->BukuModel->getBukuKategoriKomik();
        $data['novel'] = $this->BukuModel->getBukuKategoriNovel();
        $data['kamus'] = $this->BukuModel->getBukuKategoriKamus();
        $data['sains'] = $this->BukuModel->getBukuKategoriSains();
        $this->load->view('templates/header', $data);
        $this->load->view('beranda', $data);
        $this->load->view('templates/footer');
    }
}
