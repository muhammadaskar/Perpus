<div class="slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="popular_catagory_area">
                <div class="container  mt-5 cari">
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="text-white">Hasil Pencarian : <?= $keyword ?></p>
                        </div>
                    </div>
                    <div class="row mb-5 pb-5 mt-0 pt-0">
                        <?php if (empty($buku)) : ?>
                            <div class="col-md-12 mb-5 pb-5">
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