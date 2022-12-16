<body class="bg-light">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= base_url('assets/logo'); ?>/logo-dark.png" alt="logo" width="200" class="">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <span class="p-4"><?php echo $this->session->flashdata('pesan') ?></span>
                                <form method="POST" action="<?php echo base_url('auth/login') ?>">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" value="<?= set_value('username') ?>" tabindex="1" autofocus>
                                        <?php echo form_error('username', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2">
                                        <?php echo form_error('password', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Belum memiliki akun? <a href="<?php echo base_url('auth/register') ?>">Buat akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>