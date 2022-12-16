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
                <h4>Ganti Password</h4>
              </div>
              <div class="card-body">
                <span class="p-2"><?php echo $this->session->flashdata('pesan') ?></span>
                <form method="POST" action="<?php echo base_url('auth/ganti_password_aksi') ?>">

                  <div class="form-group">
                    <div class="d-block">
                      <label for="pass_baru" class="control-label">Password Baru</label>
                    </div>
                    <input id="pass_baru" type="password" class="form-control" name="pass_baru" tabindex="2"> <?php echo form_error('pass_baru', '<div class="text-small text-danger">', '</div>') ?>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="ulang_pass" class="control-label">Ulangi Password</label>
                    </div>
                    <input id="ulang_pass" type="password" class="form-control" name="ulang_pass" tabindex="2"> <?php echo form_error('ulang_pass', '<div class="text-small text-danger">', '</div>') ?>
                  </div>


                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Ganti Password
                    </button>
                  </div>
                </form>

              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              <?php
              $page = '';
              $user_role = $this->session->userdata('role_id');
              switch ($user_role) {
                case 1:
                  $page = 'admin';
                  break;
                case 3:
                  $page = 'rental';
                  break;            
                default:
                  $page = 'customer';
                  break;
              }
              ?>
              <a href="<?php echo base_url($page.'/dashboard') ?>" class="">Kembali ke Halaman Depan</a>
            </div>
            <div class="simple-footer">
              <!--Copyright &copy; Stisla 2018-->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>