<body class="bg-light">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="<?= base_url('assets/logo'); ?>/logo-dark.png" alt="logo" width="200" class="">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="<?php echo base_url('auth/register') ?>">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nama">Nama</label>
                                            <input id="nama" type="text" class="form-control" name="nama" value="<?= set_value('nama') ?>" autofocus>
                                            <?php echo form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="username">Username</label>
                                            <input id="username" type="text" class="form-control" name="username" value="<?= set_value('username') ?>">
                                            <?php echo form_error('username', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input id="alamat" type="text" class="form-control" name="alamat" value="<?= set_value('alamat') ?>">
                                        <?php echo form_error('alamat', '<div class="text-small text-danger">', '</div>') ?>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="gender" class="d-block">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option disabled selected>-- Pilih gender --</option>
                                                <option value="Laki-laki" <?= set_select('gender', 'Laki-laki') ?>>Laki-laki</option>
                                                <option value="Perempuan" <?= set_select('gender', 'Perempuan') ?>>Perempuan</option>
                                            </select>
                                            <?php echo form_error('gender', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="no_telp" class="d-block">No. Telepon</label>
                                            <input id="no_telp" type="text" class="form-control" name="no_telp" value="<?= set_value('no_telp') ?>">
                                            <?php echo form_error('no_telp', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>No. KTP</label>
                                            <input type="text" name="no_ktp" value="<?= set_value('no_ktp') ?>" class="form-control">
                                            <?php echo form_error('no_ktp', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Password</label>
                                            <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control">
                                            <?php echo form_error('password', '<div class="text-small text-danger">', '</div>') ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Sudah memiliki akun? <a href="<?php echo base_url('auth/login') ?>">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>