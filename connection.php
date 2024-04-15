<?php
$sername = "localhost";
$username = "root";
$password = "";
$dbname = "registation_form";


$connection  = new mysqli("localhost","root","","registation_form");

if($connection){

     //echo "connection ok";
}
else{
    echo "conection failed";
}


?>