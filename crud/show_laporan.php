<?php
print_r($_POST);

include "../config/koneksi.php";
if(isset($_POST['id'])!==null)
 {
    $nik    = $_POST['id'];
   // echo $id;
    $sql="SELECT * FROM catatan  WHERE nik='$nik' ORDER BY id DESC LIMIT 50";
    $result= $conn->query($sql);

    if ($result->num_rows > 0 ) {
        while ($row = $result->fetch_assoc())
        {
        $id = $row["id"];    
         echo "<tr class='data-row'>";    
            echo "<td>".$row["tgl"]."</td>";
            echo "<td>".$row["jam"]."</td>";
            echo "<td>".$row["asal"]."</td>";
            echo "<td>".$row["tujuan"]."</td>";
            echo "<td>".$row["suhu"]."</td>";
            echo "<td>".$row["create_on"]."</td>";        
         echo "</tr>";
        }

     }else 
      {
        echo "<tr>
        <td class='text-danger'>Data kosong</td>
        <td class='text-danger'>Data kosong</td>
        <td class='text-danger'>Data kosong</td>
        <td class='text-danger'>Data kosong</td>
        <td class='text-danger'>Data kosong</td>
        <td class='text-danger'>Data kosong</td>
        </tr>";      
    } 
   
}  
?>