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

    <hr>

    <div class="btn-group">
        <a href="<?php echo base_url() . 'rental/laporan/print_laporan/?dari=' . set_value('dari') . '&sampai=' . set_value('sampai') ?>" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-print"></i> Print Laporan</a>
    </div>

    <table class="table-responsive table table-striped table-bordered mt-3">
        <tr>
            <th>#</th>
            <th>No Transaksi</th>
            <th>Customer</th>
            <th>Mobil</th>
            <th>Tgl. Rental</th>
            <th>Tgl. Kembali</th>
            <th>Harga/Hari</th>
            <th>Denda/Hari</th>
            <th>Total Denda</th>
            <th>Tgl. Dikembalikan</th>
            <th>Status Pengembalian</th>
            <th>Status Rental</th>
        </tr>
        <?php
        $no = 1;
        foreach ($laporan as $tr) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $tr->kode_rental ?></td>
                <td><?php echo $tr->nama ?></td>
                <td><?php echo $tr->merk ?></td>
                <td><?php echo date('d/m/Y', strtotime($tr->tanggal_rental)) ?></td>
                <td><?php echo date('d/m/Y', strtotime($tr->tanggal_kembali)) ?></td>
                <td>Rp. <?php echo number_format($tr->harga, 0, ',', '.') ?></td>
                <td>Rp. <?php echo number_format($tr->denda, 0, ',', '.') ?></td>
                <td>Rp. <?php echo number_format($tr->total_denda, 0, ',', '.') ?></td>
                <td>
                    <?php
                    if ($tr->tanggal_pengembalian == "0000-00-00") {
                        echo "-";
                    } else {
                        echo date('d/m/Y', strtotime($tr->tanggal_pengembalian));
                    }
                    ?>
                </td>

                <td>
                    <?php if ($tr->status_pengembalian == "Kembali") {
                        echo "Kembali";
                    } else {
                        echo "Belum Kembali";
                    }

                    ?>
                </td>

                <td>
                    <?php if ($tr->status_rental == "Selesai") {
                        echo "Kembali";
                    } else {
                        echo "Belum Selesai";
                    }

                    ?>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
</div>