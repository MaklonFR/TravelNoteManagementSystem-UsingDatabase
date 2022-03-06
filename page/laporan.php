<?php
//print_r($_POST);
	include '../config/session.php';
?>

<div class="row">
           <div class="col-lg-2"> </div>
           <div class="col-lg-8 mb-5">
            <div class="card">
              <div class="card-header">
                <h2 class="text-center">LAPORAN PERJALANAN</h2>
              </div>
              <div style="overflow-x:auto;" class="card-body"> 
               <label class="col-md-9 form-label">Cari dengan tanggal atau suhu tubuh:</label>
               <div class="row d-flex justify-content-between">
                <div class="col-lg-4">
                  <input class="form-control" name="cari" id="cari"
                  type="text" placeholder="Ketik disini untuk pencarian..">
                </div>
                <div class="col-lg-2">
                  <button class="btn btn-success px-4" id="cetak" type="button">Cetak Laporan</button> 
                </div>
              </div>
                       
                <input id="id" name="id" value="<?php echo $user["nik"] ?>" hidden>  
                <div id="section-to-print">                 
                <table class="table table-striped table-hover card-text" id="print_tb">
                  <thead>
                    <tr>
                      <th>Tanggal </th>
                      <th>Waktu </th>
                      <th>Alamat </th>
                      <th>Lokasi Tujuan</th>
                      <th>Suhu</th>
                      <th class="text-center">Waktu pengisian</th>
                    </tr>
                  </thead>
                  
                    <tbody id="tampil">

                    </tbody>
                  
                  </table>
                </div>
              </div>
            </div>
           </div>
          <div class="col-lg-2"> </div>
</div>

<script type="text/javascript"> 
  $(document).ready(function() {
   
    /* CETAK LAPORAN */
    $('#cetak').click(function(){
      $('#cetak').hide();
      $('#cari').hide();
      $('.form-label').hide();
      $('#menubar').hide();
      window.print();
    }); 

    /* PENCARIAN */
    $('input[name="cari"]').keyup(function(){ 
	    	var searchterm = $(this).val();
			
			if(searchterm.length > 1) {
				var match = $('tr.data-row:contains("' + searchterm + '")');
				var nomatch = $('tr.data-row:not(:contains("' + searchterm + '"))');				
				match.addClass('selected');
				nomatch.css("display", "none");
			} else {
				$('tr.data-row').css("display", "");
				$('tr.data-row').removeClass('selected');				
			}
    });

    data_tampil();
			
  });

  function data_tampil()
  {
    var id  = $("#id").val();
    $.ajax({
      url     : "crud/show_laporan.php",
      method  : "POST",
      data    : { 
                  id:id
                },
        success:function (data) {
        //alert(data); return;
        $("#tampil").html(data).refresh;
        }

      });
  }

  </script>