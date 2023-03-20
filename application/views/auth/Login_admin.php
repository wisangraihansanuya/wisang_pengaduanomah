<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 text-center mb-5">
				<h2 class="heading-section">PENGADUAN MASYARAKAT</h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-4">
				<div class="login-wrap p-0">
					<h3 class="mb-4 text-center">Login Admin Aplikasi</h3>
					<?= $this->session->flashdata('message'); ?>
					<form action="<?= base_url('C_login_admin') ?>" method="POST" class="login-form">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Username" id="username" name="username">
							<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<input id="password" type="password" class="form-control rounded-left" name="password" id="password" placeholder="Password" required>
							<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>