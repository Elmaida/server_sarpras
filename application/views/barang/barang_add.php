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
                        <h3 class="d-flex justify-content-between">Tambah Data Barang</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url()?>barang/insert" method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Barang">
                            </div>
                            <div class="mb-3">
                                <label for="id_kategori" class="form-label">Jenis Kategori</label>
                                <input type="text" class="form-control" name="id_kategori" placeholder="Masukkan Nama Kategori">
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="text" class="form-control" name="stok" placeholder="Masukkan Stok Barang">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga Barang">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Pembelian</label>
                                <input type="date" class="form-control" name="tanggal" placeholder="Masukkan Tanggal Pembelian">
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