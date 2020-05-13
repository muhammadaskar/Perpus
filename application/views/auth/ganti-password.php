<div class="slider_area">
    <div class="single_slider  d-flex align-items-center">
        <div class="container mb-5 pb-5">
            <div class="row align-items-center justify-content-center">
                <div class="card" style="width: 25rem;">
                    <h2 class="card-header mx-auto">Ganti Password</h2>
                    <div class="container">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('auth/gantipassword') ?>" method="POST">
                            <div class="form-group">
                                <label for="PasswordBaru1">Password</label>
                                <input name="password1" type="password" class="form-control" id="password1">
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="PasswordBaru2">Ulang Password</label>
                                <input name="password2" type="password" class="form-control" id="password2">
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary mx-auto d-block">ganti password</button>
                        </form>
                    </div>
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