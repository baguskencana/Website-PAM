<?php

$title = 'Data Member';

include 'header.php';
include '../kontroler.php'; 
// include berfungsi mengambil fungsi select

// Menerima data Login (membatasi user)



// Memanggil Data Buku

?>
    <div class="container mt-5">
        <h1 style="text-align: center;">DATA PELANGGAN</h1>
        <hr>
        <!-- membuat tombol tambah -->
        <a href="tambah_pelanggan.php" class="btn btn-primary mb-5">Tambah</a>
        
        <table class="table table-striped mt-3" id="table">
            <?php 
            $data_pelanggan = select("SELECT * FROM pelanggann ORDER BY id_pelanggan ASC");
            // ini berfungsi untung mengambil data yang berada di database
             ?>
            <thead>
                <tr>
                    <th>ID Pelanggan</th>
                    <th >Nama</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    // Mendeklarasikan No dimulai dari 1
                    $no = 1;  // konsep berulang
                    ?>
                <?php 
                    // Mendeklarasikan variabel data buku menjadi data buku
                    foreach ($data_pelanggan as $pelanggan) :
                    // ini digunakan untuk data pengulangan array dari database (ini digunakan dalam membaca data berupa array)
                    ?>
                <tr>
                    <td><?= $pelanggan['id_pelanggan'] ;?></td>
                    <td><?= $pelanggan['nama'] ;?></td>


                    <td width=15% class="text-center">
                        <!--==================  Membuat Tombol EDIT ==================-->
                        <a href="#" class="btn btn-success">Edit</a>

                        <!--==================  Membuat Tombol HAPUS ==================-->
                        <a href="member_hapus.php?NIM=<?=$member["NIM"];?>"class="btn btn-danger"onclick="return confirm('Apakah Anda Ingin Menghapus Data Mahaiswa? ')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach 
                // ini juga perlu karena akhir dari foreach
                ?>
            </tbody>
        </table>
    </div>