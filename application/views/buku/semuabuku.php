<div class=" slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container semua">
            <div class="popular_catagory_area">
                <div class="container mb-5 mt-5 pb-5">
                    <div class="row">
                        <div class="col-xl-12 mt-5 pt-5">
                            <div class="section_title mb-60 text-center">
                                <h3 class="mt-5 pt-5 text-white">
                                    Daftar Buku Perpustakaan
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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