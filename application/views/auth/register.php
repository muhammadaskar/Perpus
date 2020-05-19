<div class="slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_login">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="card" style="width: 25rem;">
                    <h2 class="card-header mx-auto">Daftar Pengguna</h2>
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
                            <button type="submit" class="btn btn-primary mx-auto d-block" style="width: 20rem;">Daftar</button>
                        </form>
                    </div>
                    <a href="<?= base_url('auth'); ?>" class="btn btn-success mx-auto d-block mb-3" style="width: 20rem;">login disini</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            margin-bottom: 200px;
            background-color: #102027;
        }

        .card h2 {

            color: #FFFFFF;
        }

        @media(max-width: 768px) {
            .card {
                margin-top: 100px;
            }
        }
    </style>