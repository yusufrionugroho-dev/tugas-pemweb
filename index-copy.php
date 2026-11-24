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
                <div class="table">
                    <table class="table tablestriped table-bordered table-hover" id="datTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Angkatan</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jurusan</th>
                                <th>Photo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include 'koneksi.php';
                                $result = mysqli_query($koneksi, "SELECT * FROM m_siswa ORDER BY Nama ASC");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id'] ?? ''); ?></td>
                                    <td><?= htmlspecialchars($row['Angkatan'] ?? ''); ?></td>
                                        <td><?= htmlspecialchars($row['Nama'] ?? ''); ?></td>
                                            <td><?= htmlspecialchars($row['Nim'] ?? ''); ?></td>
                                        <td><?= htmlspecialchars($row['Jurusan'] ?? ''); ?></td>
                                    <td style="text-align: center;">
                                        <img src="img/<?= htmlspecialchars($row['photo'] ?? ''); ?>" style="width: 120px;">
                                    </td>
                                <td>
                                    <a href="data_edit.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">
                                    <i class="glyphicon glyphicon-check"></i> Edit
                                </a>
                                    <a href="javascript:;" data-id="<?= $row['id']; ?>" data-toggle="modal" data-target="#modal-konfirmasi" class="btn btn-warning btn-sm">
                                        <i class="glyphicon glyphicon-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
     <div id="modal-konfirmasi" class="modal fade" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body btn-info">
                    Apakah Anda yakin ingin menghapus data ini ?
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
                    <button type="button" class="btn btn-default" data-dismiss>Tidak</button>
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
      <script>
        $(document).ready(function (){
            $('$dataTables-example').dataTable();
        })
      </script>
</body>
</html>