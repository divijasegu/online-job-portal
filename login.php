<?php 
 if(isset($_SESSION['username'])) { 
 include("include\config.php");
 }else{
 require_once("include\config.php");  
 }
  session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
     $username = '';
     $password = '';
     $email = mysqli_real_escape_string($con,$_POST['email']);
     $password = mysqli_real_escape_string($con,$_POST['psw']);

     $sql = "SELECT * FROM registered_users WHERE email = '$email' and password = '$password'";
   	 $result = mysqli_query($con,$sql);
   	 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     
   	 //$active = $row['active'];
     $error = '';
     $count = mysqli_num_rows($result);
     if($count == 1) {
         $_SESSION['username'] = $row['email'];
         //echo  $_SESSION['username'];exit;
         header("location: myaccount.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }

     
   
   }
?>
<!DOCTYPE html>
<html>
<head>
<title>OnlineJobPosrtal - Sign In</title>
<link rel="stylesheet" href="asset\css\login.css">
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
      <form action="" method="post">
            <div class="container">
               <h1>Sign In</h1>
      <p>Please fill in this form to login an account.</p>
              <label for="uname"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" autocomplete="off" name="email" required>

              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" autocomplete="off" name="psw" required>

              <button type="submit">Login</button>
              <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
              </label>
            </div>
        </form>
        <?php if(isset($error)){ ?>
        <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        <?php } ?>
      </div>
    </div>
  
    <?php include("footer.php"); ?>
    </div>
	</body>
</html>