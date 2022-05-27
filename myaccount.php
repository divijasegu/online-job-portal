<?php
include("include\session.php");
if(!isset($_SESSION['username'])) { 
 header("location:login.php");
 }

 if(isset($_SESSION['username'])) { 
 require_once("include\config.php");
 }else{
 require_once("include\config.php");  
 }


$baseurl = "http://".$_SERVER['SERVER_NAME']."/";
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
        
      </table>
      <?php

				$sql = "SELECT * FROM registered_users where email ='".$_SESSION['username']."'";
       if($result = mysqli_query($con, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Username</th>";
                                        echo "<th>Firstname</th>";
                                        echo "<th>Lastname</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Gender</th>";
                                         echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['user_name'] . "</td>";
                                        echo "<td>" . $row['first_name'] . "</td>";
                                        echo "<td>" . $row['last_name'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                         echo "<td>";
                                            echo "<a href='updateuser.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                    ?>
                                    <?php if($row['addresume']!=''){ ?>
                                    <tr>
                                        <table class='table table-bordered table-striped' width="200px">
                                        <tr >
                                        <td >
                                            <a href="<?php echo $baseurl.''.$row['addresume']; ?>">
                                                <img width="60px" src="asset/image/doc.jpg"></a>
                                            </td>
                                       
                                        </tr>
                                        </table>
                                    </tr>
                                    <?php } ?>
                                     <?php if($row['addskill']!=''){ ?>
                                    <tr>
                                        <table class='table table-bordered table-striped' width="200px">
                                        <tr>
                                           <th >
                                           Skill are as follow as : 
                                            </th> 
                                        </tr>
                                        <tr >
                                        <td>
                                            <?php echo $row['addskill']; ?>
                                            </td> 
                                        </tr>
                                        </table>
                                    </tr>
                                    <?php } ?>
                                     <?php if($row['applyjob']!=''){ ?>
                                    <tr>
                                        <table class='table table-bordered table-striped' width="200px">
                                        <tr>
                                           <th >
                                           Apply jobs : 
                                            </th> 
                                        </tr>
                                        <tr >
                                        <td>
                                            <?php echo $row['applyjob']; ?>
                                            </td> 
                                        </tr>
                                        </table>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <table class='table table-bordered table-striped'>
                                        <tr>
                                        <td><a href="addresume.php?id=<?php echo $row['id']; ?>">Upload/Update Resume</a></td>
                                        <td><a href="addskill.php?id=<?php echo $row['id']; ?>" >Add/Update Skill</a></td>
                                        <td><a href="applyjob.php?id=<?php echo $row['id']; ?>" >Apply Jobs<a></td>
                                        </tr>
                                        </table>
                                    </tr>
                                    <?php
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                    }
 
                    // Close connection
                    mysqli_close($con);
			?>
    </div>
      <?php include("footer.php"); ?>
    </div>
  </body>
</html>