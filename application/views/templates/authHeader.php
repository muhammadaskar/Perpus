<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/'); ?>/img/logo.png">
    <!-- Place favicon.ico in the root directory -->

    <title><?= $judul; ?></title>
    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/slick.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/zStyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body style="background-image: url('<?= base_url('assets/img/banner/banner.jpg') ?>');">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="">
                <div class="logo">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url('assets/'); ?>img/logo.png" alt="">
                    </a>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link ml-3" href="<?= base_url() ?>" style="color: #FFF;">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-3" href="<?= base_url('auth/login_admin') ?>" style="color: #FFF;">Admin <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-3" href="<?= base_url('auth/') ?>" style="color: #FFF;">Pengguna<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->