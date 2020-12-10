<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5 mb-5">
            <div class="card">
                <div class="card-header alert alert-success">
                    Invoice Pembayaran Anda
                </div>
                <div class="card-body">
                    <?php if($invoice['paket'] == '2') : ?>
                        <h3 class="text-center mb-4">Paket Transportasi</h3>
                    <?php else : ?> 
                        <h3 class="text-center mb-4">Paket Lengkap</h3>
                    <?php endif; ?>
                    <table class="table">
                        <tr>
                            <th>Tanggal Pesan</th>
                            <td> : </td>
                            <td><?= date("d - F - Y", strtotime($invoice['tgl_pemesanan'])) ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Berangkat</th>
                            <td> : </td>
                            <td><?= date("d - F - Y", strtotime($invoice['tgl_berangkat'])) ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Selesai</th>
                            <td> : </td>
                            <td><?= date("d - F - Y", strtotime($invoice['tgl_pulang'])) ?></td>
                        </tr>
                        <tr>
                            <th>Nama Destinasi</th>
                            <td> : </td>
                            <td><?= $invoice['nama_destinasi'] ?> - <?= number_format($invoice['harga_destinasi'],0,".",".") ?></td>
                        </tr>
                        <tr>
                            <th>Nama Transportasi</th>
                            <td> : </td>
                            <td><?= $invoice['transportasi'] ?> - <?= number_format($invoice['harga_transportasi'],0,".",".") ?></td>
                        </tr>
                        <?php if($invoice['paket'] == '1' ) : ?>
                        <tr>
                            <th>Nama Hotel</th>
                            <td> : </td>
                            <td><?= $invoice['hotel'] ?> - <?= number_format($invoice['harga_hotel'],0,".",".") ?></td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <th>Alamat Pengiriman</th>
                            <td> : </td>
                            <td><?= $invoice['alamatPengiriman'] ?></td>
                        </tr>
                        <tr>
                            <th class="text-success">Total Pembayaran</th>
                            <td> : </td>
                            <td><button class="btn btn-sm btn-success">Rp <?= number_format($invoice['total'], 0 ,".", ".") ?></button></td>
                        </tr>
                        <tr>
                            <?php if($invoice['status_pemesanan'] == '2') : ?>
                                <td><button class="btn btn-block btn-danger mt-3">Pemesanan Dibatalkan</button></td>
                            <?php elseif($invoice['status_pemesanan']=='1') : ?>
                                <td><button class="btn btn-block btn-success mt-3">Transaksi Selesai</button></td>
                            <?php else : ?>
                            <td><button class="btn btn-sm btn-info printinv">Print Invoice</button></td>
                            <td></td>
                            <?php if(empty($invoice['bukti_pembayaran'])) : ?>
                                <td><a href="<?= base_url('travel/batal/') . $invoice['id'] ?>" class="batalkan"><button class="btn btn-sm btn-danger">Batalkan Transaksi</button></a></td>
                            <?php endif; ?>
                            <?php endif; ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-5 mb-5">
            <div class="card">
                <div class="card-header alert alert-primary">
                    Informasi Pembayaran
                </div>
                <div class="card-body">
                    <p class="mb-3">Harap Melakukan Pembayaran ke Salah Satu Rekening di bawah ini</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">BCA asio</li>
                        <li class="list-group-item">BCA asio</li>
                        <li class="list-group-item">BCA asio</li>
                        <li class="list-group-item">BCA asio</li>
                    </ul>
                    <?php if($invoice['status_pemesanan'] == '2') : ?>
                    <button class="btn btn-sm btn-danger btn-block mt-4">Transaksi Dibatalkan!</button>
                    <?php else : ?>
                    <?php if(empty($invoice['bukti_pembayaran'])) : ?>
                        <button class="btn btn-sm btn-info btn-block mt-4" data-toggle="modal" data-target="#pembayaran"><i class="fa fa-check"></i>Upload Bukti Pembayaran</button>
                    <?php elseif($invoice['status_pembayaran'] == '0') : ?>
                        <button class="btn btn-sm btn-warning btn-block mt-4" data-toggle="modal" data-target="#bukti"><i class="fa fa-check"></i>Menunggu Konfirmasi</button>
                    <?php else : ?>
                        <button class="btn btn-sm btn-success btn-block mt-4" data-toggle="modal" data-target="#bukti"><i class="fa fa-check"></i>Pembayaran Terkonfirmasi</button>
                    <?php endif; ?>
                    <?php endif; ?>
    
                </div>
            </div>
        </div>
    </div>
    </iframe>
    <div class="modal fade" id="bukti" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php $bukti = explode(".", $invoice['bukti_pembayaran']); ?>
                    <img src="<?= base_url('assets/pembayaran/') . $invoice['bukti_pembayaran'] ?>" width="100%" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pembayaran" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('travel/upload_pembayaran/') . $invoice['id'] ?>" method="post" enctype="multipart/form-data" class="upload_bukti">
                    <div class="modal-body">
                        <label for="">Upload Bukti</label><br>
                        <div class="custom-file">
                            <input type="file" name="buktibayar" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <small class="text-danger mt-3">Pastikan bukti pembayaran berformat jpg, jpeg atau png</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>