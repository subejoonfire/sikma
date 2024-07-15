<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ml-auto w-100">
                <div class="card-header text-right">
                    <h3 class="card-title">Laporan Kas Masjid</h3>
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
                            foreach ($ModelKasMasjid as $row) {
                                $no++ ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['tanggal'] ?></td>
                                    <td><?= $row['ket'] ?></td>
                                    <td>Rp <?= number_format($row['kas_masuk'] ?: 0, 2, ',', '.') ?></td>
                                    <td>Rp <?= number_format($row['kas_keluar'] ?: 0, 2, ',', '.') ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card ml-auto w-100">
                <div class="card-header text-right">
                    <h3 class="card-title">Laporan Kas Masjid</h3>
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
                            foreach ($ModelKasSosial as $row) {
                                $no++ ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['tanggal'] ?></td>
                                    <td><?= $row['ket'] ?></td>
                                    <td>Rp <?= number_format($row['kas_masuk'] ?: 0, 2, ',', '.') ?></td>
                                    <td>Rp <?= number_format($row['kas_keluar'] ?: 0, 2, ',', '.') ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>