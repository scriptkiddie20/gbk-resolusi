<?php $this->extend('layout/auth') ?>

<?php $this->section('content') ?>
<div class="container">

	<div class="card o-hidden border-0 shadow-lg mt-5 col-lg-5 mx-auto">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4"><?= esc($title); ?></h1>
						</div>
						<form action="/auth/regist" method="post" class="user">
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text" class="form-control form-control-user <?= ($validation->hasError('firstName') ? 'is-invalid' : '') ?>" id="firstName" name="firstName" placeholder="First Name">
									<div class="invalid-feedback">
										<?= $validation->getError('firstName') ?>
									</div>
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control form-control-user <?= ($validation->hasError('lastName') ? 'is-invalid' : '') ?>" id="lastName" name="lastName" placeholder="Last Name">
									<div class="invalid-feedback">
										<?= $validation->getError('lastName') ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<input type="email" class="form-control form-control-user <?= ($validation->hasError('email') ? 'is-invalid' : '') ?>" id="email" name="email" placeholder="Email Address">
								<div class="invalid-feedback">
									<?= $validation->getError('email') ?>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" class="form-control form-control-user <?= ($validation->hasError('pass1') ? 'is-invalid' : '') ?>" id="pass1" name="pass1" placeholder="Password">
									<div class="invalid-feedback">
										<?= $validation->getError('pass1') ?>
									</div>
								</div>
								<div class="col-sm-6">
									<input type="password" class="form-control form-control-user <?= ($validation->hasError('pass2') ? 'is-invalid' : '') ?>" id="pass2" name="pass2" placeholder="Repeat Password">
									<div class="invalid-feedback">
										<?= $validation->getError('pass2') ?>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">
								Register Account
							</button>
						</form>
						<hr>
						<div class="text-center">
							<a class="small" href="forgot-password.html">Forgot Password?</a>
						</div>
						<div class="text-center">
							<a class="small" href="/auth">Already have an account? Login!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<?php $this->endSection() ?>