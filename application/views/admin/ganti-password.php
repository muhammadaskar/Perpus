<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <div class="row">
        <div class="col-lg-10">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="POST">
                <div class="form-group row">
                    <label for="passwordLama" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="passwordLama" aria-describedby="emailHelp" name="password-lama">
                        <?= form_error('password-lama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="passwordBaru" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="passwordBaru" aria-describedby="emailHelp" name="password-baru1">
                        <?= form_error('password-baru1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="passwordBaru" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="passwordBaru" aria-describedby="emailHelp" name="password-baru2">
                        <?= form_error('password-baru2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button class="btn btn-primary mx-auto d-block" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
</div>