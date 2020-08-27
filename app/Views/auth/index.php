<?php $this->extend('layout/auth') ?>

<?php $this->section('content') ?>
<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center mt-5">

		<div class="col-xl-10 col-lg-12 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4"><?= esc($title) ?></h1>
								</div>
								<?= session()->getFlashdata('message'); ?>
								<form action="/auth/login" method="post" class="user">
									<div class="form-group">
										<input type="email" class="form-control form-control-user <?= ($validation->hasError('email') ? 'is-invalid' : '') ?>" id="email" name="email" value="<?= old('email') ?>" aria-describedby="emailHelp" placeholder="Enter Email Address...">
										<div class="invalid-feedback">
											<?= $validation->getError('email') ?>
										</div>
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user <?= ($validation->hasError('password') ? 'is-invalid' : '') ?>"" id=" password" name="password" placeholder="Password">
										<div class="invalid-feedback">
											<?= $validation->getError('password') ?>
										</div>
									</div>
									<div class="form-group">
										<div class="custom-control custom-checkbox small">
											<input type="checkbox" class="custom-control-input" id="customCheck">
											<label class="custom-control-label" for="customCheck">Remember Me</label>
										</div>
									</div>
									<button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="#">Forgot Password?</a>
								</div>
								<div class="text-center">
									<a class="small" href="/register">Create an Account!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>
<?php $this->endSection(); ?>