<?php 
   if(isset($_SESSION['username'])) { 
 include("include\config.php");
 }else{
 require_once("include\config.php");  
 }
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
     
     if (isset($_POST['firstname']) && isset($_POST['lastname'])
     && isset($_POST['email']) && isset($_POST['psw'])
     && isset($_POST['confirmpsw']) && isset($_POST['gender']))
      {
          $firstname = $_POST['firstname'];
          $lastname = $_POST['lastname'];
          $email = $_POST['email'];
          $password = $_POST['psw'];
          $confirmpsw = $_POST['confirmpsw'];
          $gender = $_POST['gender'];
          
          if (strcmp($password, $confirmpsw) == 0)
          {
            $sql_Firstname = mysqli_real_escape_string($con,$firstname);
            $sql_Lastname = mysqli_real_escape_string($con,$lastname);
            $sql_Email = mysqli_real_escape_string($con,$email);
            $sql_password = mysqli_real_escape_string($con,$password); 
            $sql_Username = $sql_Firstname." ".$lastname;
            $sql_Gender = $gender;
            
           
            $sql = "SELECT email FROM registered_users WHERE email = '$sql_Email'";
            $result = mysqli_query($con,$sql);

            $count = mysqli_num_rows($result);
             if($count == 0) {
                
             $sqlinsert = "INSERT INTO registered_users (user_name, first_name, last_name, email , password, gender)
VALUES ('$sql_Username','$sql_Firstname', '$sql_Lastname', '$sql_Email', '$sql_password','$sql_Gender')";
                
                if (mysqli_query($con, $sqlinsert)) {
                  echo "New record created successfully";
                  $_SESSION['username'] = $sql_Email;

                 header("location: myaccount.php");
                } else {
                  $error = "Error: " . $sqlinsert . "<br>" . mysqli_error($con);
                } 
                 
              }else {
                 $error = "Email already used";
              }


          }else{
            $error = "Password does not match";
          }
      }

     
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>OnlineJobPosrtal - Sign Up</title>
<link rel="stylesheet" href="asset\css\style.css">
<link rel="stylesheet" href="asset\css\homestyle.css">
</head>
  <body>
    <div class="hompagecontainer">
      <?php include("header.php"); ?>
      <div style="display:inline-block;width:100%;padding:5%">
      <div style="display:inline-block;width:40%;text-align:center;">
            <img width ="300px" src="asset\image\avtarimage.jpg" alt="Avatar" class="avatar"><h4>Please fill the form to Login account</h4> 
         </div> 
      <div style="display:inline-block;width:50%;">
      <form action=""  method="post" style="border:1px solid #ccc">

        <div class="container">
          <?php if(isset($error)){ ?>
          <div style = "font-size:16px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
          <?php } ?>
          <h1>Sign Up</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>
          <label for="firstname"><b>First Name</b></label>
          <input type="text" placeholder="Enter First Name" autocomplete="off" name="firstname" required>

          <label for="lastname"><b>Last Name</b></label>
          <input type="text" placeholder="Enter Last Name" autocomplete="off" name="lastname" required>

          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" autocomplete="off" name="email" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>

          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="confirmpsw" required>
          
          <label for="psw-repeat"><b>Gender</b></label>
          <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
          
          
          <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

          <div class="clearfix">
            <button type="submit" class="signupbtn">Sign Up</button>
          </div>
        </div>
      </form>
    </div>
     </div>
      <?php include("footer.php"); ?>
    </div>
  </body>
</html>
