<!-- slider_area_start -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>">

    <div class=" slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="text-white text-center">Daftar Nama Anggota Kelompok : </h3>
                    </div>
                </div>
                <hr class="bg-white">
                <div class="row mb-5 pb-5 text-center">
                    <div class="col-lg-4 askar rellax">
                        <a href="https://github.com/muhammadaskar">
                            <h4 class="text-white">1. Muhammad Askar</h4>
                            <p class="text-white">185150601111002</p>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="text-white">2. Reyhan Nizar Ramadhan</h4>
                        <p class="text-white">185150600111013</p>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="text-white">3. Arsyi Fajri</h4>
                        <p class="text-white">185150600111006</p>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-10">
                        <div class="slider_text text-center justify-content-center">
                            <p"> SELAMAT DATANG DI :</p>
                                <h3>LIBMAX</h3>
                                <center>
                                    <div class="search_form" style="width: 520px;">
                                        <form action="<?= base_url('main/cari') ?>" style="width: 520px;" method="POST" autocomplete="off">
                                            <div class="row align-items-center" style="width: 770px;">
                                                <div class="col-xl-5 col-md-4">
                                                    <div class="input_field">
                                                        <input name="keyword" type="text" placeholder="Apa yang kamu cari?">
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-md-4">
                                                    <div class="button_search">
                                                        <input class="boxed-btn2" type="submit" name="cari" value="cari">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </center>
                                <div class="quality">
                                    <ul>
                                        <li>
                                            <button>NOVEL</button>
                                        </li>
                                        <li>
                                            <button>KOMIK</button>
                                        </li>
                                        <li>
                                            <button>KAMUS</button>
                                        </li>
                                        <li>
                                            <button>SAINS</button>
                                        </li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->


    <div class="popular_catagory_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-60 text-center">
                        <h3>
                            Daftar Buku
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
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= base_url('main/semua') ?>" class="btn btn-warning text-white">Lihat Semua Buku</a>
                </div>
            </div>
        </div>
    </div>

    <div class="explorer_europe">
        <div class="container">
            <div class="explorer_wrap">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-md-4">
                        <h3>Kategori Buku</h3>
                    </div>
                    <div class="col-xl-6 col-md-8">
                        <div class="explorer_tab">
                            <nav>
                                <div class="nav" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">KOMIK</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">NOVEL</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">KAMUS</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-contact2" role="tab" aria-controls="nav-contact" aria-selected="false">SAINS</a>

                                </div>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
            <!-- KOMIK -->
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <?php foreach ($komik as $kom) : ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single_explorer">
                                    <div class="thumb">
                                        <img src="<?= base_url('assets/img/buku/');
                                                    echo $kom['gambar_buku']; ?>" alt="" style="max-height: 300px">
                                    </div>
                                    <div class=" explorer_bottom d-flex">
                                        <div class="explorer_info">
                                            <h3><a href="<?= base_url('main/detail/') . $kom['kode_buku'] ?>"><?= $kom['judul_buku']; ?></a></h3>
                                            <p><?= $kom['pengarang'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- NOVEL -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        <?php foreach ($novel as $nov) : ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single_explorer">
                                    <div class="thumb">
                                        <img src="<?= base_url('assets/img/buku/');
                                                    echo $nov['gambar_buku']; ?>" alt="" style="max-height: 300px">
                                    </div>
                                    <div class="explorer_bottom d-flex">
                                        <div class="explorer_info">
                                            <h3><a href="<?= base_url('main/detail/') . $nov['kode_buku'] ?>"><?= $nov['judul_buku']; ?></a></h3>
                                            <p><?= $nov['pengarang'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- KAMUS -->
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <?php foreach ($kamus as $kms) : ?>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="single_explorer">
                                    <div class="thumb">
                                        <img src="<?= base_url('assets/img/buku/');
                                                    echo $kms['gambar_buku']; ?>" alt="" style="max-height: 300px">
                                    </div>
                                    <div class="explorer_bottom d-flex">
                                        <div class="explorer_info">
                                            <h3><a href="<?= base_url('main/detail/') . $kms['kode_buku'] ?>"><?= $kms['judul_buku'] ?></a></h3>
                                            <p><?= $kms['pengarang'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- SAINS -->
                <div class="tab-pane fade" id="nav-contact2" role="tabpanel" aria-labelledby="nav-contact-tab2">
                    <div class="row">
                        <?php foreach ($sains as $sns) : ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single_explorer">
                                    <div class="thumb">
                                        <img src="<?= base_url('assets/img/buku/');
                                                    echo $sns['gambar_buku']; ?>" alt="" style="max-height: 300px">
                                    </div>
                                    <div class="explorer_bottom d-flex">
                                        <div class="explorer_info">
                                            <h3><a href="<?= base_url('main/detail/') . $sns['kode_buku'] ?>"><?= $sns['judul_buku']; ?></a></h3>
                                            <p><?= $sns['pengarang'] ?></p>
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