<div class="slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="popular_catagory_area">
                <div class="container cari">
                    <div class="row input-cari">
                        <div class="col-lg-4 mx-auto d-block">
                            <form action="<?= base_url('main/cari') ?>" method="POST" autocomplete="off" autofocus>
                                <div class="input-group input-group-lg">
                                    <input type="text" name="keyword" class="form-control" placeholder="Apa Yang anda cari?">
                                    <div class="input-group-append">
                                        <input class="btn btn-warning text-white" type="submit" name="cari" id="button-addon2" value="cari">
                                    </div>
                                </div>
                                <h6 class="text-white ml-2 mt-2">Hasil Pencarian : <?= $keyword ?></h6>
                            </form>
                        </div>
                    </div>
                    <div class="row mb-5 pb-5 mt-0 pt-0">
                        <?php if (empty($buku)) : ?>
                            <div class="col-md-12 mb-5 pb-5 empty" data-empty="tidak tersedia">
                                <div class="alert alert-danger text-center" role="alert">
                                    Buku tidak tersedia
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row mb-3">
                        <?php foreach ($buku as $book) : ?>
                            <div class="col-xl-3 col-md-4 col-lg-3">
                                <div class="single_catagory">
                                    <div class="thumb">
                                        <img src="<?= base_url('assets/img/buku/');
                                                    echo $book['gambar_buku']; ?>" alt="" style="max-height: 250px">
                                    </div>
                                    <div class="hover_overlay">
                                        <div class="hover_inner">
                                            <a href="">
                                                <h4><?= $book['judul_buku']; ?></h4>
                                            </a>
                                            <span><a href="<?= base_url('main/detail/') . $book['kode_buku'] ?>">detail</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* @media(max-width: 768px) {
        .hasil {
            margin-top: 100px;
        }
    } */

    /* @media(max-width: 800px) {
        .input-cari {
            margin-top: 100%;
        }
    } */

    @media (min-width: 1200px) {
        .input-cari {
            margin-top: 400px;
            margin-bottom: 10px;
        }
    }
</style>