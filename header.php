<?php

// if(isset($_SESSION['username'])) { 
//  include("include\config.php");
//  }else{
//  require_once("include\config.php");	
//  }

require_once("include\config.php");
//require_once("include\session.php");	
?>
<div class="topContainer">
	<div class="leftDiv"><a  href="index.php"><img widht="100px" src="asset\image\logo2.jpg"></a>
    </a>
	</div>
	<div class="rightDiv">
		<marquee behavior="scroll" style="color:red;" direction="left"><b>Find A Job at India's No.1 Job Site , Best Places to Work , Search Jobs on the Go !! ,
			Get best matched jobs directly in your mail. Tell us what kind of a job you are looking out for and stay updated with latest opportunities.
		</b></marquee>
		<ul class="topnav">
			<li><a class="active" href="index.php">Home</a></li>
			<!-- <li><a href="#">About Us</a></li>
			<li><a href="#" >Jobs</a></li>
			<li><a href="#" >Career</a></li> -->
			<?php

			   $sql = "SELECT * FROM cmspages";
			   $result = mysqli_query($con,$sql);
			    $num = mysqli_num_rows($result);
			    if($num > 0){
			    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			    	?>
			    	<li><a href="page.php?id=<?php echo $row['id']; ?>" ><?php echo $row['title']; ?></a></li>
			    	<?php 
			    	}
			    }
			?>
			<?php if(isset($_SESSION['username'])) { ?>
			<li class="right"><a href="myaccount.php">My Account</a></li>
			<li class="right"><a href="logout.php">Logout</a></li>
			<?php }else{ ?>
			<li class="right"><a href="login.php">Login</a></li>
			<li class="right"><a href="register.php">Register</a></li>
			<?php } ?>
		</ul>
	</div>
</div>