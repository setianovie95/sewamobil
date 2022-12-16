<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Filter Laporan Transaksi</h1>
		</div>
	</section>

	<?php echo $this->session->flashdata('pesan') ?>
	<form method="POST" action="<?php echo base_url('rental/laporan') ?>">
		<div class="row">
			<div class="form-group col-lg-6">
				<label>Dari Tanggal</label>
				<input type="date" name="dari" value="<?= set_value('dari') ?>" class="form-control"></input>
				<?php echo form_error('dari', '<span class="text-small text-danger">', '</span>')  ?>
			</div>

			<div class="form-group col-lg-6">
				<label>Sampai Tanggal</label>
				<input type="date" name="sampai" value="<?= set_value('sampai') ?>" class="form-control"></input>
				<?php echo form_error('sampai', '<span class="text-small text-danger">', '</span>')  ?>
			</div>
		</div>

		<button type="submit" class="btn btn-primary"><i class="fas fa-eye"></i> Tampilkan Data</button>

	</form>
</div>