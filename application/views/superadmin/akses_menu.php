<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<!-- Content Row -->
<div class="row">

  <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
    <?= $this->session->flashdata('msg') ?>
    <h5>Role: <?= $role['role'] ?></h5>
    <div class="card shadow">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Menu</th>
                  <th>Akses</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($menu as $m) : ?>
                  <tr>
                    <td><?= $m['id'] ?></td>
                    <td><?= $m['menu'] ?></td>
                    <td>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" <?= checkAccess($role['id'], $m['id']) ?> data-role="<?= $role['id'] ?>" data-menu="<?= $m['id'] ?>">
                      </div>
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
