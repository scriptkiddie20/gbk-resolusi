<?= $this->extend('layout/templates') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= esc($title) ?></h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/product/add" class="btn btn-primary my-3">Tambah Data</a>
                <?= session()->getFlashdata('pesan') ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Paket</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($product as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><img class="sampul" src="/img/<?= $p['image_product'] ?>"></td>

                                <td><?= $p['package'] ?></td>
                                <td><?= $p['category'] ?></td>
                                <td><?= $p['harga'] ?></td>
                                <td>
                                    <a href="/packages/<?= $p['packages_id'] ?>" class="btn btn-success btn-sm">Detail</a>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>