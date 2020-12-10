<div class="container-fluid">
    <a href="<?= base_url('admin/tDestinasi') ?>">
        <button class="btn -btn-sm btn-primary mt-3 mb-3">
            <i class="fa fa-plus fa-sm"></i>
            Add Destination
        </button>
    </a>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr class="text-center">
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Pulau</th>
                    <th>Provinsi</th>
                    <th>Kabupaten</th>
                    <th>Gambar</th>
                    <!-- <th>Deskripsi</th> -->
                    <th colspan="3" class="text-center">AKSI</th>
                </tr>
                <?php foreach($travel as $tmp): ?>
                <tr  class="text-center">
                    <td><?= ++$start ?></td>
                    <td><?= $tmp['nama_destinasi'] ?></td>
                    <td><?= $tmp['loc'] ?></td>
                    <td><?= ucwords(strtolower($tmp['provinsi'])) ?></td>
                    <td><?= ucwords(strtolower($tmp['kabupaten'])) ?></td>
                    <td><a href="<?= base_url('assets/img/place/') . $tmp['gambar'] ?>"><?= $tmp['gambar'] ?></a></td>
                    
                    <td>
                        <a href="<?= base_url('travel/destination/') . $tmp['id'] ?>">
                        <div class="btn btn-success btn-sm">
                            <i class="fas fa-search-plus"></i>
                        </div>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/editdestinasi/') . $tmp['id'] ?>">
                        <div class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                        </div>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/hapusdestinasi/') . $tmp['id'] ?>" class="hapusLokasi">
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
    <!-- <div class="modal fade" id="tambahdestinasi" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahlokasimodal">Add Destination</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            </div>
        </div>
    </div> -->
</div>