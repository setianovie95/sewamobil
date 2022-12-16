<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Form Tambah Data Customer</h1>
		</div>
	</section>

	<div class="card">
		<form method="POST" action="<?php echo base_url('admin/data_customer/tambah_customer_aksi') ?>">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control">
							<?php echo form_error('nama', '<span class="text-small text-danger">', '</span>') ?>
						</div>
						<div class="form-group">
							<label>Gender</label>
							<select class="form-control" name="gender">
								<option value="">-- Pilih Gender --</option>
								<option value="Laki-laki" <?= set_select('gender', 'Laki-laki') ?>>Laki-laki</option>
								<option value="Perempuan" <?= set_select('gender', 'Perempuan') ?>>Perempuan</option>
							</select>
							<?php echo form_error('gender', '<span class="text-small text-danger">', '</span>') ?>
						</div>
						<div class="form-group">
							<label>No. Telepon</label>
							<input type="text" value="<?= set_value('no_telepon') ?>" name="no_telepon" class="form-control">
							<?php echo form_error('no_telepon', '<span class="text-small text-danger">', '</span>') ?>
						</div>
						<div class="form-group">
							<label>No. KTP</label>
							<input type="text" value="<?= set_value('no_ktp') ?>" name="no_ktp" class="form-control">
							<?php echo form_error('no_ktp', '<span class="text-small text-danger">', '</span>') ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Perusahaan (Opsional)</label>
							<input type="text" value="<?= set_value('nama_rental') ?>" name="nama_rental" class="form-control">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" value="<?= set_value('username') ?>" name="username" class="form-control">
							<?php echo form_error('username', '<span class="text-small text-danger">', '</span>') ?>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" value="<?= set_value('password') ?>" name="password" class="form-control">
							<?php echo form_error('password', '<span class="text-small text-danger">', '</span>') ?>
						</div>
						<div class="form-group">
							<label>Level Customer</label>
							<select class="form-control" name="role_id">
								<option value="">-- Pilih Level --</option>
								<option value="1" <?= set_select('role_id', 1) ?> >Admin</option>
								<option value="2" <?= set_select('role_id', 2) ?> >Customer Rental</option>
								<option value="3" <?= set_select('role_id', 3) ?> >Pemilik Rental</option>
							</select>
							<?php echo form_error('role_id', '<span class="text-small text-danger">', '</span>') ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" value="<?= set_value('alamat') ?>" name="alamat" class="form-control">
					<?php echo form_error('alamat', '<span class="text-small text-danger">', '</span>') ?>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-large btn-primary mr-4">Simpan</button>
				<a class="btn btn-danger btn-large" href="<?= base_url('admin/data_customer') ?>">Batal</a>
			</div>
		</form>
	</div>
</div>