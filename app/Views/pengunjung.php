<div class="" style="padding-left : 450px; padding-top : 100px; position : relative;">
<div class="col-lg-8 d-flex align-items-stretch">
            <div class="card d-flex" style="width : 100%">
              <div class="card-body p-8">
                <h5 class="card-title fw-semibold mb-4" style="padding-top : 10px; padding-left :15px;">Recent Transactions</h5>
                <a href="<?= base_url('home/t_pengunjung') ?>"><button class="btn btn-primary">Tambah</button></a>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Pengunjung</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama Ortu</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Alamat</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No hp</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $no = 1;
                      foreach ($dt as $table) {
                        ?>
                      <tr>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?php echo $no++ ?></h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?php echo $table->pengunjung ?></h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?php echo $table->nama_ortu ?></h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?php echo $table->alamat_ortu ?></h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?php echo $table->no_hp ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <a><button class="btn btn-success">
                           Edit
                          </button></a>
                          <a href="<?= base_url('/home/delete_pengunjung/' . $table->id_pengunjung) ?>"><button class="btn btn-danger">
                          Delete
                          </button></a>
                        </td>
                      <?php } ?>                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
