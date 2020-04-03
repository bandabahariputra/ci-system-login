<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<!-- Content Row -->

<div class="row">

  <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
    <?= $this->session->flashdata('msg') ?>
    <div class="card shadow">
      <div class="card-body">
        <div class="row no-gutters align-items-center">

          <div class="col">
            <form action="<?= base_url('admin/profil/ubahpassword') ?>" method="post">
            <div class="form-group">
              <label for="password_lama">Password Lama</label>
              <input type="password" class="form-control" name="password_lama" value="<?= set_value('password_lama') ?>">
              <?= form_error('password_lama', '<div class="text-xs text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
              <label for="password_baru">Password Baru</label>
              <input type="password" class="form-control" name="password_baru" value="<?= set_value('password_baru') ?>">
              <?= form_error('password_baru', '<div class="text-xs text-danger">', '</div>'); ?>
            </div>

            <div class="form-group">
              <label for="ulangi_password">Ulangi Password</label>
              <input type="password" class="form-control" name="ulangi_password">
              <?= form_error('ulangi_password', '<div class="text-xs text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>
