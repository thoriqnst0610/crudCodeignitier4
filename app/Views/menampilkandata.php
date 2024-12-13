<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menampilkan Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <!-- modal tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/menambahData" method="post" enctype="multipart/form-data">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" id="nama" class="form-control" name="nama" aria-describedby="passwordHelpBlock">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" class="form-control" name="alamat" aria-describedby="passwordHelpBlock">
                        <label for="profil" class="form-label">Profil</label>
                        <input type="file" id="profil" class="form-control" name="profil" aria-describedby="passwordHelpBlock">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- akhir modal tambah -->


    <div class="container mt-4">

        <div class="row">
            <div class="col-md-7 col-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
            </div>
            <div class="col-md-5 col-12">
                <form class="d-flex align-items-center">
                    <h5 class=" ms-auto me-1">Cari Data: </h5>
                    <input type="text" id="search" style="width:400px;" class="form-control">
                </form>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Asal</th>
                    <th>photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="menampilkanData">
            <?php
            $no = 1;
            foreach ($manusia as $data) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><img src="<?= base_url('uploads/'.$data['photo']); ?>" class="img-fluid img-thumbnail" style="max-width: 15%" alt="gambarManusia"></td>
                    <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id'] ?>">Edit</button> || 
                        <a href="<?= site_url('menghapusData/delete/'.$data['id']) ?>" class="btn btn-danger">Hapus</a>
                    </td>
                    </tr>

                <!-- modal edit -->
                <div class="modal fade" id="editModal<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/mengeditData" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                    <label for="nama" class="form-label">nama</label>
                                    <input type="text" id="namaEdit" class="form-control" name="nama" aria-describedby="passwordHelpBlock" value="<?= $data['nama'] ?>">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" id="alamatEdit" name="alamat" class="form-control" aria-describedby="passwordHelpBlock" value="<?= $data['alamat'] ?>">
                                    <label for="profil" class="form-label">Profil</label>
                                    <input type="file" id="profil" class="form-control" name="profil" aria-describedby="passwordHelpBlock">
                                    <input type="hidden" id="profilEdit" name="profiTeks" class="form-control" value="<?= $data['photo'] ?>" aria-describedby="passwordHelpBlock">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </tbody>
            <!-- akhir modal edit -->

        </table>
        <div>
        <?= $pager->links() ?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>