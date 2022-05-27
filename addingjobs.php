<?php 
// Include config file
 include("include\session.php");
 require_once "include\config.php";
 $_SESSION['firstname'] = "Techone";
if(isset($_POST['notification'])){
	
	$uploadtime = date("Y-m-d H:i:s");
	$arr = array($_POST['applyjobs']);
	$applyjobs = implode(', ', $arr);

$id = $_POST['id'];
if(!empty($applyjobs))	{	
				
$sql = "UPDATE registered_users SET applyjob=? WHERE id=?";
       $stmt = mysqli_prepare($con, $sql);
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_applyjobs,$param_id);
            
            // Set parameters
            $param_applyjobs = $applyjobs;
            $param_id = $id;
              
$test =	mysqli_stmt_execute($stmt);
if($test = TRUE){ ?>
						<script>
						if(confirm("Data updated Sucessfully!!!"))
						{	document.location = 'myaccount.php';
						}
						else
						{
							document.location = 'myaccount.php';
						}
						</script>
				<?php
		}
					
 	}	
 }											
 ?>