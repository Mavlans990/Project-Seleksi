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
            <h2>Edit Data Proyek</h2>
            <form action="/proyek/update/<?= $proyek['id']; ?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Proyek</label>
                            <input type="text" name="nama_proyek" class="form-control" value="<?= $proyek['nama_proyek']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Client</label>
                            <input type="text" name="client" class="form-control" value="<?= $proyek['client']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control" value="<?= date('Y-m-d', strtotime($proyek['tgl_mulai'])) ?>" required>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Selesai</label>
                            <input type="date" name="tgl_selesai" class="form-control" value="<?= date('Y-m-d', strtotime($proyek['tgl_selesai'])) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pimpinan Proyek</label>
                            <input type="text" name="pimpinan_proyek" class="form-control" value="<?= $proyek['pimpinan_proyek']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control"><?= $proyek['keterangan']; ?></textarea>
                        </div>
                    </div>
                </div>
                <a href="/proyek" class="btn btn-danger">Close</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>