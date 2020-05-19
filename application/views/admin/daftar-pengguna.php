<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-5">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Daftar Pada</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($pengguna as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <th><?= $p['nama']; ?></th>
                            <th><?= $p['email']; ?></th>
                            <th><?= date('d M Y', strtotime($p['date_created'])) ?></th>
                        </tr>
                </tbody>
            <?php $i++;
                    endforeach;  ?>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->



</div>
<!-- End of Main Content -->