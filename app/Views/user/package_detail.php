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
								<th scope="col">Nama product</th>
								<th scope="col">Qty Paket</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($products as $prd) : ?>
								<tr>
									<th scope="row"><?= $i++; ?></th>
									<td><img class="img-fluid sampul" src="/img/<?= $prd['image_product'] ?>"></td>

									<td><?= $prd['product'] ?></td>
									<td><?= $prd['qtypackages'] ?></td>
									<td>
										<a href="/products/<?= $prd['id_products'] ?>" class="btn btn-success btn-sm mb-1">Detail</a>
										<button class="btn btn-warning btn-sm mb-1">Edit</button>
										<form action="/packages/delete/<?= $prd['id_products'] ?>" method="post" class="d-inline">
											<?= csrf_field(); ?>
											<input type="hidden" name="_method" value="DELETE">
											<button type="submit" class="btn btn-danger">Delete</button>
										</form>
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