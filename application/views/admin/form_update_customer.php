<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Form Update Data Customer</h1>
		</div>
	</section>

	<div class="card">
		<?php foreach ($customer as $cs) : ?>
			<form method="POST" action="<?php echo base_url('admin/data_customer/update_customer_aksi') ?>">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama</label>
								<input type="hidden" name="id_customer" value="<?php echo set_value('id_customer', $cs->id_customer) ?>">
								<input type="text" name="nama" value="<?php echo set_value('nama', $cs->nama) ?>" class="form-control">
								<?php echo form_error('nama', '<span class="text-small text-danger">', '</span>') ?>
							</div>

							<div class="form-group">
								<label>Gender</label>
								<select class="form-control" name="gender">
									<option <?= set_select('gender', 'Laki-laki', ($cs->gender === 'Laki-laki')) ?> value="Laki-laki">Laki-laki</option>
									<option <?= set_select('gender', 'Perempuan', ($cs->gender === 'Perempuan')) ?> value="Perempuan">Perempuan</option>
								</select>
								<?php echo form_error('gender', '<span class="text-small text-danger">', '</span>') ?>
							</div>

							<div class="form-group">
								<label>No. Telepon</label>
								<input type="text" name="no_telepon" class="form-control" value="<?= set_value('no_telepon', $cs->no_telp) ?>">
								<?php echo form_error('no_telepon', '<span class="text-small text-danger">', '</span>') ?>
							</div>

							<div class="form-group">
								<label>No. KTP</label>
								<input type="text" name="no_ktp" class="form-control" value="<?= set_value('no_ktp', $cs->no_ktp) ?>">
								<?php echo form_error('no_ktp', '<span class="text-small text-danger">', '</span>') ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Perusahaan (opsional)</label>
								<input type="text" name="nama_rental" class="form-control" value="<?php echo set_value('nama_rental', $cs->nama_rental) ?>">
							</div>

							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control" value="<?php echo set_value('username', $cs->username) ?>">
								<?php echo form_error('username', '<span class="text-small text-danger">', '</span>') ?>
							</div>

							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control">
								<?php echo form_error('password', '<span class="text-small text-danger">', '</span>') ?>
							</div>

							<div class="form-group">
								<label>Level Customer</label>
								<select class="form-control" name="role_id">
									<option value="1" <?= set_select('role_id', 1, ($cs->role_id == 1)) ?>>Admin</option>
									<option value="2" <?= set_select('role_id', 2, ($cs->role_id == 2)) ?>>Customer Rental</option>
									<option value="3" <?= set_select('role_id', 3, ($cs->role_id == 3)) ?>>Pemilik Rental</option>
								</select>
							</div>

						</div>
						<div class="form-group col-md-12">
							<label>Alamat</label>
							<input type="text" name="alamat" class="form-control" value="<?= set_value('alamat', $cs->alamat) ?>">
							<?php echo form_error('alamat', '<span class="text-small text-danger">', '</span>') ?>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-large btn-primary mr-4">Simpan</button>
					<a class="btn btn-danger btn-large" href="<?= base_url('admin/data_customer') ?>">Batal</a>
				</div>

			</form>
		<?php endforeach; ?>
	</div>
</div>