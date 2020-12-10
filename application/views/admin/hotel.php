<div class="container-fluid">
    <a href="<?= base_url('admin/tHotel') ?>">
        <button class="btn -btn-sm btn-primary mt-3 mb-3">
            <i class="fa fa-plus fa-sm"></i>
            Add Hotel
        </button>
    </a>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr class="text-center">
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Provinsi</th>
                    <th>Kabupaten</th>
                    <th>Letak</th>
                    <th>Harga</th>
                    <!-- <th>Deskripsi</th> -->
                    <th colspan="2" class="text-center">AKSI</th>
                </tr>
                <?php foreach($hotel as $tmp): ?>
                <tr  class="text-center">
                    <td><?= ++$start ?></td>
                    <td><?= $tmp['nama'] ?></td>
                    <td><?= ucwords(strtolower($tmp['provinsi'])) ?></td>
                    <td><?= ucwords(strtolower($tmp['kabupaten'])) ?></td>
                    <td><?= $tmp['lokasi'] ?></td>
                    <td><?= $tmp['harga'] ?></td>
                    
                    <td>
                        <a href="<?= base_url('admin/edithotel/') . $tmp['id'] ?>">
                        <div class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                        </div>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/hapushotel/') . $tmp['id'] ?>" class="hapusLokasi">
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