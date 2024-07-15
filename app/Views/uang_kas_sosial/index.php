<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ml-auto w-100">
                <div class="card-header text-right">
                    <h3 class="card-title">Laporan Kas Sosial</h3>
                </div>
                <div class="card-body">
                    <?php if (session()->has('success')) { ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php } elseif (session()->has('error')) { ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php } ?>
                    <form action="<?= base_url('admin/uang-kas-sosial/store') ?>" method="post">
                        <h4>Tambah Kas Masuk</h4>
                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <input type="text" id="keterangan" name="keterangan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="kas_masuk">Kas Masuk:</label>
                            <input type="number" id="kas_masuk" name="kas_masuk" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </form>
                    <br>
                    <form>
                        <div class="form-group">
                            <label for="bulan">Bulan:</label>
                            <select id="bulan" name="bulan" class="form-control">
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
                                <?php for ($i = 2020; $i <= date('Y'); $i++) { ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                        <a href="<?= base_url('admin/uang-kas-sosial/print') ?>" class="btn btn-secondary">Print</a>
                    </form>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Kas Masuk</th>
                                <th>Aksi</th>
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
                                    <td>
                                        <a href="<?= base_url('admin/uang-kas-sosial/edit/' . $row['id_kas_sosial']) ?>" class="btn btn-primary">Edit</a>
                                        <a href="<?= base_url('admin/uang-kas-sosial/delete/' . $row['id_kas_sosial']) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Form -->
<?php if (session('edit') == TRUE && isset($edit)) { ?>
    <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kas Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <a href="<?= base_url('admin/uang-kas-sosial') ?>">&times;</a>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/uang-kas-sosial/update/' . $edit['id_kas_sosial']) ?>" method="post">
                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= $edit['tanggal'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <input type="text" id="keterangan" name="keterangan" class="form-control" value="<?= $edit['ket'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="kas_masuk">Kas Masuk:</label>
                            <input type="number" id="kas_masuk" name="kas_masuk" class="form-control" value="<?= $edit['kas_masuk'] ?>">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="<?= base_url('admin/uang-kas-sosial') ?>" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>