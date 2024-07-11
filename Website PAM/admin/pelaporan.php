<?php

$title = 'Data PELAPORAN';

include 'header.php';
include '../kontroler.php'; 
// include berfungsi mengambil fungsi select


$id = ""; 
$nama	= "";
$tgl	= ""; 
if(isset($_POST['btnTampil'])) {
	$tgl 	= isset($_POST['txtTgl']);
	$nama 	= isset($_POST['txtnama']);
	$id = isset($_POST['txtid']);;
}



?>

    <div class="container mt-5">
        <h1 style="text-align: center;">DATA PELAPORAN</h1> 
        <table class="table table-striped mt-3" id="table">
            <?php 
            $data_tarif = select("SELECT * , strukk.bulan_ini-strukk.bulan_lalu as pemakaian,
            (strukk.bulan_ini-strukk.bulan_lalu)*2800 as total
            FROM strukk ORDER BY tanggal ASC");
            $data_total = select("SELECT SUM(bulan_lalu) AS total_bulanlalu, SUM(bulan_ini) AS total_bulanini FROM strukk");
            $biaya = 2800;
            ?>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Bulan Lalu</th>
                    <th>Bulan Ini</th>
                    <th>Pemakaian</th>
                    <th>Tarif</th>
                    <th>Tanggal Pelaporan</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;  // konsep berulang
                    ?>
                <?php 
                    
                    foreach ($data_tarif as $tarif) :
                    ?>
                <tr>
                    <td><?= $tarif['id__'] ;?></td>
                    <td><?= $tarif['nama_'] ;?></td>
                    <td><?= $tarif['bulan_lalu'] ;?></td>
                    <td><?= $tarif['bulan_ini'] ;?></td>
                    <td><?= $tarif['pemakaian'];?></td>
                    <td><?= $tarif['total'];?></td>
                    <td><?= $tarif['tanggal'] ;?></td>
                </tr>
                <?php endforeach 
                // ini juga perlu karena akhir dari foreach
                ?>
            </tbody>
                <?php 
                    
                    foreach ($data_total as $total) :
                    ?>
            <tbody>
                <tr>
                <td> Total</td>
                <td></td>
                <td></td>
                <td></td>
                <td><?= $total['total_bulanini'] - $total['total_bulanlalu'];?></td>
                <td><?=($total['total_bulanini'] * $biaya - $total['total_bulanlalu'] * $biaya)  ;?></td>
                <td></td>
                </tr>
                <?php endforeach 
                // ini juga perlu karena akhir dari foreach
                ?>
            </tbody>
            <?php 
                    
                    foreach ($data_total as $total) :
                    ?>
            <tbody class="text-center">
                <td width=15% class="text-center">
                    <a href="cetak.php" target="_blank" class="btn btn-success">CETAK</a>
                    </td>
                </tr>
            
                <?php endforeach 
                // ini juga perlu karena akhir dari foreach
                ?>
            </tbody>
        </table>
    </div>