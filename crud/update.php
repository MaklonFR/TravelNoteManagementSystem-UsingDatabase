<?php
//print_r($_POST);

$timezone = 'Asia/Makassar';
date_default_timezone_set($timezone);

include "../config/koneksi.php";
if(isset($_POST['id'])!==null)
 {
    $id  = $_POST['id'];
    $tgl  = $_POST['tgl'];
	$wkt  = $_POST['wkt'];
    $al   = $_POST['al'];
    $lk   = $_POST['lk'];
    $st   = $_POST['st'];
    $today= date('Y-m-d h:i:sa');

   $sql = "UPDATE catatan SET 
           tgl      = '$tgl', 
           jam      = '$wkt',
           asal     = '$al',
           tujuan   = '$lk',
           suhu     = '$st',
           create_on= '$today'
           WHERE id = '$id'";
   if($conn->query($sql) == 1)
       {
        $data = "OK";
        echo $data;               
       }
        else
          {
            $data = "ERROR";
            echo $data;
          }
}

?>