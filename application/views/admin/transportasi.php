<div class="container-fluid">
    <button class="btn -btn-sm btn-primary mt-3 mb-3" data-toggle="modal" data-target="#tambahTransport">
        <i class="fa fa-plus fa-sm"></i>
        Add Transportation
    </button>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr class="text-center">
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Dari</th>
                    <th>Tujuan</th>
                    <th>Harga</th>
                    <th>Jenis</th>
                    <th colspan="2" class="text-center">AKSI</th>
                </tr>
                <?php foreach($travel as $tmp): ?>
                <tr  class="text-center">
                    <td><?= ++$start ?></td>
                    <td><?= $tmp['nama'] ?></td>
                    <td><?= ucwords(strtolower($tmp['dari'])) ?></td>
                    <td><?= ucwords(strtolower($tmp['tujuan'])) ?></td>
                    <td>Rp <?= number_format( $tmp['harga'],0,".",".")?></td>
                    <td><?= $tmp['jenis'] ?></td>
                    <td>
                        <a href="<?= base_url('admin/edittransportasi/') . $tmp['id'] ?>">
                        <div class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                        </div>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/hapustransportasi/') . $tmp['id'] ?>" class="hapusTransportasi">
                        <div class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </div>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
    <div class="modal fade" id="tambahTransport" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahlokasimodal">Add Destination</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambahTransportasi') ?>" method="post" class="tTransport">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Destinasi</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Dari Provinsi</label> <br>
                        <select name="dariProv" class="form-control" required>
                            <?php foreach($provinsi as $prov) : ?>
                                <option value="<?= $prov['id'] ?>"><?= $prov['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Ke Tujuan Provinsi</label> <br>
                        <select name="keProv" class="form-control" required>
                            <?php foreach($provinsi as $prov) : ?>
                                <option value="<?= $prov['id'] ?>"><?= $prov['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Transportasi</label> <br>
                        <select name="jenis" class="form-control" required>
                            <option value="Udara">Lewat Udara</option>
                            <option value="Laut">Lewat Laut</option>
                            <option value="Darat">Lewat Darat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="number" name="harga" class="form-control" required>
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