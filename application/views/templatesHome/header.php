<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travelku</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?= base_url('assets/img/favicon.png') ?>">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/themify-icons.css">
    
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/select2.css') ?>">
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/jquery-ui.css') ?>">
    
    <script src="<?= base_url('assets/js/sweetalert2.all.js') ?>"></script>
    

</head>

<body>
    <header>
        <input type="hidden" class="baseurl" value="<?= base_url() ?>">
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="<?= base_url() ?>">
                                        <img src="<?= base_url('assets/') ?>img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="<?= base_url() ?>">home</a></li>
                                            <li><a href="<?= base_url('travel/about') ?>">About</a></li>
                                            <!-- <li><a class="" href="#">Destination</a></l/li> -->
                                            <!-- <li><a href="#">Contact</a></li> -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                    <div class="number">
                                        <p> <i class="fa fa-phone"></i> 081-2345-678-90</p>
                                    </div>
                                    <div class="social_links d-none d-xl-block">
                                        <ul>
                                            <li><a href="<?= base_url('travel/pemberitahuan') ?>" class="notif"><i class="fa fa-bell"></i></a></li>
                                            <li><a href="<?php if($this->session->user) echo base_url('user/profile'); else echo base_url('user/login'); ?>">
                                                <i class="fa fa-user"></i> 
                                            </a></li>
                                            <li><a href="<?= base_url('user/keluar') ?>" class="keluar"><i class="fa fa-sign-out"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="seach_icon">
                                <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div> -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
    <script>
        $(document).ready(function(){
            $(".notif").hide();
            $(".keluar").hide();
            <?php if($this->session->user) : ?>
                $(".notif").show();
                $(".keluar").show();
            <?php endif; ?>
            $(".keluar").click(function(e){
                e.preventDefault();
                Swal.fire({
                    title: 'Keluar',
                    text: "Apakah anda yakin ingin keluar?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yap!'
                    }).then((result) => {
                    if (result.value) {
                        window.location.href = $(this).attr('href');
                    }
                });
            });
        });
    </script>