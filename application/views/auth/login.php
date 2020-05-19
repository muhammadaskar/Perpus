<div class="slider_area">
    <div class="single_slider  d-flex align-items-center">
        <div class="container mb-5 pb-5">
            <div class="row align-items-center justify-content-center">
                <div class="card" style="width: 25rem;">
                    <h2 class="card-header mx-auto">Login Pengguna</h2>
                    <div class="container">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('auth') ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat Email</label>
                                <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                                <div class="lupa">
                                    <a href="<?= base_url('auth/lupapassword'); ?>">
                                        <p class="ml-2">Lupa Password ?</p>
                                    </a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mx-auto d-block" style="width: 20rem;">masuk</button>
                        </form>
                    </div>
                    <a href="<?= base_url('auth/register'); ?>" class="btn btn-success mx-auto d-block mb-3" style="width: 20rem;">daftar disini</a>
                    <!-- <a href="<?= base_url('auth/lupapassword'); ?>" class="badge badge-danger mx-auto d-block mb-3" style="width: 20rem;">lupa password</a> -->
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

        .lupa p {
            font-size: 15px;
            color: crimson;
        }

        a:hover {
            text-decoration: none;
        }

        p:hover {
            color: red;
        }

        @media(max-width: 768px) {
            .card {
                margin-top: 100px;
            }
        }
    </style>