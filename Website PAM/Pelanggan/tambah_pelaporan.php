<?php

$title = 'Data Pelaporan';

include 'header.php';
include '../kontroler.php'; 
// include berfungsi mengambil fungsi select


// test tombol
if (isset($_POST['tambah'])){

    if(tambah_data_pelaporan($_POST)>0){
        echo "<script> alert('Mohon Mencetak Struk Pembayaran Pada Halaman Riwayat');
                document.location.href='pelaporan.php'
            </script>";
    } else{
        echo "<script> alert('Mohon Untuk Memasukan Data Dengan Benar');
                document.location.href='tambah_pelaporan.php'
            </script>";
    }
}


?>
    <div class="container mt-5">
        <h1 style="text-align: center;">TAMBAH LAPORAN</h1>
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
            <label for="Pemakaian Bulan Ini" class="form-label">PEMAKAIAN BULAN INI</label>
            <input 
            type="number" 
            id="pemakaian_bulan_ini" 
            name="pemakaian_bulan_ini" 
            class="form-control" 
            placeholder="Masukan Kubik Air..." 
            required>
        </div>
   
        <!-- Membuat Tombol Tambah Data -->
        <button class="btn btn-primary" type="submit" name="tambah">Tambah Laporan</button>

        <!-- Membuat Tombol Kembali ke halaman Data -->
        <a href="index.php" class="btn btn-secondary">Kembali</a>

        </form>

        
    </div>