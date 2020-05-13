<div class="slider_area">
    <div class="single_slider  d-flex align-items-center">
        <div class="container mb-5 pb-5">
            <div class="row align-items-center justify-content-center">
                <div class="card" style="width: 25rem;">
                    <h2 class="card-header mx-auto">Lupa Password</h2>
                    <div class="container">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('auth/lupapassword') ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat Email</label>
                                <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary mx-auto d-block">atur ulang password</button>
                        </form>
                    </div>
                    <a href="<?= base_url('auth'); ?>" class="badge badge-success mx-auto d-block mb-3">kembali ke login</a>
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