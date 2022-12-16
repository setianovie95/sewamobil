<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Update Data Mobil</h1>
        </div>

        <div class="card">
            <div class="card-body">

                <?php foreach ($mobil as $mb) : ?>
                    <form method="POST" action="<?php echo base_url('admin/data_mobil/update_mobil_aksi') ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type Mobil</label>
                                    <input type="hidden" name="id_mobil" value="<?php echo $mb->id_mobil ?>">
                                    <select name="kode_type" class="form-control">
                                        <?php foreach ($type as $tp) : ?>
                                            <option value="<?php echo $tp->kode_type ?>" <?= set_select('kode_type', $tp->kode_type, ($mb->kode_type == $tp->kode_type)) ?>><?php echo $tp->nama_type ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php echo form_error('kode_type', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Merk</label>
                                    <input type="text" name="merk" class="form-control" value="<?= set_value('merk', $mb->merk) ?>">
                                    <?php echo form_error('merk', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label>No. Plat</label>
                                    <input type="text" name="no_plat" class="form-control" value="<?= set_value('no_plat', $mb->no_plat) ?>">
                                    <?php echo form_error('no_plat', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Warna</label>
                                    <input type="text" name="warna" class="form-control" value="<?= set_value('warna', $mb->warna) ?>">
                                    <?php echo form_error('warna', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label>AC</label>
                                    <select name="ac" class="form-control">
                                        <option <?= set_select('ac', '1', ($mb->ac == '1')) ?> value="1">Tersedia</option>
                                        <option <?= set_select('ac', '0', ($mb->ac == '0')) ?> value="0">Tidak Tersedia</option>
                                    </select>
                                    <?php echo form_error('ac', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Supir</label>
                                    <select name="supir" class="form-control">
                                        <option <?= set_select('supir', '1', ($mb->supir == '1')) ?> value="1">Tersedia</option>
                                        <option <?= set_select('supir', '0', ($mb->supir == '0')) ?> value="0">Tidak Tersedia</option>
                                    </select>
                                    <?php echo form_error('supir', '<div class="text-small text-danger">', '</div>') ?>
                                </div>


                                <div class="form-group">
                                    <label>MP3 Player</label>
                                    <select name="mp3_player" class="form-control">
                                        <option <?= set_select('mp3_player', '1', ($mb->mp3_player == '1')) ?> value="1">Tersedia</option>
                                        <option <?= set_select('mp3_player', '0', ($mb->mp3_player == '0')) ?> value="0">Tidak Tersedia</option>
                                    </select>
                                    <?php echo form_error('mp3_player', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Central Lock</label>
                                    <select name="central_lock" class="form-control">
                                        <option <?= set_select('central_lock', '1', ($mb->central_lock == '1')) ?> value="1">Tersedia</option>
                                        <option <?= set_select('central_lock', '0', ($mb->central_lock == '0')) ?> value="0">Tidak Tersedia</option>
                                    </select>
                                    <?php echo form_error('central_lock', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" name="harga" class="form-control" value="<?= set_value('harga', $mb->harga) ?>">
                                    <?php echo form_error('harga', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Denda</label>
                                    <input type="number" name="denda" class="form-control" value="<?= set_value('denda', $mb->denda) ?>">
                                    <?php echo form_error('denda', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="number" name="tahun" class="form-control" value="<?= set_value('tahun', $mb->tahun) ?>">
                                    <?php echo form_error('tahun', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option <?= set_select('status', '1', ($mb->status == '1')) ?> value="1">Tersedia</option>
                                        <option <?= set_select('status', '0', ($mb->status == '0')) ?> value="0">Tidak Tersedia</option>
                                    </select>
                                    <?php echo form_error('status', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Pemilik Rental</label>
                                    <select name="nama_rental" class="form-control">
                                        <?php foreach ($nama_rental as $nr) : ?>
                                            <option value="<?php echo $nr->nama_rental ?>" <?= set_select('nama_rental', $nr->nama_rental, ($mb->nama_rental == $nr->nama_rental)) ?>><?php echo $nr->nama_rental ?></option>
                                        <?php endforeach ?>

                                    </select>
                                    <?php echo form_error('nama_rental', '<div class="text-small text-danger">', '</div>') ?>
                                </div>


                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" name="gambar" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-danger btn-large" href="<?= base_url('admin/data_mobil') ?>">Batal</a>
                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>