<div class="col-lg-4"></div>
             <div class="col-lg-4 mb-5">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-heading text-center">Form Register</h4>
                </div>
                <div class="card-body">
                  <p class="text-center">Silahkan daftar sekarang!</p>
                  <form id="flogin_regis">
                    <div class="mb-3">
                      <label class="form-label text-uppercase">NIK</label>
                      <input class="form-control" type="number" name="nik" id="nik"
                      placeholder="Masukan NIK">
                    </div>
                    <div class="mb-3">       
                      <label class="form-label text-uppercase">Password</label>
                      <input class="form-control" type="password" name="pass" id="pass"
                      placeholder="Masukan Password">
                    </div>
                    <div class="mb-3">       
                      <label class="form-label text-uppercase">Nama Lengkap</label>
                      <input class="form-control" type="text" name="nama" id="nama"
                      placeholder="Masukan Nama">
                    </div>
                    <div class="mb-3">      
                      <button class="btn btn-primary px-4" id="regis" type="button">Register</button> 
                    </div>
                  </form>
                    <div class="card-footer px-lg-5 py-lg-4">
                        <div class="text-sm text-muted">
                            Apa anda pengguna lama? Login sekarang! 
                            <a href="#" id="tampil_login">Login</a>
                        </div>
                    </div>
                </div>
              </div>
             </div>
<div class="col-lg-4"></div>

<script type="text/javascript"> 
 $("document").ready(function(){

  $("#tampil_login").click(function() {
    tampil_login();
  });

  function tampil_login() {
    $.ajax({
        url:"login_page.php",
        method:"GET",
        data:{},
          success:function(data)
          {
            /*Tampilkan Data Home berdasarkan nama ID (#) DIV*/
            $("#tampil_login_register").html(data).refresh;
          }
    });
  }
  
  /* KONDISI SAAT KLIK TOMBOL REGISTER*/
  $("#regis").click(function(){
    var nik      = $("#nik").val();
    var password = $("#pass").val();
    var nama     = $("#nama").val();
    if ( (nik=="") || (password=="") || (nama=="") )
    {
      alert("Field belum diisi!"); return;
    }
    $.ajax({
      url     : "crud/register.php",
      method  : "POST",
      data    : { nik:nik, password:password, nama:nama },
        success:function (data) {
        //alert(data); return;
        if (data=="OK")
        {
          document.getElementById("flogin_regis").reset();
          alert("Register Successfuly!");
          window.location.href="index.php"; 
        } else 
        if (data=="ERROR")
        {
          document.getElementById("flogin_regis").reset();
          alert("Register Error!");
        }
      }
    })
  });

 });

 </script>