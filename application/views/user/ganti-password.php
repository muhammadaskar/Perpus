<div class=" slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row ganti">
                <div class="col-lg-4 mb-5">
                    <?= $this->session->flashdata('message') ?>
                    <h4 class="text-white"><?= $judul ?></h4>
                    <form action="" method="POST">
                        <div class="input-group flex-nowrap mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" name="password-lama" placeholder="Password lama">
                        </div>
                        <div class="row">
                            <?= form_error('password-lama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" name="password-baru1" placeholder="Password Baru">
                        </div>
                        <div class="row">
                            <?= form_error('password-baru1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="input-group flex-nowrap mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" name="password-baru2" placeholder="Konfirmasi Password Baru">
                        </div>
                        <div class="row">
                            <?= form_error('password-baru2', '<small class="text-danger pl-3">', '</small>'); ?>
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
        .ganti {
            margin-top: 100px;
        }

        button {
            margin-top: 0;
        }
    }
</style>