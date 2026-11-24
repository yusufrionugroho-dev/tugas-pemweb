<?php 
    // Meminta jembatan koneksi ke database
    include "koneksi.php";
    // Menerima inputan
    $angkatan = $_POST['angkatan'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $photo = $_FILES['photo']['name'];

    if ($angkatan ==" " || $nama== "" || $nim == "" ||$jurusan == "" || $photo == "" ){
?>
    <script language="javascript">
        alert("Masih ada data yang kosong");
        document.location.href="data_add.php";
    </script>
    <?php 
    }
    else
    {   
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.', $photo);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['photo']['tmp_name'];
        $angka_acak = rand(1,999);
        $nama_gambar_baru = $angka_acak. '-'.$photo;
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                move_uploaded_file($file_tmp, 'img/'.$nama_gambar_baru);
                $query = "INSERT INTO m_siswa VALUES (null, '$angkatan', '$nama', '$nim', '$jurusan', '$nama_gambar_baru')";
                $result = mysqli_query($koneksi, $query);
                if(!$result){
                    die ("Query gagal dijalankan: ". mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                }else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='index-copy.php';</script>";
                }
            }else{
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='index-copy.php';</script>";
            }

        if($koneksi->query($sql) === false){
            trigger_error("Perintah SQL Salah: " . $sql . ' Error' . $koneksi->error, E_USER_ERROR);
        }else {
    ?>
        <script language="javascript">
            alert('Berhasil Disimpan');
            document.location.href="index-copy.php";
        </script>
        <?php 
        }
    }
    ?>