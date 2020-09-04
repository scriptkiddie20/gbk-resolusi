<?= $this->extend('layout/templates') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"></h1>


    <div class="container">
        <div class="row">
            <div class="mt-5 mb-4">
                <h4 class="card-title"><?= esc($title) ?></h4>
                <button class="btn btn-sm btn-primary" onclick="add_barang()"><i class="fa fa-plus"></i> Tambah Data</button>
                <button class="btn btn-sm btn-secondary" onclick="reload_ajax()"><i class="fa fa-refresh"></i> Reload</button>
            </div>
            <div class="col-md-10">
                <div class="table-responsive table-hover">
                    <table class="table" id="table_leads">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Phone</th>
                                <th scope="col">PIC</th>
                                <th scope="col">WA</th>
                                <th scope="col">SMS</th>
                                <th scope="col">Call</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>