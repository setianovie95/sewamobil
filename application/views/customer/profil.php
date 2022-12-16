<section id="page-title-area" class="section-padding overlay">
  <div class="container">
    <div class="row">
      <!-- Page Title Start -->
      <div class="col-lg-12">
        <div class="section-title  text-center">
          <h2>Profil</h2>
          <span class="title-line"><i class="fa fa-user"></i></span>
          <p>Pastikan data profil Anda sudah yang terbaru.</p>
        </div>
      </div>
      <!-- Page Title End -->
    </div>
  </div>
</section>
<div class="contact-page-wrao section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 m-auto">
        <span class="mt-2"><?php echo $this->session->flashdata('pesan') ?></span>
        <div class="contact-form">
          <form action="<?= base_url('customer/profil') ?>" method="POST">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?= $customer['nama'] ?>">
                  <?php echo form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
                </div>
              </div>

              <div class="col-lg-6 col-md-6">
                <div class="">
                  <label for="no_telepon">No Telp</label>
                  <input type="text" id="no_telepon" class="form-control" name="no_telepon" placeholder="No Telp" value="<?= $customer['no_telp'] ?>">
                  <?php echo form_error('no_telepon', '<div class="text-small text-danger">', '</div>') ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 pt-3">
                <div class="">
                  <label for="gender">Jenis Kelamin</label>
                  <select class="form-control" name="gender" id="gender">
                    <option <?= ($customer['gender'] === 'Laki-laki') ? 'selected' : '' ?> value="Laki-laki">Laki-laki</option>
                    <option <?= ($customer['gender'] === 'Perempuan') ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                  </select>
                  <?php echo form_error('gender', '<div class="text-small text-danger">', '</div>') ?>
                </div>
              </div>

              <div class="col-lg-6 col-md-6 pt-3">
                <div class="">
                  <label for="no_ktp">No KTP</label>
                  <input type="text" id="no_ktp" class="form-control" name="no_ktp" placeholder="No KTP" value="<?= $customer['no_ktp'] ?>">
                  <?php echo form_error('no_ktp', '<div class="text-small text-danger">', '</div>') ?>
                </div>
              </div>
            </div>

            <div class="message-input">
              <label for="alamat">Alamat</label>
              <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat" value="<?= $customer['alamat'] ?>">
              <?php echo form_error('alamat', '<div class="text-small text-danger">', '</div>') ?>
            </div>

            <div class="input-submit">
              <button type="submit">Update Profil</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>