

<div class="container-fluid" style="width : 500px; padding-top: 50px;">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Forms</h5>
              <div class="card">
                <div class="card-body">
                  <form action="<?= base_url('home/p_pengunjung') ?>" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama Pengunjung</label>
                      <select class="form-select" name="selPeng">
                      <option value="0">---</option>
                        <?php foreach ($dtpngjng as $key) { ?>
                            <option value="<?= $key->id_pengunjung ?>"><?= $key->pengunjung ?></option>
                        <?php } ?>
                      </select>

                      <div id="emailHelp" class="form-text">isi dong</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Wahana</label>
                      <select class="form-select" name="selWahana">
                      <option value="0">---</option>
                        <?php foreach ($dtwahana as $key) { ?>
                            <option value="<?= $key->id ?>"><?= $key->namawahana ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Jam</label>
                      <select class="form-select"  name="selJam">
                        <option value="1">1 Jam = 10.000</option>
                        <option value="2">2 Jam = 20.000</option>

                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
              </div>
              </div>
              </div>
