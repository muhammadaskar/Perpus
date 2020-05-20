<div class="bg-dark text-white">
    <div class="single_slider  d-flex align-items-center">
        <div class="container mt-5 pt-5 mb-5 pb-5">
            <?php
            $CI = get_instance();
            if (!$CI->session->userdata('user')) :
            ?>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="alert alert-warning text-center" role="alert">
                            Maaf anda belum melakukan login, silahkan login terlebih dahulu
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <table class="table table-secondary table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">#</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Kembalikan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($koleksi as $k) : ?>
                            <tr>
                                <th><?= $i; ?></th>
                                <th>
                                    <img src="<?= base_url('assets/img/buku/') . $k['gambar_buku'] ?>" alt="" style="width: 100px;">
                                </th>
                                <th><?= $k['kode_buku'] ?></th>
                                <th><?= $k['judul_buku'] ?></th>
                                <th><?= $k['pengarang'] ?></th>
                                <th><?= $k['tanggal_pinjam'] ?></th>
                                <th><?= $k['tanggal_kembali'] ?></th>
                                <th>
                                    <a href="<?= base_url('main/kembalikan/') . $k['kode_buku'] ?>" class="badge badge-info tombol-kembalikan">Kembalikan</a>
                                </th>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>