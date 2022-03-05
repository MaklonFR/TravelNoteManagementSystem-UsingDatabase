<?php
//print_r($_POST);

include '../config/koneksi.php';
if (!isset($_SESSION)) {
    session_start();	
}

if(isset($_POST['nik'])!==null)
 {
    $nik 		    = $_POST['nik'];
	$password 	    = $_POST['password'];
    
    $sql = "SELECT * FROM user WHERE (( nik = '$nik') AND (password='$password'))";
    $query = $conn->query($sql);

    if($query->num_rows < 1){	
        $_SESSION['error'] = 'Cannot find account with the nik';
        echo "ERROR";
    } 
    else 
    {
        $row = $query->fetch_assoc();
		$_SESSION['admin']     = $row['nik'];
        $sql = "SELECT * FROM user WHERE nik = '".$_SESSION['admin']."'";
        $query = $conn->query($sql);
        $user = $query->fetch_assoc();
        echo "OK";
    }

 }



/*  $cek        = 0;
    $path       = '../config/config.txt'; 
    $user       = $nik. (str_replace(' ', '', $nama));

    $file = fopen($path, 'r') or die("can't open file");

    while(!feof($file)){
        $line = fgets($file);
        list($u) = explode(" ", $line);
        if(trim($u) == trim($user)){
            //echo trim ($u);
            $cek++;
            break;
        }
    }
    fclose($file);

    if($cek > 0)
    {   
        $_SESSION['admin'] =  $nik;
        $_SESSION['nama'] =   $nama;
        $data="OK";
        echo $data;
    } else
    {
        $data="ERROR";
        echo $data;
    } 

 }*/

?>