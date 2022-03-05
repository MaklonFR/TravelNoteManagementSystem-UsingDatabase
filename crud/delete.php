<?php

include '../config/session.php';  
if(isset($_POST['id'])!==null)
 {
    $id   = $_POST['id'];
    $sql = "DELETE FROM catatan WHERE id = '$id'";         
            if  ($conn->query($sql)==1) 
            {
             $data = "OK";
             echo $data;
		}
		else{
            $data = "ERROR";
            echo $data;
        }
}
?>