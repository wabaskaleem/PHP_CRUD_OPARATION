<?php include("connection.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Reposive Form by Using htm</title>
</head>
<body>
 <div class="container">
    <h2>Registrion Form</h2>
    <div class="Form-container">
        <form action="" method="POST">

            <div class="input-name">
                <i class="fa fa-user user"></i>
                    <input type="text" placeholder="First Name" class="name" name="fname" required>
                <span>
                    <i class="fa fa-user" ></i>
                        <input type="text" placeholder="Last Name" class="name" name="lname" required>         
                </span>
            </div>

            <div class="input-name">
                <i class="fa fa-envelope email"></i>
                    <input type="email" placeholder="Email" class="text-name" name="email" required>
            </div>

            <div class="input-name">
                <i class="fa fa-lock lock"></i>
                    <input type="password" placeholder="Passward" class="text-name" name="password" id="pass" required>
                     
            </div>

            <div class="input-name">
                <i class="fa fa-lock lock"></i>
                    <input type="password" placeholder="Confirm Passward" class="text-name" name="conpassword" id="conpass"  required>
                </div>
                <div class="form-check"  style="margin-left: 25px; margin-right : 30px; font-family: Arial, Helvetica, sans-serif; font-size : 14px; float: left">
                    <input class="form-check-input" type="checkbox" onclick="myFunction();">
                    <label class="form-check-label" for="flexCheckChecked">
                      Show
                    </label>
                  </div>
            <div class="input-name1">
                    <input type="radio" class="radio-button" name="gender" value="male" required>
                    <label style="margin-right: 30px;">Male</label>

                    <input type="radio" class="radio-button" name="gender" value="female" required>
                    <label>Female</label>
 
            </div>


            <div class="input-name">
               <select class="country" name="Country" required>
                    <option> Select a country</option>
                    <option> Pakistan</option>
                    <option> India</option>
                    <option> Japan</option>
                    <option> Turkey</option>
                    <option>Iran</option>
               </select>
               <div class="arrow"></div>     
        </div>

        <div class="input-name">
            <input type="checkbox" id="cb" class="check-btn" required>
            <label for="cb" class="check">I Accept the terms and conditions</label>
    </div>

        <div class="input-name"> 
            <input type="submit" class="button" value= "submit" name="register" onclick= myname();>

        </div>
        </form>
    </div>
 </div>   
</body>
</html>



<?php
    echo "<script type=\"text/javascript\">

    function myFunction() {
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

      function myname(){
        var pass1 = document.getElementById('pass').value;
        var conpass1 = document.getElementById('conpass').value;
    if (pass1 === conpass1) {
        
      alert('ok');

        
    } 
    
    else {
        var fnameInput = document.getElementById('conpass');
    fnameInput.setCustomValidity('Password Not Match.');

    }
  } 

    
  </script>";
?>

<?php


if($_POST['register']){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $gender = $_POST['gender'];
    $country = $_POST['Country'];


    
    if($fname != "" && $lname != "" && $email != "" && $password != ""  && $conpassword != ""  && $gender != ""   && $country != ""){
 


  $query = "INSERT INTO form_data(fname,lname,email,PASSWORD,conpassword,gender,country) values('$fname','$lname','$email','$password','$conpassword','$gender','$country')";

    $data = mysqli_query($connection,$query);
   
    if($data){

        echo "<script> alert('Data Insert Into DataBase') </script>";
        
    }
    else{
        echo "Failed";
    }

    }else{
        echo "<script> alert('Fill The Form') </script>";
    }
}



?>