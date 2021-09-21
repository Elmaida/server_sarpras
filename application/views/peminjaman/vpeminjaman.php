<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">   
</head>
<body>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Peminjaman</h1>
                    <ol class="breadcrumb mb-4">
                    <a href="peminjaman/add" class="btn btn-primary">Tambah Data</a>
                    </ol>
            </div>
            <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead class="table-dark ">
                        <tr >
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Peminjam</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Kategori Barang</th>
                            <th class="text-center">Tanggal Pinjam</th>
                            <th class="text-center">Tanggal Kembali</th>
                            <th class="text-center">Jumlah Barang</th>
                            <th class="text-center">Status Transaksi</th>
                            <th class="text-center">Status Pengajuan </th>
                            <th class="text-center " style = "center" width = 500px>Aksi</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php $no= 0; foreach ($data as $row): ?>
                    <tr class="text-center">
                        <th scope="row" class="text-center" ><?= ++$no ?></th>
                        <td><?= $row->id_user?></td>
                        <td><?= $row->id_barang?></td>
                        <td><?= $row->id_kategori?></td>
                        <td><?= $row->tanggal_pinjam?></td>
                        <td><?= $row->tanggal_kembali?></td>
                        <td><?= $row->jumlah?></td>
                        <td>
                        <?php if ($row->status_transaksi == 0) { ?> 
                            <a href="peminjaman/edit/<?= $row->status_transaksi ?>" class="btn btn-warning btn-sm">Pinjam</a>
                            <?php } elseif ($row->status_transaksi == 1) { ?> 
                                <a href="peminjaman/edit/<?= $row->status_transaksi ?>" class="btn btn-primary btn-sm">Kembali</a>
                        <?php } else { ?>
                            <a href="peminjaman/edit/<?= $row->status_transaksi ?>" class="btn btn-danger btn-sm">Hilang</a>
                        <?php } ?> 

                        </td>
                        <td><?php if ($row->status_pengajuan == 0) { ?> 
                            <a href="peminjaman/edit/<?= $row->status_pengajuan ?>" class="btn btn-success btn-sm">Diterima</a></td>
                        <?php } else { ?>
                            <a href="peminjaman/edit/<?= $row->status_pengajuan?>" class="btn btn-danger btn-sm">Ditolak</a>
                            <?php } ?> 
                  
                        <td>
                        <a href="peminjaman/edit/<?= $row->id_pinjam ?>"class="btn btn-warning btn-sm"><i class="far fa-edit"></i> Edit</a>
                        <a href="peminjaman/delete/<?= $row->id_pinjam ?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                </table>
                
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>