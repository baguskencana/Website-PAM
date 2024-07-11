<?php

$title = 'Data PELAPORAN';

include '../kontroler.php'; 
// include berfungsi mengambil fungsi select


// Mengambil id
$nomor = (int)$_GET['nomor'];

// Mengambil data buku
$struk = select("SELECT * , strukk.bulan_ini-strukk.bulan_lalu as pemakaian,
(strukk.bulan_ini-strukk.bulan_lalu)*2800 as total FROM strukk WHERE nomor = $nomor")[0];


// test tombol
if (isset($_POST['update'])){

    if(struk_cetak($_POST)>0){
        echo "<script> alert('Data berhasil diupdate');
                document.location.href='pelaporan.php'
            </script>";
    } else{
        echo "<script> alert('Data gagal diupdate');
                document.location.href='pelaporan.php'
            </script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .receipt {
            width: 300px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
        }

        .header {
            text-align: center;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
        }

        .meta {
            color: #888;
            font-size: 14px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            text-align: left;
            padding: 5px;
            border-bottom: 1px solid #ddd;
        }

        tfoot {
            text-align: right;
        }

        .total {
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="receipt">
        <div class="header">
            <div class="title">Struk Pembayaran</div>
            <div class="meta">Tanggal: <?= $struk['tanggal'] ;?></div>
        </div>

        <table>
            <tbody>
                <tr>
                    <td>ID Pelanggan</td>
                    <td><?= $struk['id__'] ;?></td>
                </tr>
                <tr>
                    <td>Nama </td>
                    <td><?= $struk['nama_'] ;?></td>
                </tr>
            </tbody>
        </table>

        <table>
            <tbody>
                <tr>
                    <td>Total Pembayaran</td>
                    <td>Rp <?= $struk['total'];?></td>
                </tr>
                <tr>
                    <td>Pemakaian Bulan Ini</td>
                    <td><?= $struk['pemakaian'];?></td>
                </tr>
            </tbody>
        </table>
        <div class="header">
            <div class="title">Terima Kasih</div>
            <div class="meta">Mohon Dibayar Sebelum Tanggal 20</div>
        </div>
        </div>

    </div>

</body>
<p >

</p>

</html>
<script>
    window.print();
</script>