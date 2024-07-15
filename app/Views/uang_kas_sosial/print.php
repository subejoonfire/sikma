<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kas Masjid PDF</title>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</head>

<body>
    <h1>Laporan Uang Kas Sosial</h1>
    <table border="1">
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
</body>

</html>