<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Tambah Data</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-flex justify-content-between">Tambah Data User</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url()?>user/insert" method="post">
                        <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama User</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama User">
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" placeholder="Masukkan Jurusan User">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat User">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No. Hp</label>
                                <input type="text" class="form-control" name="no_hp"  placeholder="Masukkan No. Hp">
                            </div>
                            <div class="mb-3">
                                <label for="token" class="form-label">Token</label>
                                <input type="text" class="form-control" name="token" placeholder="Masukkan Token">
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>