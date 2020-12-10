<style>
    .hariH{
        -moz-appearance: none;
        -webkit-appearance: none;
        appearance: none;
    }
    /* p { word-break: break-all } */
</style>
 <div class="destination_banner_wrap overlay" style="background-image: url(<?= base_url('assets/img/banner/destinasi/') . $travel['banner'] ?>);">
        <div class="destination_text text-center">
            <h3><?= $travel['nama_destinasi'] ?></h3>
        </div>
    </div>
 <div class="destination_details_info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <div class="destination_info ds">
                        <h3>Description</h3>
                        <?= $travel['deskripsi'] ?>
                    </div>
                    <input type="hidden" class="travelprov" value="<?= $travel['id_provinsi'] ?>">
                    <input type="hidden" class="travelkab" value="<?= $travel['id_kabupaten'] ?>">
                    <div class="bordered_1px"></div>
                    <!-- <div class="contact_join"> -->
                        <form action="<?= base_url('travel/checkout') ?>" method="post">
                            <input type="hidden" name="paket" class="pilihPaket">
                            <input type="hidden" name="id_dest" value="<?= $travel['id'] ?>">
                            <input type="hidden" name="harga_dest" value="<?= $travel['harga'] ?>">
                            <div class="row">                                
                                <div class="col-lg-6 col-md-6 text-center">
                                    <button type="button" class="btn btn-outline-primary btn-lg bLengkap">Paket Lengkap</button>
                                </div>
                                <div class="col-lg-6 col-md-6 text-center">
                                    <button type="button" class="btn btn-outline-danger btn-lg bTransport">Paket Transportasi</button>
                                </div>
                            </div>
                            <hr class="mt-5">
                            <input type="hidden" id="session" value="<?= $this->session->user; ?>">
                            <div class="row hTanggal">
                                <div class="col-lg-6 mt-4 mb-4"> 
                                    <label><b>Berapa Hari</b></label><br>
                                    <div class="input-group">
                                        <select name="hariH" class="form-control hariH">
                                            <?php for($i=1; $i<=$travel['hari']; $i++) : ?>
                                                <option value="<?= $i ?>"><?= $i ?> Hari</option>
                                            <?php endfor; ?>
                                        </select>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 mb-4"> 
                                    <input type="hidden" name="tgl_pemesanan" value="<?= date("Y-m-d"); ?>">
                                    <label><b>Tanggal Mulai</b></label><br>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Pilih Tanggal" name="pilihtanggal" id="pilihtanggal">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="alamatz text-center">
                                <h3 class="mb-5">Masukkan Alamat</h3>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single_input">
                                            <button type="button" class="genric-btn large success circle aSaatIni">Alamat Saat Ini</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single_input">
                                            <button type="button" class="genric-btn large primary circle aLain">Gunakan Alamat Lain</button>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-5">
                            </div>
                            <?php if($this->session->user) : ?>
                            <div class="alamatSaatIni">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <label><b>Provinsi</b></label>
                                        <div class="input-group">
                                            <input type="hidden" name="alamatProvinsi" value="<?= $user['idprov'] ?>">
                                            <select name="" class="custom-select aProvinsi" disabled>
                                                <option value="<?= $user['idprov'] ?>"><?= $user['provinsi'] ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label><b>Kabupaten</b></label>
                                        <div class="input-group">
                                            <input type="hidden" name="alamatKabupaten" value="<?= $user['idkab'] ?>">
                                            <select name="alamatKabupaten" class="custom-select aKabupaten" disabled>
                                                <option value="<?= $user['idkab'] ?>"><?= $user['kabupaten'] ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label><b>Alamat Lengkap</b></label><br>
                                    <input type="hidden" name="alamatLengkap" value="<?= $user['alamat'] ?>">
                                    <textarea name="alamatLengkap" disabled class="single-textarea" placeholder="Alamat Lengkap"><?= $user['alamat'] ?></textarea>
                                </div>
                                <hr>
                            </div>
                            <div class="alamatLain">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <label><b>Provinsi</b></label>
                                        <div class="input-group">
                                            <select name="alamatProvinsi" class="custom-select aProvinsi">
                                                <option value="" selected disabled>Pilih Provinsi</option>
                                                <?php foreach($provinsi as $prov) : ?>
                                                    <option value="<?= $prov['id'] ?>"><?= $prov['name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label><b>Kabupaten</b></label>
                                        <div class="input-group">
                                            <select name="alamatKabupaten" class="custom-select aKabupaten">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label><b>Alamat Lengkap</b></label><br>
                                    <textarea name="alamatLengkap" class="single-textarea" placeholder="Alamat Lengkap"></textarea>
                                </div>
                                <hr>
                            </div>
                            <?php endif; ?>

                            <div class="plengkap">
                                <?php if(!$this->session->user) : ?>
                                <a href="<?= base_url('user/login/') . $travel['id'] ?>"><button type="button" class="btn btn-danger btn-lg btn-block">LOGIN DULU</button></a>
                                <?php else : ?>
                                    <h3 class="mt-4">Paket Lengkap</h3>
                                    <small><i>*Paket ini sudah termasuk guide dan tour</i></small><br class="mb-3">

                                    <div class="lengkapah">
                                        <label class="mt-10">Pilih Jenis Transportasi</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-plane"></i></span>
                                            </div>
                                            <select class="custom-select jenisTransport" name="jenis_transport">
                                                <option selected value="0">Jenis Transportasi</option>
                                                <option value="Udara">Lewat Udara</option>
                                                <option value="Laut">Lewat Laut</option>
                                                <option value="Darat">Lewat Darat</option>
                                            </select>
                                        </div>
                                        <div class="mt-3"></div>  
                                        
                                        <label class="mt-10">Pilih Transportasi</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-car"></i></span>
                                            </div>
                                            <select class="custom-select transports" name="transportasi">
                                                <option selected>Transportasi</option>
                                            </select>
                                        </div>
                                        <div class="mt-3"></div> 
                                    </div>
                                    
                                    <label class="mt-10">Pilih Hotel</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-hotel"></i></span>
                                        </div>
                                        <select class="custom-select hotel" name="hotel">
                                            <option selected>Hotel</option>
                                        </select>
                                    </div>
                                    <div class="mt-3"></div> 

                                <button type="submit" class="btn btn-success btn-lg btn-block">SUBMIT</button>
                                <?php endif; ?>
                            </div>
                            
                            <div class="ptransport">
                                <?php if(!$this->session->user) : ?>
                                <a href="<?= base_url('user/login/') . $travel['id'] ?>"><button type="button" class="btn btn-danger btn-lg btn-block">LOGIN DULU</button></a>
                                <?php else : ?>
                                <h3 class="mt-4">Paket Transportasi</h3>
                                <small><i>*Paket ini hanya menyediakan transportasi</i></small><br class="mb-3">

                                <div class="transportasih">
                                    <label class="mt-10">Pilih Jenis Transportasi</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-plane"></i></span>
                                        </div>
                                        <select class="custom-select jenisTransport2" name="jenis_transport">
                                            <option selected value="0">Jenis Transportasi</option>
                                            <option value="Udara">Lewat Udara</option>
                                            <option value="Laut">Lewat Laut</option>
                                            <option value="Darat">Lewat Darat</option>
                                        </select>
                                    </div>
                                    <div class="mt-3"></div>  

                                    <label class="mt-10">Pilih Transportasi</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-car"></i></span>
                                        </div>
                                        <select class="custom-select transports2" name="transportasi">
                                            <option selected>Transportasi</option>
                                        </select>
                                    </div>
                                    <div class="mt-3"></div> 
                                </div>
                                
                                <button type="submit" class="btn btn-success btn-lg btn-block">SUBMIT</button>
                                <?php endif; ?>
                            </div>
                        </form>
                    <!-- </div> -->

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
                                <h4>Subscribe Our Newsletter</h4>
                                <p>Subscribe newsletter to get offers and about
                                    new places to discover.</p>
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


    