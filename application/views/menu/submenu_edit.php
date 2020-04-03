<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<!-- Content Row -->

<div class="row">

  <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
    <div class="card shadow">
      <div class="card-body">
        <div class="row no-gutters align-items-center">

          <div class="col">
            <div class="form-group">
              <h6>Edit Submenu</h6>
            </div>
            <form action="<?= base_url('menu/submenu/edit/' . $submenu['id_submenu']) ?>" method="post">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" value="<?= $submenu['title'] ?>">
            </div>
            <div class="form-group">
              <label for="title">Url</label>
              <input type="text" class="form-control" name="url" value="<?= $submenu['url'] ?>">
            </div>
            <div class="form-group">
              <label for="menu" class="d-inline">Icon</label>
              <div class="d-inline text-xs text-info">(Lihat Font Awesome)</div>
              <input type="text" class="form-control" name="icon" value="<?= $submenu['icon'] ?>">
            </div>
            <div class="form-group">
              <label for="title">Icon</label>
              <select name="menu_id" id="menu_id" class="form-control">
                <?php foreach ($menu as $m) : ?>
                  <?php if ( $m['id'] == $submenu['menu_id'] ) : ?>
                    <option value="<?= $m['id'] ?>" selected><?= $m['menu'] ?></option>
                  <?php else : ?>
                    <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                  <?php endif ?>
                <?php endforeach ?>
              </select>
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

<!-- Logout Modal-->
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
            <label for="menu">Icon</label>
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