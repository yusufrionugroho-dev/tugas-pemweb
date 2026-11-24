<?php 
    // Data Server
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'crud';

    // FUngsi koneksi
    $koneksi = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Cek Koneksi
    if ($koneksi->connect_error) {
        die("Koneksi Gagal: " . $koneksi->connect_error);
    }
?>