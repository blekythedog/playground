<div class="container-fluid" style="width : 500px; padding-top: 50px;">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semib  old mb-4">Forms</h5>
              <div class="card">
                <div class="card-body">
                  <form action="<?= base_url('home/p_daftar') ?>" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama Pengunjung</label>
                      <input type="text" class="form-control" name="pengunjung" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">isi dong</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama Orang tua</label>
                      <input type="text" class="form-control" name="nama_ortu" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Alamat Orang Tua</label>
                      <input type="text" class="form-control" name="alamat_ortu" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">No Orang Tua</label>
                      <input type="number" class="form-control" name="no_hp" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
              </div>
              </div>
              </div>
