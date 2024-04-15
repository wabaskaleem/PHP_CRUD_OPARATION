<?php
include("connection.php");

$id =  $_GET['id'];

$query = "DELETE FROM form_data WHERE ID = '$id' ";
$data = mysqli_query($connection,$query);

if($data){

    echo "<script>alert('Record Deleted Sucessfully') </script>";
    ?>
     <meta http-equiv="refresh" 
          content="0; url = http://localhost/crud/display.php" /> 
    <?php
}else{
   
    echo "<script>alert('Failed To Delete') </script>";
    
}

?>