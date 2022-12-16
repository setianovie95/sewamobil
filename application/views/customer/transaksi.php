<section id="page-title-area" class="section-padding overlay">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Transaksi</h2>
                    <span class="title-line"><i class="fa fa-ticket"></i></span>
                    <p>Daftar Transaksi yang Anda miliki</p>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<div class="container">
    <div class="card mx-auto" style="margin-top: 180px; margin-bottom: 50px; width: 92%">

        <div class="card-header">
            Data Transaksi Anda
        </div>
        <span class="mt-2 p-2"><?php echo $this->session->flashdata('pesan') ?></span>
        <div class="card-body">
            <table class="table table-bordered table-striped table-responsive">

                <tr>
                    <th>No</th>
                    <th>Kode Transaksi</th>
                    <th>Merk Mobil</th>
                    <th>No. Plat</th>
                    <th>Harga/hari</th>
                    <th>Denda/hari</th>
                    <th>Tanggal Rental</th>
                    <th>Tanggal Kembali</th>
                    <th>Action</th>
                    <!-- <th>Batal</th> -->
                </tr>

                <?php $no = 1;
				foreach ($transaksi as $tr) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $tr->kode_rental ?></td>
                    <td><?php echo $tr->merk ?></td>
                    <td><?php echo $tr->no_plat ?></td>
                    <td><?php echo number_format($tr->harga, 0, ',', '.') ?></td>
                    <td><?php echo number_format($tr->denda, 0, ',', '.') ?></td>
                    <td><?php echo date('d/m/Y', strtotime($tr->tanggal_rental)); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($tr->tanggal_kembali)); ?></td>
                    <td>

                        <?php if ($tr->status_rental == "Selesai") { ?>

                        <button class="btn btn-sm btn-primary" disabled>Rental Selesai</button>

                        <?php } else { ?>

                        <a href="<?php echo base_url('customer/transaksi/pembayaran/' . $tr->id_rental) ?>"
                            class="btn btn-sm btn-success">Pembayaran</a>

                        <a onclick="return confirm('Anda yakin membatalkan?')" class="btn btn-sm btn-danger"
                            href="<?php echo base_url('customer/transaksi/batal_transaksi/' . $tr->id_rental) ?>">Batal</a>

                        <?php } ?>

                    </td>
                    <!-- 						<td>
							<a onclick="return confirm('Anda yakin membatalkan?')" class="btn btn-sm btn-danger" href="<?php echo base_url('customer/transaksi/batal_transaksi/' . $tr->id_rental) ?>">Batal</a>
						</td> -->
                </tr>

                <?php endforeach; ?>
            </table>
        </div>

    </div>
</div>