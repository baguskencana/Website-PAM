<?php

$host ='localhost';                                 // Set Localhost
$user ='root';                                      // Set Nama Localhost
$pass ='';                                          // Set Pasword
$db ='db pam';                                    // Set Nama Database


$koneksi = mysqli_connect($host, $user, $pass,$db);
if(!$koneksi){
    die("cannot connect to database.");
}
// echo "Connected successfully";



mysqli_select_db($koneksi,$db);
?>