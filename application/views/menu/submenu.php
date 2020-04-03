<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<!-- Content Row -->
<div class="row mb-4">
  <div class="col">
    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#tambahMenuModal">Tambah Submenu</a>
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
                  <th>Title</th>
                  <th>Url</th>
                  <th>Icon</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($submenu as $sm) : ?>
                  <tr>
                    <td><?= $sm['id_submenu'] ?></td>
                    <td><?= $sm['title'] ?></td>
                    <td><?= $sm['url'] ?></td>
                    <td><i class="<?= $sm['icon'] ?>"></i> <?= $sm['icon'] ?></td>
                    <td><?= $sm['menu'] ?></td>
                    <td>
                      <a href="<?= base_url('menu/submenu/edit/' . $sm['id_submenu']) ?>" class="btn btn-success btn-circle btn-sm">
                        <i class="fas fa-sm fa-pencil-alt"></i>
                      </a>
                      <a href="<?= base_url('menu/submenu/hapus/' . $sm['id_submenu']) ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Submenu</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="menu">Title</label>
            <input type="text" class="form-control" name="title" value="<?= set_value('title') ?>">
            <?= form_error('title', '<div class="text-xs text-danger">', '</div>'); ?>
          </div>
          <div class="form-group">
            <label for="menu">Url</label>
            <input type="text" class="form-control" name="url" value="<?= set_value('url') ?>">
            <?= form_error('url', '<div class="text-xs text-danger">', '</div>'); ?>
          </div>
          <div class="form-group">
            <label for="menu" class="d-inline">Icon</label>
            <div class="d-inline text-xs text-info">(Lihat Font Awesome)</div>
            <input type="text" class="form-control" name="icon" value="<?= set_value('icon') ?>">
            <?= form_error('icon', '<div class="text-xs text-danger">', '</div>'); ?>
          </div>
          <div class="form-group">
            <label for="menu">Menu</label>
            <select class="form-control" name="menu_id" id="menu_id">
              <option selected disabled>Pilih menu</option>
              <?php foreach ($menu as $m) : ?>
                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
              <?php endforeach ?>
            </select>
            <?= form_error('menu_id', '<div class="text-xs text-danger">', '</div>'); ?>
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