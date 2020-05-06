<?php

class BukuModel extends CI_Model
{

    public function getAllBuku()
    {
        return $this->db->get('buku')->result_array();
    }

    public function getBukuLimit()
    {
        return $this->db->get('buku', 8)->result_array();
    }

    public function getBukuLim($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul_buku', $keyword);
            $this->db->or_like('kategori', $keyword);
            $this->db->or_like('pengarang', $keyword);
        }
        return $this->db->get('buku', $limit, $start)->result_array();
    }

    public function countAllBooks()
    {
        return $this->db->get('buku')->num_rows();
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

    public function getBukuByKode($kode_buku)
    {
        return $this->db->get_where('buku', ['kode_buku' => $kode_buku])->row_array();
    }

    public function addBuku($data)
    {
        $this->db->insert('buku', $data);
    }

    public function deleteBuku($kode_buku)
    {
        $this->db->where('kode_buku', $kode_buku);
        $this->db->delete('buku');
    }

    public function setStatus($kode_buku)
    {
        $this->db->where('kode_buku', $kode_buku);
        $this->db->update('buku', ['status' => 'dipinjam']);
    }

    public function setKembalikan($kode_buku)
    {
        $this->db->where('kode_buku', $kode_buku);
        $this->db->update('buku', ['status' => 'tersedia']);
    }

    public function yangDipinjam($id)
    {
        $this->db->select('buku.gambar_buku, peminjaman.kode_buku, buku.judul_buku, buku.pengarang, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.kode_buku = peminjaman.kode_buku');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPeminjam()
    {
        $this->db->select('peminjaman.kode_buku, buku.judul_buku, buku.pengarang, user.nama, user.email, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'buku.kode_buku = peminjaman.kode_buku', 'left');
        $this->db->join('user', 'user.id = peminjaman.user_id', 'inner');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBuku($keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul_buku', $keyword);
            $this->db->or_like('kode_buku', $keyword);
            $this->db->or_like('kategori', $keyword);
            $this->db->or_like('pengarang', $keyword);
        }
        return $this->db->get('buku')->result_array();
    }
}
