<?php

if(isset($_SESSION['username'])) { 
 include("include\config.php");
 }else{
 require_once("include\config.php");  
 }

include("include\session.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>OnlineJobPosrtal - My Account</title>
<link rel="stylesheet" href="asset\css\style.css">
<link rel="stylesheet" href="asset\css\homestyle.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</head>
  <body>
    <div class="hompagecontainer" height="400px">
      <?php include("header.php"); ?>
      <?php //echo  $_SESSION['username']; ?>
      
      <div style="padding:5%;">
        
      <div style="background-color:rgba(100,200,255,0.5);padding:5px;" align="center">
		    <form action="addingskill.php" method="post" enctype="multipart/form-data">
		        <h2>Add Skill | <a href="myaccount.php" >Veiw</a> </h2><br><br>
		        <table>                             		        
		        <tr><td height="70" width="100">Skill (Eg : PHP,Magento,Laravel,.Net etc)</td>
		        	<td colspan="2"><input type="text" class="cck" autocomplete="off" name="skill" id="skill" >
		        		<input type="hidden" class="cck" name="id" id="id" value="<?php echo $_GET['id']; ?>">

		        	<br><br></td></tr>
		        <tr><td colspan="2"><input class="cck" type="submit" name="notification" value="Add Skill"/></td></tr>
		        </table>
		</form>
		</div>
    </div>
      <?php include("footer.php"); ?>
    </div>
  </body>
</html>