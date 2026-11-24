<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Table Style -->
     <link rel="stylesheet" href="css/dataTables.bootstrap.css">
     <link rel="stylesheet" href="css/bootstrap.css">
    <title>Project Crud</title>
</head>
<body>
    <div class="col-md-8 col-md-offset-2">
        <br><br>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="alert alert-warning">
                    <a href="index-copy.php" class="btn btn-danger"><i class="glyphicon glyphicon-file"></i> Lihat Data</a>
                </div>
            </div>
            <?php 
                include 'koneksi.php';
                $id = $_GET['id'];
                $result = mysqli_query($koneksi, "SELECT * FROM m_siswa WHERE id='$id'");
                $row = mysqli_fetch_assoc($result);
            ?>
            <div class="panel-body">
                <form method="post" action="data_edit_s.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Id</label>
                        <input class="form-control" name="id" value="<?= $row['id']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Angkatan</label>
                        <input class="form-control" name="angkatan" value="<?= $row['angkatan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" value="<?= $row['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>NIM</label>
                        <input class="form-control" name="nim" value="<?= $row['nim']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input class="form-control" name="jurusan" value="<?= $row['jurusan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <img src="img/<?= $row['photo'] ?>" style="width: 120px;">
                        <input type="file" class="form-control" name="photo">
                        <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-file-tect"></i> Bersih</button>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
     <script src="js/bootstrap.js"></script>
</body>
</html>