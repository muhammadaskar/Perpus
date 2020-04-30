<div class=" slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">

            <!-- <div class="row">
                <div class="col-lg-6 mt-1 mb-2">
                    <a href="<?= base_url('main') ?>"><i class="fas fa-4x fa-arrow-alt-circle-left"></i></a>
                </div>
            </div> -->

            <div class="row">
                <div class="col-lg-6">
                    <h2><?= $buku['judul_buku'] ?></h2>
                    <img src="<?= base_url('assets/img/buku/') . $buku['gambar_buku'] ?>" class="card-img mb-5 pb-5 " style="width: 60%; max-height:400px">
                </div>
                <div class="col-lg-4">
                    <form method="POST" action="<?= base_url('main/pinjam') ?>">
                        <div class="form-group">
                            <label for="kode_buku">Kode Buku</label>
                            <input type="text" name="kode_buku" class="form-control" id="kode_buku" value="<?= $buku['kode_buku'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" class="form-control" id="kategori" value="<?= $buku['kategori'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" name="pengarang" class="form-control" id="pengarang" value="<?= $buku['pengarang'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input type="text" name="tahun_terbit" class="form-control" id="tahun_terbit" value="<?= $buku['tahun_terbit'] ?>" readonly>
                        </div>
                        <?php
                        if ($buku['status'] == 'tersedia') { ?>
                            <div class="form-group">
                                <button type="button" class="btn btn-success">Tersedia</button>
                                <button type="submit" class="btn btn-info">Pinjam</button>
                            </div>
                        <?php
                        } else { ?>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger">Tidak Tersedia</button>
                                <button type="button" class="btn btn-info" onclick="Swal.fire('Upppps','Buku Sedang Dipinjam','warning')">Pinjam</button>
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <style>
        label {
            color: #FFFFFF;
        }

        .form-group,
        h2 {
            color: #FFFFFF;
        }
    </style>