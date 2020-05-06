# APLIKASI PERPUSTAKAAN
# MODEL
## BUKU
- kode_buku 
- judul_buku 
- kategori 
- pengarang 
- status
- tahun_terbit 
- gambar_buku 

## USER
- id
- nama
- email
- password
- is_active
- image
- date_created
- date_updated

## ADMIN
- id
- nik
- nama
- email
- no_hp
- alamat
- password
- date_created

## PEMINJAMAN
- id
- kode_buku fk buku(kode_buku)
- user_id fk user(id)
- tanggal_pinjam
- tanggal_kembali

## USER_TOKEN
- id
- email
- token
- date_created