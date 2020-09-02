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
                <div class="table-responsive table-hover">
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
                            foreach ($packages as $pkg) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img class="img-fluid sampul" src="/img/<?= $pkg['image_packages'] ?>"></td>

                                    <td><?= $pkg['package'] ?></td>
                                    <td><?= $pkg['category'] ?></td>
                                    <td><?= $pkg['harga'] ?></td>
                                    <td>
                                        <a href="/packages/<?= $pkg['id_packages'] ?>" class="btn btn-success btn-sm mb-1">Detail</a>
                                        <button class="btn btn-warning btn-sm mb-1">Edit</button>
                                        <button class="btn btn-danger btn-sm mb-1">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>