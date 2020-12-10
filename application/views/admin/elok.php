<div class="container-fluid">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-12">
            <div class="card shadow mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 mb-4">Edit Lokasi / Pulau</h1>
                                </div> 
                                
                                <form action="<?= base_url('admin/updateLokasi/') . $pulau['id'] ?>" method="post" enctype="multipart/form-data" class="elok">
                                    <div class="form-group">
                                        <label for="">Nama Lokasi / Pulau</label>
                                        <input type="text" name="nama" class="form-control" required value="<?= $pulau['loc'] ?>">
                                    </div>                                   
                                    <div class="form-group">
                                        <label for="">Gambar</label> <br>
                                        <img src="<?= base_url('assets/img/destination/') . $pulau['gambar'] ?>" alt="">
                                        <input type="hidden" value="<?= $pulau['gambar'] ?>" name="gambar_lama">
                                        <input type="file" name="gambar" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Banner</label> <br>
                                        <img src="<?= base_url('assets/img/banner/lokasi/') . $pulau['banner'] ?>" alt="" width="100%">
                                        <input type="hidden" value="<?= $pulau['banner'] ?>" name="banner_lama">
                                        <input type="file" name="banner" class="form-control">
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-block">EDIT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>