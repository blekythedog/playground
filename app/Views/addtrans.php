
<div class="container-fluid" style="width : 500px; padding-top: 50px;">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semib  old mb-4">Transaksi</h5>
                <div class="alert alert-warning" style="display: none" id="AlertPop"></div>

              <div class="card">
                <div class="card-body">
                  <form id="xform">
                    <div class="mb-3">
                      <input type="hidden" value="<?= $dt[0]->idd ?>" id="idd">
                      <label for="exampleInputEmail1" class="form-label">Nama Pengunjung</label>
                      <input type="text" class="form-control" name="pengunjung" id="exampleInputEmail1" aria-describedby="emailHelp" disabled value = "<?= $dt[0]->pengunjung ?>">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama Orang tua</label>
                      <input type="text" class="form-control" name="nama_ortu" id="exampleInputPassword1"  disabled value = "<?= $dt[0]->nama_ortu ?>">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Alamat Orang Tua</label>
                      <input type="text" class="form-control" name="alamat_ortu" id="exampleInputPassword1"  disabled value = "<?= $dt[0]->alamat_ortu ?>">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">No Orang Tua</label>
                      <input type="number" class="form-control" name="no_hp" id="exampleInputPassword1" disabled value = "<?= $dt[0]->no_hp ?>">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Jam</label>
                      <input type="text" class="form-control" name="Jam" id="exampleInputPassword1" disabled value = "<?= $dt[0]->jam . " Jam" ?>">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Total</label>
                      <input type="number" class="form-control" name="Total" id="total" disabled value = "<?= $dt[0]->jam * 10000 ?>">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Bayar</label>
                      <input type="number" class="form-control" name="Total" id="bayar" value="0">
                    </div>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                  </form>
                </div>
              </div>
              </div>
              </div>
              </div>

              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <script> 
                    $(document).ready(function(){
                        var baseUrl = window.location.protocol + "//" + window.location.host; 
                        var xForm =  $("#xform");
                        var xBayar =  $("#bayar");
                        var xTotal =  $("#total");
                        var xAlert =  $("#AlertPop");
                        var xIdd =  $("#idd");

                        
                        xForm.on('submit', function(event) {
                            event.preventDefault();
                            if (parseFloat(xBayar.val()) < parseFloat(xTotal.val())){popAlert("warning","Nilai Bayar tidak boleh di bawah Total Harga"); return}
                            $.ajax({
                                url : baseUrl + "/Home/pb_trans",
                                method : "POST",
                                data : { id : xIdd.val(), bayar : xBayar.val()},
                                dataType : "json",
                                success : function(data){
                                    popAlert('success','Successed',true)
                                    var url = baseUrl + "/Home/printData/" + xIdd.val();
                                    window.open(url, "_blank");


                                    setTimeout(function() {
                                        window.location.href = baseUrl + "/Home/main";
                                    }, 3000);
                                }, 
                                error : function(jqXHR, err){
                                    popAlert('danger','Failed',true)
                                    console.log(jqXHR);
                                }

                            })
                        })
                        
                        function popAlert(type,str, notimer = false){
                            xAlert.removeClass().addClass('alert alert-' + type);
                            xAlert.show();
                            xAlert.html(str);
                            if (!notimer){
                                setTimeout(function() {
                                    xAlert.hide();
                                }, 3000);
                            }
                        }

                    })

              </script>