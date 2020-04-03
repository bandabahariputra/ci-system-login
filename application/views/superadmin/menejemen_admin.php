<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<!-- Content Row -->
<div class="row mb-4">
  <div class="col">
    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#tambahMenuModal">Tambah Admin</a>
  </div>
</div>

<div class="row">

  <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
    <?= $this->session->flashdata('msg') ?>
    <div class="card shadow">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Password Status</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($allAdmin as $aa) : ?>
                  <tr>
                    <td><?= $aa['id_admin'] ?></td>
                    <td><?= $aa['nama'] ?></td>
                    <td><?= $aa['username'] ?></td>
                    <td>
                      <div class="d-flex justify-content-between">
                        <?php if ( $aa['password'] == '1234' ) : ?>
                          Default: 1234
                        <?php else : ?>
                          Diubah
                        <?php endif ?>
                        <a href="<?= base_url('superadmin/admin/resetpassword/' . $aa['id_admin']) ?>" class="badge badge-primary">reset</a>
                      </div>
                    </td>
                    <td><?= $aa['role'] ?></td>
                    <td>
                      <a href="<?= base_url('superadmin/admin/hapus/' . $aa['id_admin']) ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                        <i class="fas fa-sm fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Menu Modal-->
<div class="modal fade" id="tambahMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('superadmin/admin') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="menu">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?= set_value('nama') ?>">
            <?= form_error('nama', '<div class="text-xs text-danger">', '</div>'); ?>
          </div>
          <div class="form-group">
            <label for="menu">Username</label>
            <input type="text" class="form-control" name="username" value="<?= set_value('username') ?>">
            <?= form_error('username', '<div class="text-xs text-danger">', '</div>'); ?>
          </div>
          <div class="form-group">
            <label for="menu">Role</label>
            <select class="form-control" name="role_id" id="role_id">
              <option selected disabled>Pilih role</option>
              <?php foreach ($role as $r) : ?>
                <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
              <?php endforeach ?>
            </select>
            <?= form_error('role_id', '<div class="text-xs text-danger">', '</div>'); ?>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-primary" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>