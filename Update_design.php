<?php include ("connection.php");
error_reporting(0);

$id =  $_GET['id'];

$quary = "SELECT * FROM form_data where ID = '$id' ";

$data = mysqli_query($connection,$quary);
$result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Reposive Form by Using htm</title>
</head>
<body>
 <div class="container">
    <h2>Update Student Details</h2>
    <div class="Form-container">
        <form action="" method="POST">

            <div class="input-name">
                <i class="fa fa-user user"></i>
                    <input type="text" placeholder="First Name" value="<?php echo $result['fname'] ?>" class="name" name="fname" >
                <span>
                    <i class="fa fa-user" ></i>
                        <input type="text" placeholder="Last Name" value="<?php echo $result['lname'] ?>"class="name" name="lname" >         
                </span>
            </div>

            <div class="input-name">
                <i class="fa fa-envelope email"></i>
                    <input type="email" placeholder="Email" value="<?php echo $result['email'] ?>" class="text-name" name="email" >
            </div>

            <div class="input-name">
                <i class="fa fa-lock lock"></i>
                    <input type="password" placeholder="Passward" class="text-name" id="pass" name="password" autocomplete="conpass" value="<?php echo $result['PASSWORD'] ?>">
            </div>

            <div class="input-name">
                <i class="fa fa-lock lock"></i>
                    <input type="password" placeholder="Confirm Passward" id = "conpass" value="<?php echo $result['conpassword'] ?>" class="text-name" name="conpassword" >
            </div>
            <div class="form-check"  style="margin-left: 25px; margin-right : 30px; font-family: Arial, Helvetica, sans-serif; font-size : 14px; float: left">
                    <input class="form-check-input" type="checkbox" onclick="togglePasswordVisibility();" id="toggleButton" >
                    <label class="form-check-label" for="flexCheckChecked">
                      Show
                    </label>
                  </div>
            <div class="input-name1">
    <input type="radio" class="radio-button" name="gender" value="male" <?php if( $result['gender'] == "male"){echo "checked"; }?> required>
    <label style="margin-right: 30px;">Male</label>

    <input type="radio" class="radio-button" name="gender" value="female" <?php if($result['gender'] == "female"){echo "checked"; }?>required >
    <label>Female</label>
</div>


            <div class="input-name">
               <select class="country" name="Country">
                    <option> Select a country</option>
                    <option
                        <?php if( $result['country'] == "Pakistan"){echo "Selected";} ?>
                    > Pakistan</option>
                    <option
                    <?php if( $result['country'] == "India"){echo "Selected";} ?>
                    > India</option>
                    <option
                    <?php if( $result['country'] == "Japan"){echo "Selected";} ?>
                    > Japan</option>
                    <option
                    <?php if( $result['country'] == "Turkey"){echo "Selected";} ?>
                    > Turkey</option>
                    <option
                    <?php if( $result['country'] == "Iran"){echo "Selected";} ?>
                    >Iran</option>
               </select>
               <div class="arrow"></div>     
        </div>

        <div class="input-name">
            <input type="checkbox" id="cb" class="check-btn" required>
            <label for="cb" class="check">I Accept the terms and conditions</label>
    </div>

        <div class="input-name"> 
            <input type="submit" class="button" value= "Update Details" name="update" id="checkButton">

        </div>

        </form>
    </div>
 </div>   
</body>
</html>
<?php
    echo "<script type=\"text/javascript\">

    function togglePasswordVisibility() {
        var pass = document.getElementById('pass');
        var conpass = document.getElementById('conpass');
        if (pass.type === 'password' && conpass.type === 'password') {
          pass.type = 'text';
          conpass.type = 'text';
        } else {
          pass.type = 'password';
          conpass.type = 'password';
        }
       
      }

      function checkPasswordMatch(){
        var pass1 = pass.value;
        var conpass1 = conpass.value;
    if (pass1 === conpass1) {
        
      alert('ok');        
    } 
    
    else {
        var fnameInput = document.getElementById('conpass');
    fnameInput.setCustomValidity('Password Not Match.');
    }
  } 
  document.getElementById('toggleButton').addEventListener('click', togglePasswordVisibility);
  document.getElementById('checkButton').addEventListener('click', checkPasswordMatch);
    
  </script>";
?>

<?php
if($_POST['update']){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $gender = $_POST['gender'];
    $country = $_POST['Country'];


  $query = " UPDATE form_data set fname = '$fname',lname = '$lname', email='$email', PASSWORD = '$password', conpassword = '$conpassword'
  ,gender =' $gender',country='$country' where  ID = '$id'";

    $data = mysqli_query($connection,$query);

    if($data){

        echo "<script>alert('Record Updated') </script>";
        ?>
          <meta http-equiv="refresh" 
          content="0; url = http://localhost/crud/display.php" /> 
        <?php
    }
    else{
        echo "Failed";
    }

    }




?>