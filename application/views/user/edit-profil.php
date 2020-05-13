<div class=" slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <?= $this->session->flashdata('message') ?>
                    <h4 class="text-white"><?= $judul ?></h4>
                    <form action="" method="POST">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">
                                    <i class="far fa-envelope"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="email" value="<?= $user['email'] ?>" readonly>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="nama" value="<?= $user['nama'] ?>">
                        </div>
                        <div class="row">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media(max-width: 768px) {
        .row {
            margin-top: 100px;
        }

        button {
            margin-top: 0;
        }
    }
</style>