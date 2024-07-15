<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Saldo Kas Masjid</h5>
                            <p>Pemasukan: Rp. <?= number_format($total_masuk['kas_masuk'], 2, ',', '.') ?></p>
                            <p>Pengeluaran: Rp. 0</p>
                            <h5>Saldo Akhir</h5>
                            <p>Rp. <?= number_format($total_masuk['kas_masuk'], 2, ',', '.') ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card ml-auto w-100">
                <div class="card-header text-right">
                    <h3 class="card-title">Rekap Kas Masjid</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Kas Masuk</th>
                                <th>Kas Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($data as $row) {
                                $no++ ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['tanggal'] ?></td>
                                    <td><?= $row['ket'] ?></td>
                                    <td>Rp <?= number_format($row['kas_masuk'], 2, ',', '.') ?></td>
                                    <td>Rp. 0</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>