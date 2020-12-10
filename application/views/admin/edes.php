<div class="container-fluid">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-12">
            <div class="card shadow mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 mb-4">Edit Destinasi</h1>
                                </div> 
                                
                                <form action="<?= base_url('admin/updateDestinasi/') . $tempat['id'] ?>" method="post" enctype="multipart/form-data" class="tDesti">
                                    <div class="form-group">
                                        <label for="">Nama Destinasi</label>
                                        <input type="text" name="nama" class="form-control" required value="<?= $tempat['nama_destinasi'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Pulau</label>
                                        <br>
                                        <select class="selectpicker form-control pulau" data-live-search="true" required title="Lokasi" data-size="7" id="pulau" name="pulau">
                                            <?php foreach($pulau as $pul) : ?>
                                            <option value="<?= $pul['id'] ?>" <?php if($pul['id'] == $tempat['id_pulau']) echo "selected" ?> ><?= $pul['loc'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <br>
                                        <select class="selectpicker form-control provinsi" data-live-search="true" required title="Provinsi" data-size="7" id="provinsi" name="provinsi">
                                            <?php foreach($provinsi as $pul) : ?>
                                            <option value="<?= $pul['id'] ?>" <?php if($pul['id'] == $tempat['id_provinsi']) echo "selected" ?> ><?= $pul['name'] ?></option>
                                            <?php endforeach; ?>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <br>
                                        <select class="selectpicker form-control kabupaten" data-live-search="true" required title="Kabupaten" data-size="7" id="kabupaten" name="kabupaten">
                                            <?php foreach($kabupaten as $pul) : ?>
                                            <option value="<?= $pul['id'] ?>" <?php if($pul['id'] == $tempat['id_kabupaten']) echo "selected" ?> ><?= $pul['name'] ?></option>
                                            <?php endforeach; ?>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="number" name="harga" class="form-control" value ="<?= $tempat['harga'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Berapa Hari</label>
                                        <input type="number" name="hari" class="form-control" value="<?= $tempat['hari'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar</label> <br>
                                        <img src="<?= base_url('assets/img/place/') . $tempat['gambar'] ?>" alt="">
                                        <input type="hidden" value="<?= $tempat['gambar'] ?>" name="gambar_lama">
                                        <input type="file" name="gambar" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Banner</label> <br>
                                        <img src="<?= base_url('assets/img/banner/destinasi/') . $tempat['banner'] ?>" alt="" width="100%">
                                        <input type="hidden" value="<?= $tempat['banner'] ?>" name="banner_lama">
                                        <input type="file" name="banner" class="form-control">
                                    </div>

                                    <div class="form-gruup">
                                        <label>Deskripsi</label>
                                        <input type="hidden" value='<?= $tempat['deskripsi'] ?>' id="tmpDes">     
                                        <textarea name="deskripsi" id="deskripsiD" class = "deskripsiD" required></textarea>
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

<script>
    CKEDITOR.replace('deskripsiD');
    CKEDITOR.instances.deskripsiD.setData($("#tmpDes").val());
</script>