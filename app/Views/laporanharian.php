<!-- <div class="card" style="padding-left : 450px; padding-top : 100px; position : relative;">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Forms</h5>
              <div class="card d-flex" style="width : 100%;">
                <div class="card-body">
                  
                </div>
              </div>
            </div>
          </div>
        </div> -->
<div class="" style="padding-left : 450px; padding-top : 100px; position : relative;">
<div class="col-lg-8 d-flex align-items-stretch">
            <div class="card d-flex" style="width : 100%">
              <div class="card-body p-8">
                <h5 class="card-title fw-semibold mb-4" style="padding-top : 10px; padding-left :15px;">Puki</h5>
                
                <form method="post" action="<?= base_url('/Home/FilterLaporanHarian') ?>">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Date</label>
                      <input type="date" name="dt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text"></div>
                    </div>
                  </form>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?=base_url('home/print_pdf') ?>">
                    <button class="btn btn-danger" type="submit">PDF</button>
                    </a>
                    <a href="<?=base_url('home/print_excel') ?>">
                    <button class="btn btn-success">Excel</button>
                    </a>

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
                          <h6 class="fw-semibold mb-0">Wahana</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Paket</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Jam Masuk</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Sampai Waktu</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      foreach ($dt as $key) {
                        ?>
                      <tr>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?php echo $no++ ?></h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?= $key->pengunjung ?></h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?= $key->namawahana ?></h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?= intval($key->jam) * 10000 ?></h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?= $key->inputDate ?></h6>
                        </td>
                        <?php 
                        $inputDate = new DateTime($key->inputDate); // Create a DateTime object with the input date
                        $inputDate->modify('+' . $key->jam . ' hours'); // Add the number of hours to the input date
                        ?>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?= $inputDate->format('Y-m-d H:i:s'); ?></h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?= $key->status ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <a href="<?= base_url('/Home/printData') . '/' .$key->idd  ?>" target="_Blank"><button class="btn btn-primary">
                           Print
                          </button></a>
                        </td>
                      <?php }
                      if(empty($dt)){ 
                        echo '<tr class="odd"><td colspan="8" style="align-text : center;">NO DATA AVAILABLE</td></tr>';
                    }
                      ?>                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>