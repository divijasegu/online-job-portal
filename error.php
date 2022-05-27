<?php
// Include config file
if(isset($_SESSION['username'])) { 
 include("include\config.php");
 }else{
 require_once("include\config.php");    
 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OnlineJobPosrtal - Error</title>
    <link rel="stylesheet" href="asset\css\style.css">
    <link rel="stylesheet" href="asset\css\homestyle.css">
</head>
<body>
    <div class="hompagecontainer">
    <?php include("header.php"); ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Invalid Request</h1>
                    </div>
                    <div class="alert alert-danger fade in">
                        <p>Sorry, you've made an invalid request. Please <a href="index.php" class="alert-link">go back</a> and try again.</p>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>