<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<!-- Content Row -->
<div class="row">

  <div class="col-lg-3 col-md-4 col-sm-12 mb-4">
    <div class="card border-left-primary shadow">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <img src="<?= base_url('assets/img/profil/') . $admin['gambar'] ?>" class="card-img">
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-9 col-md-8 col-sm-12 mb-4">
    <div class="card border-left-info shadow">
      <div class="card-body">
        <div class="row no-gutters align-items-center">

            <div class="col-4">
              <h5>Nama</h5>
              <h5>Username</h5>
            </div>

            <div class="col text-gray-900">
              <h5>: <?= $admin['nama'] ?></h5>
              <h5>: <?= $admin['username'] ?></h5>
            </div>

        </div>
        <div class="row">
          <div class="col mt-2">
            <p>Sejak <?= date('d F Y', $admin['date_created']) ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>