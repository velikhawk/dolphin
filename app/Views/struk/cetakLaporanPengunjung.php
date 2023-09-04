<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body onload="window.print()">
    <center>
        <table style="width: 100%; border-collapse: collapse; text-align: center;" border="1">
            <tr>
                <td>
                    <table style="width: 100%; text-align: center;" border="0">
                        <tr style="text-align: center;">
                            <td>
                                <h1>BATANG SAFARI BEACH</h1>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="width: 100%; text-align: center;" border="0">
                        <tr style="text-align: center;">
                            <td>
                                <h3>Laporan</h3>
                                <br>
                                Periode : <?= $tglawal . " s/d " . $tglakhir; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <table border="1" style="width: 90%; border-collapse: collapse; border: 1px solid #000;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Pengunjung</th>
                                                <th>Nama Pengunjung</th>
                                                <th>ID Tiket</th>
                                                <th>Tanggal</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Total Harga (Rp)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1 ?>
                                        <?php $totalHargaKeseluruhan = 0 ?>
                                        <?php foreach ($laporan as $row) : ?>
                        <tr>
                        <td style="text-align: center;"><?= $i++; ?></td>
                            <td><?= $row['idpengunjung']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['idtiket']; ?></td>
                            <td><?= $row['tanggal']; ?></td>
                            
                            <td>Rp.<?= $row['harga']; ?></td>
                            <td><?= $row['jumlah']; ?></td>
                            <?php $totalHarga = $row['harga'] * $row['jumlah']; ?>
                            <td style="text-align: center;"><?= number_format($totalHarga, 0, ",", "."); ?></td>
                                                    <?php $totalHargaKeseluruhan += $totalHarga ?>
                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="6">Total Harga Keseluruhan</th>
                                                <th style="text-align: center;"><?= number_format($totalHargaKeseluruhan, 0, ",", "."); ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </center>
                                <br>
                                <br>
                                <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>