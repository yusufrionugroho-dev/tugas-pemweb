<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Crud</title>
    <link rel="stylesheet" href="css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="col-md-8 col-md-offset-2">
        <br><br>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="alert alert-warning">
                    <a href="data_add.php" class="btn btn-danger"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
                </div>
            </div>
            <div class="panel-body">
                <div class="container">
                    <h2 align="center">Card Dinamis dari Database PHP</h2>
                    <div class="row" id="load-data">
                        <?php
                            include 'koneksi.php';
                            $query = "SELECT * FROM m_siswa ORDER BY id ASC";
                            $dewan1 = $koneksi->prepare($query);
                            $dewan1->execute();
                            $resl = $dewan1->get_result();
                            while ($row = $resl->fetch_assoc()) {
                                $id = $row['id'];
                                $photo = $row['photo'];
                                $nim = $row['Nim'];
                                $nama = $row['Nama'];
                                $jurusan = $row['Jurusan'];
                                $angkatan = $row['Angkatan'];
                        ?>
                        <div class="card-deck">
                            <div class="card" style="width: 250px;">
                                <img src="img/<?= htmlspecialchars($photo ?? ''); ?>" class="card-img-top" alt="gambar" style="width: 150px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($nama ?? ''); ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($nim ?? ''); ?></p>
                                    <p class="card-text"><?= htmlspecialchars($jurusan ?? ''); ?></p>
                                    <a href="data_edit.php?id=<?= htmlspecialchars($id ?? ''); ?>" class="btn btn-primary">Selanjutnya</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Angkatan <?= htmlspecialchars($angkatan ?? ''); ?></small>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-1.10.2.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/hapus.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
</body>
</html>
