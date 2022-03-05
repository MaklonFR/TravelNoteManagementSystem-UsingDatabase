<div class="col-lg-4"></div>
             <div class="col-lg-4 mb-5">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-heading text-center">Form Login</h4>
                </div>
                <div class="card-body">
                  <p class="text-center">Silahkan masukan NIK dan Password!</p>
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
                      <button class="btn btn-primary px-4" id="login" type="button">Log in</button>
                    </div>
                  </form>
                    <div class="card-footer px-lg-5 py-lg-4">
                        <div class="text-sm text-muted">
                            Apa anda pengguna baru? Daftar sekarang! <a href="#" id="tampil_register">Register</a>
                        </div>
                    </div>
                </div>
              </div>
             </div>
<div class="col-lg-4"></div>

<script type="text/javascript"> 
 $("document").ready(function(){

  $("#tampil_register").click(function() {
      tampil_register();
  });

  function tampil_register () {
    $.ajax({
        url:"register_page.php",
        method:"GET",
        data:{},
          success:function(data)
          {
            /*Tampilkan Data Home berdasarkan nama ID (#) DIV*/
            $("#tampil_login_register").html(data).refresh;
          }
    });
  }

    /* KONDISI SAAT KLIK TOMBOL LOGIN*/
  $("#login").click(function(){
    var nik       = $("#nik").val();
    var password  = $("#pass").val();
    if ( (nik=="") || (password=="") )
    {
      alert("Field belum diisi!"); return;
    }
    $.ajax({
      url     : "crud/login.php",
      method  : "POST",
      data    : { nik:nik, password:password },
        success:function (data) {
        //alert(data); return;
        if (data=="OK")
        {
          document.getElementById("flogin_regis").reset();
          alert("Login Successfuly!");
          window.location.href="home.php";  
        } else 
        if (data=="ERROR")
        {
          document.getElementById("flogin_regis").reset();
          alert("Terjadi kesalahan! Error Username dan Password");
        }
      }
    })
  });

 });

 </script>