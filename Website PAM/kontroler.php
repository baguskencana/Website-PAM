<?php

include 'koneksi.php';
// Membuat Fungsi untuk menselect semua data

// query berfungsi untuk melakukan kode
function select($query)
{

    // Memanggil Koneksi Database
    global $koneksi;

    // Hasil dari koneksi dan query yang kita panggil
    $result = mysqli_query($koneksi, $query);
    $rows = [];

    // While perulangan database
    while ($row = mysqli_fetch_array($result)){
        $rows[] = $row;

    }
    // Mengembalikan hasil pemanggilan
    return $rows;

}

function tambah_data_pelaporan($post)
{
    // panggil koneksi
    global $koneksi;
    // deklarasi isi table
    $id = $post['id'];
    $pemakaian_bulan_ini = $post['pemakaian_bulan_ini'];
    $tanggal = $post['tanggal'];
    if($pemakaian_bulan_ini<$pemakaian_bulan_lalu){

        echo "<script>
                    alert('Masukan Data Dengan Benar');
                    document.location.href='tambah_pelaporan.php'
                    </script>";
        exit;
    }
    $query1 = "  UPDATE Pelanggann
                SET Pelanggann.pemakaian_bulan_lalu = Pelanggann.pemakaian_bulan_ini, Pelanggann.pemakaian_bulan_ini = $pemakaian_bulan_ini, tanggal_pelaporan =  CURRENT_TIMESTAMP
                WHERE id_pelanggan = $id;";
    mysqli_query($koneksi,$query1);

    $query2 = "  INSERT INTO `Strukk` (`id__`,`nama_`, `bulan_lalu`,`bulan_ini`, `tanggal`)
                SELECT id_pelanggan, nama, pemakaian_bulan_lalu, pemakaian_bulan_ini, tanggal_pelaporan
                FROM Pelanggann
                WHERE id_pelanggan = $id;";
    // eksekusi query
    mysqli_query($koneksi,$query2);
    // mengembalikan koneksi
    return mysqli_affected_rows($koneksi);
}



function struk_pelanggan($post)
{
    // panggil koneksi
    global $koneksi;
    // deklarasi isi table
    $nomor = $post['nomor'];
    $id__ = $post['id__'];
    $nama_ = $post['nama_'];
    $bulan_lalu = $post['bulan_lalu'];
    $bulan_ini = $post['bulan_ini'];
    $tanggal = $post['tanggal'];
    
    $query = "  SELECT * , strukk.bulan_ini-strukk.bulan_lalu as pemakaian,
                (strukk.bulan_ini-strukk.bulan_lalu)*2800 as total FROM strukk WHERE nomor = $nomor;";
    // eksekusi query
    mysqli_query($koneksi,$query);
    // mengembalikan koneksi
    return mysqli_affected_rows($koneksi);
}

function tambah_data_pelanggan($post)
{
    global $koneksi;
    // deklarasi isi table
    $id = $post['id'];
    $nama = $post['nama'];

    $query = "INSERT INTO pelanggann VALUES ('$id',
                                            '$nama',
                                            '0',
                                            '0',
                                            NULL)";
    // eksekusi query
    mysqli_query($koneksi,$query);
    // mengembalikan koneksi
    return mysqli_affected_rows($koneksi);
}

?>