<?php 
    include "koneksi.php";

    $id = $_POST['id'];
    $angkatan = $_POST['angkatan'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $photo = $_FILES['photo']['name'];

    if($angkatan == "" || $nama == "" || $nim == "" || $jurusan == ""){
?>
    <script language="javascript">
        alert('Masih ada data yang kosong');
        document.location.href="data_edit.php?id=<?= $id ?>";
    </script>
    <?php 
    }
    if($photo != ""){
        $ekstensi_diperbolehkan = array ('png', 'jpg');
        $x = explode('.', $photo);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['photo']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak.'-'.$photo;
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'img/'.$nama_gambar_baru);
            $query = "UPDATE m_siswa SET angkatan='$angkatan', nama='$nama', nim='$nim', jurusan='$jurusan', photo='$nama_gambar_baru' WHERE id='$id' ";
            $result = mysqli_query($koneksi, $query);
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
            }else {
                echo "<script>alert('Data berhasil diubah.');window.location='index-copy.php';</script>";
            }
        } else{
            echo "<script>alert('EKstensi  gambar yang boleh hanya jpg atau png.');window.location='index-copy.php';</script>";
        }
    }
    else
    {
        $query = "UPDATE m_siswa SET angkatan='$angkatan', nama='$nama', nim='$nim', jurusan='$jurusan' WHERE id='$id' ";
        $result = mysqli_query($koneksi, $query);
        if(!$result) {
           die("Query gagal dijalankan: ".mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
        }else{
            echo "<script>alert('Data berhasil diubah.');window.location='index-copy.php';</script>";
        }
    }