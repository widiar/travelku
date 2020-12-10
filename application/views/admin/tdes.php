<div class="container-fluid">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-12">
            <div class="card shadow mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 mb-4">Tambah Destinasi</h1>
                                </div>
                                <input type="hidden" class="baseurl" value="<?= base_url() ?>">
                                <form action="<?= base_url('admin/tambahdestinasi') ?>" method="post" enctype="multipart/form-data" class="tDesti">
                                    <div class="form-group">
                                        <label for="">Nama Destinasi</label>
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Pulau</label>
                                        <br>
                                        <select class="selectpicker form-control pulau" data-live-search="true" required title="Lokasi" data-size="7" id="pulau" name="pulau">
                                            <?php foreach($tempat as $pulau) : ?>
                                            <option value="<?= $pulau['id'] ?>"><?= $pulau['loc'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <br>
                                        <select class="selectpicker form-control provinsi" data-live-search="true" required title="Provinsi" data-size="7" id="provinsi" name="provinsi">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <br>
                                        <select class="selectpicker form-control kabupaten" data-live-search="true" required title="Kabupaten" data-size="7" id="kabupaten" name="kabupaten">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Berapa Hari</label>
                                        <input type="number" name="hari" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="number" name="harga" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar</label> <br>
                                        <input type="file" name="gambar" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Banner</label> <br>
                                        <input type="file" name="banner" class="form-control" required>
                                    </div>
                                    <div class="form-gruup">
                                        <label>Deskripsi</label>     
                                        <textarea name="deskripsi" id="deskripsiD"></textarea>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-block">Tambah</button>
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
</script>