<div class="container-fluid">
    <button class="btn -btn-sm btn-primary mt-3 mb-3" data-toggle="modal" data-target="#tambahlokasi">
        <i class="fa fa-plus fa-sm"></i>
        Add Location
    </button>

    <div class="card shadow mb-5">
        <div class="card-body">
            <table class="table table-bordered">
                <tr class="text-center">
                    <th>NO</th>
                    <th>Lokasi</th>
                    <th>Gambar</th>
                    <th>Jumlah</th>
                    <th colspan="2" class="text-center">AKSI</th>
                </tr>
                <?php $no=1; foreach($tempat as $tmp): ?>
                <tr  class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $tmp['loc'] ?></td>
                    <td><a href="<?= base_url('assets/img/destination/') . $tmp['gambar'] ?>"><?= $tmp['gambar'] ?></a></td>
                    <td><?= $tmp['destinasi'] ?></td>
                    <td>
                        <a href="<?= base_url('admin/editlokasi/') . $tmp['id'] ?>">
                        <button class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                        </button>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/hapuslokasi/') . $tmp['id'] ?>" class="hapusLokasi">
                        <div class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </div>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div class="modal fade" id="tambahlokasi" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahlokasimodal">Add Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambahlokasi') ?>" method="post" enctype="multipart/form-data" class="tLokasi">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Gambar</label> <br>
                        <input type="file" name="gambar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Banner</label> <br>
                        <input type="file" name="banner" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    
</div>