<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ml-auto w-100">
                <div class="card-header text-right">
                    <h3 class="card-title">Laporan Kas Sosial</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/laporan-kas/printSosial') ?>" method="post">
                        <div class="form-group">
                            <label for="bulan">Bulan:</label>
                            <select id="bulan" name="bulan" class="form-control">
                                <option value="">Pilih</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun:</label>
                            <select id="tahun" name="tahun" class="form-control">
                                <option value="">Pilih</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-secondary">Print</button>
                    </form>
                    <br>
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