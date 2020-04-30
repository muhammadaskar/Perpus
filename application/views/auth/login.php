<div class="slider_area login">
    <div class="single_slider  d-flex align-items-center slider_bg_login">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="card" style="width: 25rem;">
                    <h2 class="card-header mx-auto">Login Student</h2>
                    <div class="container">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('auth') ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary mx-auto d-block">masuk</button>
                        </form>
                    </div>
                    <a href="<?= base_url('auth/register'); ?>" class="badge badge-success mx-auto d-block mb-3">daftar disini</a>
                    <a href="<?= base_url('auth/login_admin'); ?>" class="badge badge-info mx-auto d-block mb-3">login admin</a>
                </div>
            </div>
        </div>
    </div>