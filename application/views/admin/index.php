<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Buku</h1>
    <div class="row">
        <div class="col-lg-11">
            <div class="row">
                <div class="col-lg-8">
                    <a href="<?= base_url('admin/tambahBuku') ?>" class="btn btn-success mb-2">Tambahkan buku baru</a>
                </div>
                <div class="col-lg-4">
                    <form action="<?= base_url('admin/index') ?>" method="POST" autocomplete="off" autofocus>
                        <div class="input-group mb-3">
                            <input type="text" name="keyword" class="form-control" placeholder="Cari buku">
                            <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" name="cari" id="button-addon2" value="cari">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Buku</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($buku)) : ?>
                        <div class="alert alert-danger">
                            Buku Tidak Ada
                        </div>
                        <form action="<?= base_url('admin/index') ?>" method="POST">
                            <input class="btn btn-secondary mb-2" type="submit" name="cari" id="button-addon2" value="kembali">
                        </form>
                    <?php endif; ?>
                    <?php foreach ($buku as $b) : ?>
                        <tr>
                            <th scope="row"><?= ++$start; ?></th>
                            <th><?= $b['kode_buku']; ?></th>
                            <th><?= $b['judul_buku']; ?></th>
                            <th><?= $b['kategori']; ?></th>
                            <th><?= $b['pengarang']; ?></th>
                            <th><?= $b['tahun_terbit']; ?></th>
                            <td>
                                <a href="<?= base_url('admin/editbuku/') . $b['kode_buku'] ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url('admin/deletebuku/') . $b['kode_buku'] ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ?');">delete</a>
                            </td>
                        </tr>
                </tbody>
            <?php endforeach;  ?>
            </table>

            <?= $this->pagination->create_links(); ?>
        </div>
    </div>


</div>
<!-- /.container-fluid -->



</div>
<!-- End of Main Content -->