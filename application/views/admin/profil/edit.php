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
            <?= form_open_multipart('admin/profil/edit') ?>
            <div class="form-group">
              <label for="title">Username</label>
              <input type="text" class="form-control" name="username" value="<?= $admin['username'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="title">Nama</label>
              <input type="text" class="form-control" name="nama" value="<?= $admin['nama'] ?>">
            </div>
            <div class="form-group">
              <label for="title">Gambar</label>
              <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                  <img src="<?= base_url('assets/img/profil/' . $admin['gambar']) ?>" class="img-fluid pb-4">
                </div>
                <div class="col">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                    <label class="custom-file-label">Pilih gambar</label>
                  </div>
                </div>
              </div>
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
