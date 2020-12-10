    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <?php foreach($banner as $bann): ?>
            <div class="single_slider  d-flex align-items-center slider_bg_ overlay" style="background-image: url(<?= base_url('assets/img/banner/lokasi/') . $bann['banner'] ?>);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3><?= $bann['loc'] ?></h3>
                                <p>-Suatu Kenangan Tercipta Dari Perjalanan-</p>
                                <a href="<?= base_url('travel/location/') . $bann['id'] ?>" class="boxed-btn3">jelajahi Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
    <!-- slider_area_end -->
    
    <!-- popular_destination_area_start  -->
    <div class="popular_destination_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Destinasi Terpopuler</h3>
                        <p>Menjelajah Menghasilkan Seni, Seni Tak Memiliki Nilai, Nilai Bukan Hanya Sebuah Angka Akan Setapi Sebuah Identitas.</p>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php foreach($tempat as $tpt) : ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb">
                            <img src="<?= base_url('assets/img/destination/') . $tpt['gambar'] ?>" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center"><?= $tpt['loc'] ?> <a href="<?= base_url('travel/location/') . $tpt['id'] ?>">  <?= $tpt['destinasi'] ?> Tempat</a> </p>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- popular_destination_area_end  -->

    <!-- newletter_area_start  -->
    <div class="newletter_area overlay">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-10">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="newsletter_text">
                              <h4>Dapatkan Info Terbaru kami</h4>
                                    <p>Selalu Up To Date 
                                        Tentang Wisata Baru</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="mail_form">
                                <div class="row no-gutters">
                                    <div class="col-lg-9 col-md-8">
                                        <div class="newsletter_field">
                                            <input type="email" placeholder="Your mail" >
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <div class="newsletter_btn">
                                            <button class="boxed-btn4 " type="submit" >Subscribe</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- newletter_area_end  -->

    <div class="popular_places_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Destinasi Terpopuler</h3>
                        <p>Menjelajah Menghasilkan Seni, Seni Tak Memiliki Nilai, Nilai Bukan Hanya Sebuah Angka Akan Setapi Sebuah Identitas.</p>
                    </div>
                </div>
            </div>
            <div class="row destinasii">
                <?php foreach($travel as $trv) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="<?= base_url('assets/img/place/') . $trv['gambar'] ?>" alt="">
                                <a href="#" class="prise">Rp <?= number_format($trv['harga'], 0, ".", ".") ?></a>
                            </div>
                            <div class="place_info">
                                <a href="<?= base_url('travel/destination/') . $trv['id'] ?>"><h3><?= $trv['nama_destinasi'] ?></h3></a>
                                <p><?= $trv['loc'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="more_place_btn text-center">
                        <a class="boxed-btn4 discover" href="#">Tempat Lainnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="video_area video_bg overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video_wrap text-center">
                        <h3>Enjoy Video</h3>
                        <div class="video_icon">
                            <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=f59dDEk57i0">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <div class="travel_variation_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <img src="<?= base_url('assets/') ?>img/svg_icon/1.svg" alt="">
                        </div>
                        <h3>Kenyamanan Perjalanan</h3>
                        <p>Ketenangan yang luar biasa telah menguasai seluruh jiwa saya</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <img src="<?= base_url('assets/') ?>img/svg_icon/2.svg" alt="">
                        </div>
                        <h3>Kemewahan Hotel</h3>
                        <p>Kenyamanan membuat anda lupa, kebahagian anda dimulai dari sekarang</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <img src="<?= base_url('assets/') ?>img/svg_icon/3.svg" alt="">
                        </div>
                        <h3>Keramahan Guide </h3>
                        <p>Keakraban adalah hal yang langkah dan tak ternilai dalam suatu pengalaman</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- testimonial_area  -->
    <!-- <div class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Micky Mouse</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Tom Mouse</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Jerry Mouse</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- /testimonial_area  -->

    <script>
        var no = 6;
        $(document).ready(function(){
            $(".discover").click(function(e){
                e.preventDefault();
                var u = "<?= base_url('travel/dis/') ?>" + no;
                $.ajax({
                    url : u,
                    success : function(msg){
                        $(".destinasii").append(msg);
                    }
                });
                no = no+6;
            });
        });
    </script>

   