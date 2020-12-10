<link rel="stylesheet" href="<?= base_url('assets/css/datepicker.css') ?>">
<script src="<?= base_url('assets/js/datepicker.js') ?>"></script>
<div class="container-fluid">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-12">
            <div class="card shadow mt-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 mb-4">Edit Profile</h1>
                                </div> 
                                <button class="btn -btn-sm btn-primary mt-3 mb-3" data-toggle="modal" data-target="#ubahpass">
                                    <i class="fa fa-plus fa-sm"></i>
                                    Ubah Password
                                </button>
                                <form action="<?= base_url('user/updateProfile/') . $user['id'] ?>" method="post" enctype="multipart/form-data" class="editProfile">
                                    <div class="form-group">
                                        <label for="">Nama User</label>
                                        <input type="text" name="nama" class="form-control" required value="<?= $user['nama'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email User</label>
                                        <input type="email" name="email" class="form-control" required value="<?= $user['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="text" name="tlahir" class="form-control" id="tlahir" required value="<?= $user['tanggal_lahir'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <br>
                                        <select class="form-control provinsi" required id="provinsi" name="provinsi">
                                            <?php foreach($provinsi as $pul) : ?>
                                            <option value="<?= $pul['id'] ?>" <?php if($pul['id'] == $user['provinsi']) echo "selected" ?> ><?= $pul['name'] ?></option>
                                            <?php endforeach; ?>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <br>
                                        <select class="form-control kabupaten" required id="kabupaten" name="kabupaten">
                                            <?php foreach($kabupaten as $pul) : ?>
                                            <option value="<?= $pul['id'] ?>" <?php if($pul['id'] == $user['kabupaten']) echo "selected" ?> ><?= $pul['name'] ?></option>
                                            <?php endforeach; ?>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <br>
                                        <select class="form-control kecamatan" required id="kecamatan" name="kecamatan">
                                            <?php foreach($kecamatan as $pul) : ?>
                                            <option value="<?= $pul['id'] ?>" <?php if($pul['id'] == $user['kecamatan']) echo "selected" ?> ><?= $pul['name'] ?></option>
                                            <?php endforeach; ?>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <br>
                                        <select class="form-control kelurahan" required id="kelurahan" name="kelurahan">
                                            <?php foreach($kelurahan as $pul) : ?>
                                            <option value="<?= $pul['id'] ?>" <?php if($pul['id'] == $user['kelurahan']) echo "selected" ?> ><?= $pul['name'] ?></option>
                                            <?php endforeach; ?>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Lengkap</label>
                                        <br>
                                        <textarea class="form-control" name="alamat" cols="30" rows="10"><?= $user['alamat'] ?></textarea>
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
    <div class="modal fade" id="ubahpass" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahlokasimodal">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/ubahpass/') . $user['id'] ?>" method="post" class="ubahpassword">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Password Lama</label>
                        <input type="password" name="passlama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password Baru</label>
                        <input type="password" name="passbaru" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Retype Password Baru</label>
                        <input type="password" name="passbaru2" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#tlahir').datepicker({
        autoHide: true,
        format: 'yyyy-mm-dd'
    });
</script>