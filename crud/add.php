<?php
//print_r($_POST);
$timezone = 'Asia/Makassar';
date_default_timezone_set($timezone);

include "../config/koneksi.php";
if(isset($_POST['id'])!==null)
 {
    $nik  = $_POST['id'];
    $tgl  = $_POST['tgl'];
	  $wkt  = $_POST['wkt'];
    $al   = $_POST['al'];
    $lk   = $_POST['lk'];
    $st   = $_POST['st'];
    $today= date('Y-m-d h:i:sa');

 $sql = "INSERT INTO catatan (tgl, jam, asal, tujuan, suhu, nik, create_on) 
 VALUES ('$tgl','$wkt', '$al', '$lk', '$st', '$nik', '$today')";
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

	//path to save txt file

  /*$myFile = "../data/$id.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
  //add file 
  fwrite($fh, $tgl.''.";");
  fwrite($fh, $wkt.''.";");
  fwrite($fh, $al.''.";");
  fwrite($fh, $lk.''.";");
  fwrite($fh, $st.''.";");
  fwrite($fh, ""."\n");
  fclose($fh);
    
    $data="OK"; 
    echo $data;
  } else
    {
    $data="ERROR";
    echo $data;
    } */
?>