<?php

class BukuModel extends CI_Model
{
    public function getAllBuku()
    {
        return $this->db->get('buku')->result_array();
    }

    public function getBukuKategoriKomik()
    {
        return $this->db->get_where('buku', ['kategori' => 'komik'])->result_array();
    }

    public function getBukuKategoriNovel()
    {
        return $this->db->get_where('buku', ['kategori' => 'novel'])->result_array();
    }

    public function getBukuKategoriKamus()
    {
        return $this->db->get_where('buku', ['kategori' => 'kamus'])->result_array();
    }

    public function getBukuKategoriSains()
    {
        return $this->db->get_where('buku', ['kategori' => 'sains'])->result_array();
    }
}
