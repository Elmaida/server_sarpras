<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 breadcrumb mb-4">Dashboard Admin</h1>
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">JUMLAH STOK</h5>
                                        <div class="display-4 "> <h1> <?= $stok->barang;
                                            ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">JUMLAH BARANG</h5>
                                        <div class="display-4 "> <h1> <?= $id_barang->barang;
                                            ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">JUMLAH PEMINJAM</h5>
                                        <div class="display-4 "><h1>
                                            <!-- <?= $id_pinjam->pinjam;?> -->
                                            <?php if ($row->status_transaksi == 0) { ?> 
                                                <a href="peminjaman/edit/<?= $row->status_transaksi ?>" class="btn btn-warning btn-sm">Pinjam</a>
                                                <?php } elseif ($row->status_transaksi == 1) { ?> 
                                                    <a href="peminjaman/edit/<?= $row->status_transaksi ?>" class="btn btn-success btn-sm">Kembali</a>
                                            <?php } else { ?>
                                                <a href="peminjaman/edit/<?= $row->status_transaksi ?>" class="btn btn-danger btn-sm">Hilang</a>
                                            <?php } ?> 

                                        </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">JUMLAH KATEGORI</h5>
                                        <div class="display-4 "><h1><?= $id_kategori->kategori
                                            ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">JUMLAH USER</h5>
                                        <div class="display-4 "><h1><?= $id_user->user;
                                            ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                    Riwayat Peminjaman
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                <thead class="table-dark ">
                                    <tr >
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Peminjam</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Jumlah Barang</th>
                                        <th class="text-center">Status Transaksi</th>
                                    </tr>
                                </thead>
                            <tbody>
                                <?php $no= 0; foreach ($data as $row): ?>
                                <tr class="text-center">
                                    <th scope="row" class="text-center" ><?= ++$no ?></th>
                                    <td><?= $row->nama_user?></td>
                                    <td><?= $row->nama?></td>
                                    <td><?= $row->jumlah?></td>
                                    <td>
                                    <?php if ($row->status_transaksi == 0) { ?> 
                                        <a href="peminjaman/edit/<?= $row->status_transaksi ?>" class="btn btn-warning btn-sm">Pinjam</a>
                                        <?php } elseif ($row->status_transaksi == 1) { ?> 
                                            <a href="peminjaman/edit/<?= $row->status_transaksi ?>" class="btn btn-success btn-sm">Kembali</a>
                                    <?php } else { ?>
                                        <a href="peminjaman/edit/<?= $row->status_transaksi ?>" class="btn btn-danger btn-sm">Hilang</a>
                                    <?php } ?> 

                                    </td>
                                <?php endforeach ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <!-- <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> -->
                        </div>
                    </div>
                </footer>
            </div>
    </div>
</body>
</html>