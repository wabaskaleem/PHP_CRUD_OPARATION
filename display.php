<html>
    <head>
        <title>Display</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <style>
            body{
                background-color: gray;
            }
            table{
                border: gray;
               background : white;
            }
            .update, .delete{
                background-color: green;
                color: white;
                border: 0;
                outline: none;
                border-radius: 5px;
                height: 22px;
                width: 80px;
                font-size: 15px;
                font-weight: bold;
                text-align: center;
                cursor: pointer;
                /* margin: 5px; */
            }
            .delete{
                background-color: red;
            }
        </style>
    </head>
</html>
<?php
include("connection.php");
error_reporting(0);

$quary = "SELECT * FROM form_data";

$data = mysqli_query($connection,$quary);

$total = mysqli_num_rows($data);

 

//echo $total;



if($total != 0){
  //  echo "Table has record ";
  
    ?>
    <h2 align = "center" class="m-3 "><mark> Display All record</mark></h2>
    <center><table border = "1" cellspacing = "10" width="80%">
        <tr>
            <th width = 5%>ID</th>
            <th width = 10%>fname</th>
            <th width = 10%>lname</th>
            <th width = 20%>email</th>
            <th width = 10%>gender</th>
            <th width = 10%>country</th>
            <th width = 15% style=' text-align: center;'>Operation</th>
        </tr>
<?php
  while($result = mysqli_fetch_assoc($data)){

    echo"<tr>
    <td>$result[ID]</td>
    <td>$result[fname]</td>
    <td>$result[lname]</td>
    <td>$result[email]</td>
    <td>$result[gender]</td>
    <td>$result[country]</td>
    <td><a href='Update_design.php?id=$result[ID]'><input type='submit' value= 'Update'class='update'></a>
    <a href='Delete_design.php?id=$result[ID]'><input type='submit' value= 'Delete'class='delete' onclick = 'return checkdelete()'></a></td>   
   
</tr>";
  }}

else{
    echo "No record Found";
}

?>
</table>
</center>           

<script>
    function checkdelete(){

        return confirm('KIYA AP YE DATA DELETE KARNA CHATY HAI ?');
    }
</script>