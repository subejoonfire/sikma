<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ml-auto w-100">
                <div class="card-header text-right">
                    <h3 class="card-title">Laporan Kas Masjid</h3>
                </div>
                <div class="card-body">
                    <?php if (session()->has('success')) { ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php } elseif (session()->has('error')) { ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php } ?>
                    <form action="<?= base_url('admin/uang-kas-masjid/store') ?>" method="post">
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
                                        <a href="<?= base_url('admin/uang-kas-masjid/edit/' . $row['id_kas']) ?>" class="btn btn-primary">Edit</a>
                                        <a href="<?= base_url('admin/uang-kas-masjid/delete/' . $row['id_kas']) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
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
                        <a href="<?= base_url('admin/uang-kas-masjid') ?>">&times;</a>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/uang-kas-masjid/update/' . $edit['id_kas']) ?>" method="post">
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
                        <a href="<?= base_url('admin/uang-kas-masjid') ?>" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>