<?php
  include '../config/session.php';
  
   if (isset($_POST['id'])!="")
    {
      $id  = isset($_POST['id']) ? $_POST['id'] : NULL;
      
      $sql= "SELECT * from catatan where id='$id'";
      $query = $conn->query($sql);
      $row = $query->fetch_assoc();
    }

?>


<div class="row"> 
         <div class="col-lg-2"></div>
          <div class="col-lg-8 mb-5">
           <div class="card">
               <div class="card-header">
                 <h4 class="card-heading text-center">Update Data Perjalanan</h4>
               </div>
              <div class="card-body">
 
                <form class="form-horizontal" id="fadd">  
                    <input type="text" value="<?php echo $row["id"]; ?>" id="id_catatan" hidden>  
                 <div class="row">
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="mb-2">Taggal:</label>
                      <div class="input-group mb-3"><span class="input-group-text">TG</span>
                        <input class="form-control" value="<?php echo $row["tgl"]; ?>" id="tgl" name="tgl" type="date" aria-label="-">
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="mb-2">Waktu:</label>
                      <div class="input-group mb-3"><span class="input-group-text">W</span>
                        <input class="form-control" value="<?php echo $row['jam']; ?>" id="wkt" name="wkt" type="time" aria-label="-">
                      </div>
                    </div>
                    
                    <div class="mb-3">
                      <label class="mb-2">Alamat:</label>
                      <div class="input-group mb-3"><span class="input-group-text">Al</span>
                        <input class="form-control" value="<?php echo $row['asal']; ?>" id="al" name="al" type="text" aria-label="-">
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="mb-2">Lokasi yang dikunjung:</label>
                      <div class="input-group mb-3"><span class="input-group-text">LK</span>
                        <input class="form-control" value="<?php echo $row['tujuan']; ?>" id="lk" name="lk" type="text" aria-label="-">
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="mb-2">Suhu Tubuh:</label>
                      <div class="input-group mb-3"><span class="input-group-text">ST</span>
                        <input class="form-control" value="<?php echo $row['suhu']; ?>" id="st" name="st" type="text" aria-label="-">
                      </div>
                    </div>

                  </div>
                  <div class="mb-3">      
                      <button class="btn btn-primary px-4" id="update" type="button">Update Data</button>
                      <button class="btn btn-warning px-4" onclick="cancel();" id="<?php echo $row["nik"]; ?>" type="button">Batal</button> 
                    </div>
                </div>
              </form>

            </div>
           </div>
          </div> <div class="col-lg-2"></div>

<script type="text/javascript"> 

 function cancel()
  {
    $.ajax({
      url     : "page/catatan.php",
      method  : "GET",
      data    : { },
        success:function (data) {
        //alert(data); return;
        $("#data_tampil").html(data).refresh;
        }

      });
   }
 
 $("document").ready(function(){

 /* KONDISI SAAT KLIK TOMBOL REGISTER*/
  $("#update").click(function(){
    var id  = $("#id_catatan").val();
    var tgl = $("#tgl").val();
    var wkt = $("#wkt").val();
    var al  = $("#al").val();
    var lk  = $("#lk").val();
    var st  = $("#st").val();
  
    if ( (id=="") || (tgl=="") || (wkt=="") || (al=="") || (lk=="") || (st=="")  )
    {
      alert("Field belum diisi!"); return;
    }
    $.ajax({
      url     : "crud/update.php",
      method  : "POST",
      data    : { 
                  id:id,
                  tgl:tgl, 
                  wkt:wkt,
                  al:al,
                  lk:lk,
                  st:st
                },
        success:function (data) {
        //alert(data); return;
        if (data=="OK")
        {
          document.getElementById("fadd").reset();
          alert("Update Successfuly!");
          tampil_catatan();
        } else 
        if (data=="ERROR")
        {
          document.getElementById("fadd").reset();
          alert("Update Error!");
        }
      }
    })
  });

 });

 </script>

</div>