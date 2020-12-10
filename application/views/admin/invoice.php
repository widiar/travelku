<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr class="text-center">
                    <th>NO</th>
                    <th>Nama User</th>
                    <th>Destinasi</th>
                    <th>Paket</th>
                    <!-- <th>Alamat Dikirim</th> -->
                    <th>Total</th>
                    <th>Bukti Pembayaran</th>
                    <th>Status</th>
                    <th colspan="2" class="text-center">Aksi</th>
                </tr>
                <?php $no = 1;
                foreach ($invoice as $tmp) : ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $tmp['nama_user'] ?></td>
                        <td><?= ucwords(strtolower($tmp['nama_destinasi'])) ?></td>
                        <td><?php if ($tmp['paket'] == '1') echo "Lengkap";
                            else echo "Transportasi" ?></td>

                        <td><?= number_format($tmp['total'], 0, ".", ".") ?></td>
                        <?php if (empty($tmp['bukti_pembayaran'])) : ?>
                            <td>
                                <div class="btn btn-sm btn-danger"><i class="fa fa-info-circle"></i></div>
                            </td>
                        <?php elseif ($tmp['status_pembayaran'] == '0') : ?>
                            <td><a href="<?= base_url('admin/lihat_pembayaran/') . $tmp['id'] ?>" class="lihatBukti">
                                    <button class="btn btn-sm btn-secondary"><i class="fa fa-check-circle"></i></button>
                                </a></td>
                        <?php else : ?>
                            <td><a href="<?= base_url('admin/lihat_pembayaran/') . $tmp['id'] ?>" class="lihatBukti">
                                    <button class="btn btn-sm btn-primary"><i class="fa fa-check-circle"></i></button>
                                </a></td>
                        <?php endif; ?>
                        <td><?php if ($tmp['status_pemesanan'] == '0') : ?>
                                <div class="btn btn-sm btn-info">Proses</div>
                            <?php elseif ($tmp['status_pemesanan'] == '1') : ?>
                                <div class="btn btn-sm btn-success">Selesai</div>
                            <?php else : ?>
                                <div class="btn btn-sm btn-danger">Batal</div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($tmp['status_pemesanan'] == '0' && $tmp['status_pembayaran'] == '1') : ?>
                                <a href="<?= base_url('admin/selesaikanstatus/') . $tmp['id'] ?>" class="ubahstatus">
                                    <div class="btn btn-primary btn-sm">
                                        <i class="fa fa-check"></i>
                                    </div>
                                </a>
                            <?php elseif ($tmp['status_pemesanan'] == '2') : ?>
                                <div class="btn btn-sm btn-danger"><i class="fa fa-exclamation"></i></div>
                            <?php elseif ($tmp['status_pemesanan'] == '1' || $tmp['status_pembayaran'] == '0') : ?>
                                <div class="btn btn-sm btn-success"><i class="fa fa-check"></i></div>
                            <?php endif; ?>

                        </td>
                        <td>
                            <?php if ($tmp['status_pemesanan'] == '0' && $tmp['status_pembayaran'] == '1') : ?>
                                <a href="<?= base_url('admin/batalstatus/') . $tmp['id'] ?>" class="ubahstatus">
                                    <div class="btn btn-danger btn-sm">
                                        <i class="fa fa-times"></i>
                                    </div>
                                </a>
                            <?php elseif ($tmp['status_pemesanan'] == '2') : ?>
                                <div class="btn btn-sm btn-danger"><i class="fa fa-exclamation"></i></div>
                            <?php elseif ($tmp['status_pemesanan'] == '1' || $tmp['status_pembayaran'] == '0') : ?>
                                <div class="btn btn-sm btn-secondary"><i class="fa fa-times"></i></div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
    <div class="modal fade" id="pembayaran" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pembayaranmodal">

                </div>
                <div class="modal-footer pembayaranmodalfooter">

                </div>
            </div>
        </div>
    </div>
</div>