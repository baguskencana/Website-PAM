<?php

$title = 'Data Pelaporan';

include 'header.php';
include '../kontroler.php'; 
// include berfungsi mengambil fungsi select


// test tombol
if (isset($_POST['tambah'])){

    if(tambah_data_pelanggan($_POST)>0){
        echo "<script> alert('Data Berhasil Terinput');
                document.location.href='pelanggan.php'
            </script>";
    } else{
        echo "<script> alert('Mohon Untuk Mencoba Lagi');
                document.location.href='tambah_pelanggan.php'
            </script>";
    }
}


?>
    <div class="container mt-5">
        <h1 style="text-align: center;">TAMBAH PELANGGAN</h1>
        <hr>
        <!-- membuat form -->
        <form action="" method="post">
        <div class="mb-3">
            <label for="id" class="form-label">ID Pelanggan</label>
            <input 
            type="number" 
            id="id" 
            name="id" 
            class="form-control" 
            placeholder="Masukan ID..." 
            required>
        </div>
       
        <div class="mb-3">
            <label for="Pemakaian Bulan Ini" class="form-label">Nama</label>
            <input 
            type="text" 
            id="nama" 
            name="nama" 
            class="form-control" 
            placeholder="Masukan Namar..." 
            required>
        </div>
   
        <!-- Membuat Tombol Tambah Data -->
        <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>

        <!-- Membuat Tombol Kembali ke halaman Data -->
        <a href="index.php" class="btn btn-secondary">Kembali</a>

        </form>

        
    </div>