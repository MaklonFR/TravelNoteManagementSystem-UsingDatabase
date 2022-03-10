<?php
//print_r($_POST);
	include '../config/session.php';
?>

<!-- BUAT STYLE POINTER PADA TH -->
<style>
th{
  cursor: pointer;
}
#myTable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>

<div class="row">
           <div class="col-lg-2"> </div>
           <div class="col-lg-8 mb-5">
            <div class="card">
              <div class="card-header">
                <h4 class="card-heading text-center">DATA PERJALANAN</h4>
              </div>
              <div style="overflow-x:auto;" class="card-body"> 
              <label class="col-md-9 form-label">Cari dengan tanggal atau suhu tubuh:</label>
              <div class="row d-flex justify-content-between mb-2">
                 <div class="col-lg-4">
                  <input class="form-control" name="cari" id="cari"
                  type="text" placeholder="Ketik disini untuk pencarian..">
                 </div>
                 <div class="col-lg-2">
                  <button class="btn btn-primary px-4" id="lap" onclick="show_laporan();" type="button">Laporan</button> 
                 </div>
              </div>   
                <input id="id" name="id" value="<?php echo $user["nik"] ?>" hidden>                   
                <table id="myTable" class="table table-striped table-hover card-text">
                  <thead>
                    <tr>
                      <th onclick="sortTable(0)">Tanggal </th>
                      <th onclick="sortTable(1)">Waktu </th>
                      <th onclick="sortTable(2)">Alamat </th>
                      <th onclick="sortTable(3)">Lokasi Tujuan</th>
                      <th onclick="sortTable(4)">Suhu</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  
                    <tbody id="tampil">

                    </tbody>
                  
                </table>
              </div>
            </div>
           </div>
          <div class="col-lg-2"> </div>
</div>

<script type="text/javascript"> 
  $(document).ready(function() {

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
      url     : "crud/show_catatan.php",
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

  function ubah_data(id) {
    //alert(id);
    $.ajax({
      url     : "page/update_data.php",
      method  : "POST",
      data    : { 
                  id:id
                },
        success:function (data) {
        //alert(data); return;
        $("#data_tampil").html(data).refresh;
        }
        
      });
  }

  function hapus_data(id) {
   //alert(id);
    $.ajax({
      url     : "crud/delete.php",
      method  : "POST",
      data    : { 
                  id:id
                },
        success:function (data) {
          //alert(data); return;
          if (data=="OK")
          {
            alert("Delete Successfuly!");
            tampil_catatan();
          }   else 
          if (data=="ERROR")
           {
            document.getElementById("fadd").reset();
            alert("Add Error!");
           }
       }
        
      });
  }

  function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}


 </script>