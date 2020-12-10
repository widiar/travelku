<div class="container-fluid">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-12">
            <div class="card shadow mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 mb-4">Edit Transportasi</h1>
                                </div> 
                                
                                <form action="<?= base_url('admin/updateTrans/') . $trans['id'] ?>" method="post" class="tTransport">
                                    <div class="form-group">
                                        <label for="">Nama Destinasi</label>
                                        <input type="text" name="nama" class="form-control" value="<?= $trans['nama'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Dari Provinsi</label> <br>
                                        <select name="dariProv" class="form-control" value="<?= $trans['dari'] ?>">
                                            <?php foreach($provinsi as $prov) : ?>
                                                <option value="<?= $prov['id'] ?>"><?= $prov['name'] ?></option>
                                                <?php if($prov['name'] == $trans['dari']) : ?>
                                                    <option value="<?= $prov['id'] ?>" selected><?= $prov['name'] ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ke Tujuan Provinsi</label> <br>
                                        <select name="keProv" class="form-control">
                                            <?php foreach($provinsi as $prov) : ?>
                                                <option value="<?= $prov['id'] ?>"><?= $prov['name'] ?></option>
                                                <?php if($prov['name'] == $trans['tujuan']) : ?>
                                                    <option value="<?= $prov['id'] ?>" selected><?= $prov['name'] ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jenis Transportasi</label> <br>
                                        <select name="jenis" class="form-control">
                                            <option value="Udara" <?php if( $trans['jenis'] == "Udara") echo "selected"; ?>>Lewat Udara</option>
                                            <option value="Laut" <?php if( $trans['jenis'] == "Laut") echo "selected"; ?>>Lewat Laut</option>
                                            <option value="Darat" <?php if( $trans['jenis'] == "Darat") echo "selected"; ?>>Lewat Darat</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="number" name="harga" class="form-control" value="<?= $trans['harga'] ?>">
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