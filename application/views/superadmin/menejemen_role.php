<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<!-- Content Row -->
<div class="row mb-4">
  <div class="col">
    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#tambahMenuModal">Tambah Role</a>
  </div>
</div>

<div class="row">

  <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
    <?= $this->session->flashdata('msg') ?>
    <div class="card shadow">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($role as $r) : ?>
                  <tr>
                    <td><?= $r['id'] ?></td>
                    <td><?= $r['role'] ?></td>
                    <td>
                      <a href="<?= base_url('superadmin/aksesmenu/' . $r['id']) ?>" class="btn btn-warning btn-sm">
                        Akses
                      </a>
                      <a href="<?= base_url('superadmin/role/hapus/' . $r['id']) ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('superadmin/role') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="role">Role</label>
            <input type="text" class="form-control" name="role">
            <?= form_error('role', '<div class="text-xs text-danger">', '</div>'); ?>
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