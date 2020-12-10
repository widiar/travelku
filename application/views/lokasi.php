<div class="bradcam_area bradcam_bg_2" style="background-image: url(<?= base_url('assets/img/banner/lokasi/') . $travel[0]['banner'] ?>);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3><?= $travel[0]['loc'] ?></h3>
                        <p>-Suatu Kenangan Tercipta Dari Perjalanan-</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="popular_places_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row tempats">
                    <?php foreach($travel as $trv) : ?>
                        <div class="col-lg-6 col-md-6">
                            <div class="single_place">
                                <div class="thumb">
                                    <img src="<?= base_url('assets/img/place/') . $trv['gambar'] ?>" alt= ""height="200" width="50"">
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
                                <a class="boxed-btn4 tempatlains" href="#">Tempat lain</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                                <button class="boxed-btn4 " type="submit" >Submit</button>
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

<script>
        var no = 4;
        $(document).ready(function(){
            $(".tempatlains").click(function(e){
                e.preventDefault();
                var u = "<?= base_url('travel/lok/') ?>" + no;
                var idp = "<?= $travel[0]['id_pulau'] ?>";
                $.ajax({
                    url : u,
                    type : "post",
                    data : "id_pulau=" + idp,
                    success : function(msg){
                        // console.log(msg);
                        $(".tempats").append(msg);
                    }
                });
                no = no+4;
            });
        });
    </script>