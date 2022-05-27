<?php 
 //   if(isset($_SESSION['username'])) { 
 // include("include\config.php");
 // }else{
 // require_once("include\config.php");  
 // }
 require_once("include\session.php");        
?>
<!DOCTYPE html>
<html>
<head>
<title>OnlineJobPosrtal</title>
<link rel="stylesheet" href="asset\css\style.css">
<link rel="stylesheet" href="asset\css\homestyle.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</head>
  <body>
    <div class="hompagecontainer">
      <?php include("header.php"); ?>
      <?php

         // Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once("include\config.php");
    
    // Prepare a select statement
    $sql = "SELECT * FROM cmspages WHERE id = ?";
    
    if($stmt = mysqli_prepare($con, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                
                 echo "<div style='padding:5%;height:400px;'>".$description = $row["description"]."</div>";
                 
                 
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($con);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
      ?>
      <?php include("footer.php"); ?>
    </div>
  </body>
</html>
