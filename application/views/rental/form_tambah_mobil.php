<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Tambah Data Mobil</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('rental/data_mobil/tambah_mobil_aksi') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="nama_rental" value="<?php echo $this->session->userdata('nama_rental') ?>">
                                <label>Type Mobil</label>
                                <select name="kode_type" class="form-control">
                                    <option selected disabled>--Pilih Type Mobil--</option>
                                    <?php foreach ($type as $tp) : ?>
                                        <option value="<?php echo $tp->kode_type ?>" <?= set_select('kode_type', $tp->kode_type) ?>><?php echo $tp->nama_type ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php echo form_error('kode_type', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="merk" value="<?= set_value('merk') ?>" class="form-control">
                                <?php echo form_error('merk', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <label>No. Plat</label>
                                <input type="text" name="no_plat" value="<?= set_value('no_plat') ?>" class="form-control">
                                <?php echo form_error('no_plat', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <label>Warna</label>
                                <input type="text" name="warna" value="<?= set_value('warna') ?>" class="form-control">
                                <?php echo form_error('warna', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <label>AC</label>
                                <select name="ac" class="form-control">
                                    <option selected disabled>--Pilih--</option>
                                    <option value="1" <?= set_select('ac', '1') ?>>Tersedia</option>
                                    <option value="0" <?= set_select('ac', '0') ?>>Tidak Tersedia</option>
                                </select>
                                <?php echo form_error('ac', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <label>Supir</label>
                                <select name="supir" class="form-control">
                                    <option selected disabled>--Pilih--</option>
                                    <option value="1" <?= set_select('supir', '1') ?>>Tersedia</option>
                                    <option value="0" <?= set_select('supir', '0') ?>>Tidak Tersedia</option>
                                </select>
                                <?php echo form_error('supir', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <label>MP3 Player</label>
                                <select name="mp3_player" class="form-control">
                                    <option selected disabled>--Pilih--</option>
                                    <option value="1" <?= set_select('mp3_player', '1') ?>>Tersedia</option>
                                    <option value="0" <?= set_select('mp3_player', '0') ?>>Tidak Tersedia</option>
                                </select>
                                <?php echo form_error('mp3_player', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <label>Central Lock</label>
                                <select name="central_lock" class="form-control">
                                    <option selected disabled>--Pilih--</option>
                                    <option value="1" <?= set_select('central_lock', '1') ?>>Tersedia</option>
                                    <option value="0" <?= set_select('central_lock', '0') ?>>Tidak Tersedia</option>
                                </select>
                                <?php echo form_error('central_lock', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Harga Sewa/Hari</label>
                                <input type="number" name="harga" value="<?= set_value('harga') ?>" class="form-control">
                                <?php echo form_error('harga', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <label>Denda</label>
                                <input type="number" name="denda" value="<?= set_value('denda') ?>" class="form-control">
                                <?php echo form_error('denda', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="number" name="tahun" value="<?= set_value('tahun') ?>" class="form-control">
                                <?php echo form_error('tahun', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option selected disabled>--Pilih Status--</option>
                                    <option value="1" <?= set_select('status', '1') ?>>Tersedia</option>
                                    <option value="0" <?= set_select('status', '0') ?>>Tidak Tersedia</option>
                                </select>
                                <?php echo form_error('status', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="gambar" class="form-control">
                                <?php echo form_error('gambar', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-danger btn-large" href="<?= base_url('rental/data_mobil') ?>">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>