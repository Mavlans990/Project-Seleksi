<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <div class="container">
                <a class="navbar-brand" href="/">CodeIgniter</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/lokasi">Master Lokasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/proyek">Master Proyek</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-4">
            <h2>Data Lokasi</h2>
            <a href="/lokasi/create" class="btn btn-primary btn-sm">Tambah Data</a>
            <table class="table table-hover">
                <tr>
                    <th>Nama Lokasi</th>
                    <th>Negara</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($lokasi as $l): ?>
                <tr>
                    <td><?php echo $l['nama_lokasi']; ?></td>
                    <td><?php echo $l['negara']; ?></td>
                    <td><?php echo $l['provinsi']; ?></td>
                    <td><?php echo $l['kota']; ?></td>
                    <td>
                        <a href="/lokasi/edit/<?php echo $l['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/lokasi/delete/<?php echo $l['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')" >Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>