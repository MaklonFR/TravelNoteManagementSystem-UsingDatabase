<?php
//print_r($_POST);
$timezone = 'Asia/Makassar';
date_default_timezone_set($timezone);

include "../config/koneksi.php";
if(isset($_POST['nik'])!==null)
 {
    $nik 		     = $_POST['nik'];
	  $password    = $_POST['password'];
    $nama        = $_POST['nama'];
    $today       = date('Y-m-d h:i:sa');

    $sql = "INSERT INTO user (nik, password, nama, create_on) 
    VALUES ('$nik','$password', '$nama','$today')";			
    if($conn->query($sql) == 1)
    {
     $data = "Add successfully!";
     echo $data;               
      }
      else
        {
          $data = "Add Error!";
        echo $data;
        }
 }


 //path to save txt file
 /* $data= $nik. (str_replace(' ', '', $nama));
	$myFile = "../config/config.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
  //file_put_contents($myFile, $data. "\n", FILE_APPEND);
  fwrite($fh, $data."\n");
  fclose($fh);
    
    $data="OK"; 
    echo $data;
  } else
    {
    $data="ERROR";
    echo $data;
    }
    */
?>