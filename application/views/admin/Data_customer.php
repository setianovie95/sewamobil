<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Customer</h1>
        </div>

        <?php echo $this->session->flashdata('pesan') ?>
        <div class="card">
            <div class="card-body">
                <a href="<?php echo base_url('admin/data_customer/tambah_customer') ?>"
                    class="btn btn-primary mb-3">Tambah Customer</a>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Rental</th>
                            <th>Alamat</th>
                            <th>Gender</th>
                            <th>No. Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($customer as $cs) :
                        ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $cs->nama ?></td>
                            <td><?php echo $cs->username ?></td>
                            <td><?php echo $cs->nama_rental ?></td>
                            <td><?php echo $cs->alamat ?></td>
                            <td><?php echo $cs->gender ?></td>
                            <td><?php echo $cs->no_telp ?></td>
                            <td style="display: inline-flex; align-content: center; align-items: center;">
                                <a href="<?php echo base_url('admin/data_customer/update_customer/') . $cs->id_customer ?>"
                                    class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                                <?php if ($cs->id_customer != $this->session->userdata('id_customer')) : ?>
                                <a href="<?php echo base_url('admin/data_customer/delete_customer/') . $cs->id_customer ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="confirm('Anda yakin menghapus <?= $cs->nama ?>?')"><i
                                        class="fas fa-trash"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </section>
</div>