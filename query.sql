create table buku
(
    kode_buku VARCHAR(255) not null primary key,
    judul_buku VARCHAR(255),
    kategori VARCHAR(255),
    pengarang VARCHAR(255),
    tahun_terbit varchar(255),
    gambar_buku VARCHAR(255)
);

insert into buku
values('A00', 'Berlimpah Rezeki Setelah Menikah', 'novel', 'Askar', '2000', '1.jpg'),
    ('A01', 'Ijazah Untuk Siapa', 'novel', 'Muhammad Askar', '2001', '2.jpg'),
    ('A02', 'Cinta Dan Ingata', 'novel', 'Askar', '2000', '3.jpg'),
    ('A03', 'Dewa Basket', 'novel', 'Muhammad Askar', '2002', '4.jpg');


create table users(
    id int not null primary key auto_increment,
    nama varchar
(125),
    email VARCHAR
(125),
    password varchar
(125),
    is_active int
(1),
    image VARCHAR
(255),
    date_created TIMESTAMP,
    date_updated TIMESTAMP
);

