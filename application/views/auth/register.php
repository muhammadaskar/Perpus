<div class="slider_area login">
    <div class="single_slider  d-flex align-items-center slider_bg_login">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="card" style="width: 25rem;">
                    <h2 class="card-header mx-auto">Register</h2>
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('auth/register') ?>">
                            <div class="form-group">
                                <label for="namaLengkap">Nama Lengkap</label>
                                <input name="nama" type="text" class="form-control" id="namaLengkap" aria-describedby="emailHelp" placeholder="Masukkan Nama Lengkap" value="<?= set_value('nama') ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat Email</label>
                                <input name="email" type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Masukkan Email Valid" value="<?= set_value('email') ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password1">Password</label>
                                <input name="password1" type="password" class="form-control" id="password1" placeholder="Masukkan Password">
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password2">Konfirmasi Password</label>
                                <input name="password2" type="password" class="form-control" id="password2" placeholder="Konfirmasi Password">
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary mx-auto d-block">Simpan</button>
                        </form>
                    </div>
                    <a href="<?= base_url('auth'); ?>" class="badge badge-success mx-auto d-block mb-3">login disini</a>
                </div>
            </div>
        </div>
    </div>