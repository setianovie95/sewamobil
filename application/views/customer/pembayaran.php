<section id="page-title-area" class="section-padding overlay">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Pembayaran</h2>
                    <span class="title-line"><i class="fa fa-money"></i></span>
                    <p>Segera lakukan pembayaran dan upload bukti bayar agar pesanan Anda diproses oleh Pihak Rental</p>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<div class="container mt-5 mb-5">
    <span class="mt-2 p-2"><?php echo $this->session->flashdata('pesan') ?></span>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header alert-success">
                    Invoice Pembayaran Anda
                </div>

                <div class="card-body">
                    <table class="table">
                        <?php foreach ($transaksi as $tr) : ?>
                        <tr>
                            <th>Kode Transaksi</th>
                            <td>: </td>
                            <td><?php echo $tr->kode_rental ?></td>
                        </tr>
                        <tr>
                            <th>Merk Mobil</th>
                            <td>: </td>
                            <td><?php echo $tr->merk ?></td>
                        </tr>

                        <tr>
                            <th>Penyedia</th>
                            <td>: </td>
                            <td><?php echo $tr->nama_rental ?></td>
                        </tr>

                        <tr>
                            <th>Tanggal Rental</th>
                            <td>: </td>
                            <td><?php echo $tr->tanggal_rental ?></td>
                        </tr>

                        <tr>
                            <th>Tanggal Kembali</th>
                            <td>: </td>
                            <td><?php echo $tr->tanggal_kembali ?></td>
                        </tr>

                        <tr>
                            <th>Biaya Sewa/Hari</th>
                            <td>: </td>
                            <td>Rp. <?php echo number_format($tr->harga, 0, ',', '.') ?></td>
                        </tr>

                        <tr>
                            <?php
								$tanggal_rental = date_create($tr->tanggal_rental);
								$tanggal_kembali = date_create($tr->tanggal_kembali);
								$jmlHari = date_diff($tanggal_kembali, $tanggal_rental)->format('%a');
								?>
                            <th>Jumlah Hari Sewa</th>
                            <td>: </td>
                            <td><?php echo $jmlHari; ?> Hari</td>
                        </tr>

                        <tr class="text-success">
                            <th>JUMLAH PEMBAYARAN</th>
                            <td>: </td>
                            <td><button class="btn btn-sm btn-success" disabled="disabled">Rp.
                                    <?php echo number_format(($tr->harga * $jmlHari), 0, ',', '.') ?></button></td>
                        </tr>
                        <tr>
                            <td>
                                <a class="btn btn-info" href="<?= base_url('customer/transaksi') ?>">Kembali</a>
                            </td>
                            <td></td>
                            <td>
                                <a href="<?php echo base_url('customer/transaksi/cetak_invoice/' . $tr->id_rental) ?>"
                                    class="btn btn-sm btn-secondary">Print Invoice</a>
                            </td>
                        </tr>

                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header alert alert-primary">

                    Informasi Pembayaran
                </div>

                <div class="card-body">
                    <p class="text-success mb-3"> Silakan Melakukan Pembayaran Melalui Alat di Bawah Ini: </p>

                    <ul class="list-group list-group-flush">

                        <?php foreach ($payment as $pm) : ?>
                        <li class="list-group-item font-bold"><?php echo $pm->nama_payment . ' ' . $pm->key_payment ?>
                            <?php echo $pm->atas_nama ?></li>
                        <?php endforeach; ?>


                    </ul>

                    <?php if (empty($tr->bukti_pembayaran)) { ?>
                    <!-- Button trigger modal -->
                    <button style="width: 100%" type="button" class="btn btn-danger btn-sm mt-3" data-toggle="modal"
                        data-target="#exampleModal">
                        Upload Bukti Pembayaran
                    </button>
                    <?php } elseif ($tr->status_pembayaran == "0") { ?>
                    <button style="width: 100%" type="button" class="btn btn-warning btn-sm mt-3 disabled"><i
                            class="fa fa-clock-o"></i> Menunggu Konfirmasi</button>
                    <?php } elseif ($tr->status_pembayaran == "1") { ?>
                    <button style="width: 100%" type="button" class="btn btn-success btn-sm mt-3 disabled"><i
                            class="fa fa-check"></i> Pembayaran Selesai</button>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url('customer/transaksi/pembayaran_aksi') ?>"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Upload Bukti Pembayaran (Maks 10MB)</label>
                        <input type="hidden" name="id_rental" value="<?php echo $tr->id_rental ?>">
                        <input type="file" name="bukti_pembayaran" class="form-control">
                        <small class="help text-info">Format File yang diperbolehkan hanya .JPG .JPEG .PNG .PDF .TIFF
                            .WEBP</small>
                    </div>
            </div>
            <div class="modal-footer mx-auto">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>