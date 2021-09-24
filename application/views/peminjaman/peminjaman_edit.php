<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Ubah Data</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-flex justify-content-between">Ubah Data Peminjaman</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url()?>peminjaman/update" method="post">
                        <div class = "mb-3">
                            <label for="id_user" class = "form-label"> Nama Peminjam</label>
                            <input type="text" class ="form-control" name ="id_user" value="<?= $id_user?>" placeholder="Masukkan Nama Peminjam">
                        </div>
                            <div class="mb-3">
                                <label for="id_barang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" name="id_barang"  value="<?= $id_barang ?>" placeholder="Masukkan Nama Barang">
                            </div>
                            <div class="mb-3">
                                <label for="id_kategori" class="form-label">Kategori Barang</label>
                                <input type="text" class="form-control" name="id_kategori"  value="<?= $id_kategori ?>" placeholder="Masukkan Kategori Barang">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                                <input type="date" class="form-control" name="tanggal_pinjam"  value="<?= $tanggal_pinjam ?>" placeholder="Masukkan Tanggal Pinjam">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                                <input type="date" class="form-control" name="tanggal_kembali"  value="<?= $tanggal_kembali ?>" placeholder="Masukkan Tanggal Kembali">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="text" class="form-control" name="jumlah"  value="<?= $jumlah ?>" placeholder="Masukkan Jumlah Barang">
                            </div>
                            <div class="mb-3">
                                <label for="status_transaksi" class="form-label">Status Transaksi</label>
                                <input type="text" class="form-control" name="status_transaksi"  value="<?= $status_transaksi ?>" placeholder="Masukkan StatusTransaksi">
                            </div>
                            <input type="hidden" name="id" value="<?= $id_pinjam ?>"/>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>