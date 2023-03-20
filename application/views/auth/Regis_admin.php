<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 col-lg-5">
				<div class="login-wrap p-4 p-md-5">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="fa fa-user-o"></span>
					</div>
					<h3 class="text-center mb-4">REGISTRATION</h3>
					<form action="<?= base_url('C_login/registration_admin')?>" method="POST" class="login-form">
						<div class="form-group">
							<input type="text" class="form-control rounded-left" name="nama" id="nama" placeholder="Nama Lengkap">
							<?= form_error('nama','<small class="text-danger pl-3">','</small>');?>
						</div>
						<div class="form-group">
							<input type="text" class="form-control rounded-left" name="nik" id="nik" placeholder="Nik">
							<?= form_error('nik','<small class="text-danger pl-3">','</small>');?>
						</div>
						<div class="form-group">
							<input type="text" class="form-control rounded-left" name="no_telp" id="no_telp" placeholder="No Telepon">
                            <?= form_error('no_telp','<small class="text-danger pl-3">','</small>');?>
						</div>
						<div class="form-group">
							<input type="text" class="form-control rounded-left" name="username" id="username" placeholder="Username">
							<?= form_error('username','<small class="text-danger pl-3">','</small>');?>
						</div>
						<div class="form-group">
							<input type="password" class="form-control rounded-left" name="password1" id="password1" placeholder="Password">
                            <?= form_error('password1','<small class="text-danger pl-3">','</small>');?>
						</div>
						<div class="form-group d-flex">
							<input type="password" class="form-control rounded-left" name="password2" id="password2" placeholder="Confirm Password">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Buat Akun</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>