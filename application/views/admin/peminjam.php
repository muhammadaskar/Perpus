<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Buku</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">Email Peminjam</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($peminjam as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <th><?= $p['kode_buku']; ?></th>
                            <th><?= $p['judul_buku']; ?></th>
                            <th><?= $p['pengarang']; ?></th>
                            <th><?= $p['nama']; ?></th>
                            <th><?= $p['email']; ?></th>
                            <th><?= $p['tanggal_pinjam']; ?></th>
                            <th><?= $p['tanggal_kembali']; ?></th>
                        </tr>
                </tbody>
            <?php $i++;
                    endforeach;  ?>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->



</div>
<!-- End of Main Content -->