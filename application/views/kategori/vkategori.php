<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">   
</head>
<body>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Kategori</h1>
                    <ol class="breadcrumb mb-4">
                    <a href="kategori/add" class="btn btn-primary">Tambah Data</a>
                    </ol>
            </div>
            <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead class="table-dark ">
                        <tr >
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Kategori</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php $no= 0; foreach ($data as $key): ?>
                    <tr class="text-center">
                        <th scope="row" class="text-center" ><?= ++$no ?></th>
                        <td><?= $key->nama_kategori?></td>
                        <td>
                        <a href="kategori/edit/<?= $key->id_kategori ?>" class="btn btn-warning">Edit</a>
                        <a href="kategori/delete/<?= $key->id_kategori ?>" class="btn btn-danger">Hapus</a>
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