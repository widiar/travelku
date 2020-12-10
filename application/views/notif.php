<div class="container">
    <div class="row mt-5 mb-5">
    <?php if(empty($invoice)) : ?>
        <h1 class="text-center">Anda Belum mempunyai Pemberitahuan</h1>
    <?php else : ?>
    <?php foreach($invoice as $inv) : ?>
        <div class="card mx-auto mb-3" style="width: 50rem;">
            <div class="card-body">
                <?php if($inv['paket'] == '1') : ?>
                    <h4 class="card-title">Paket Lengkap</h4>
                <?php else : ?>
                    <h4 class="card-title">Paket Transportasi</h4>
                <?php endif; ?>
                <p class="card-text"><?= date("d/m/Y", strtotime($inv['tgl_berangkat'])) . " - " . date("d/m/Y", strtotime($inv['tgl_pulang'])) ?></p>
                <?php if($inv['status_pemesanan'] == '0') : ?>
                    <div class="btn btn-sm btn-info mt-3">Sedang Proses</div>
                <?php elseif($inv['status_pemesanan'] == '1') : ?>
                    <div class="btn btn-sm btn-success mt-3">Sudah selesai</div>
                <?php else : ?>
                    <div class="btn btn-sm btn-danger mt-3">Dibatalkan</div>
                <?php endif; ?>
                <br>
                <a href="<?= base_url('travel/pembayaran/') . $inv['id'] ?>">
                    <button class="btn btn-sm btn-primary mt-3">Lihat Detail</button>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>
    </div>
</div>