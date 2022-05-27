<?php 
// Include config file
 include("include\session.php");
 require_once "include\config.php";
 $_SESSION['firstname'] = "Techone";
if(isset($_POST['notification'])){
	
	$uploadtime = date("Y-m-d H:i:s");
	$addskill = $_POST['skill'];

$id = $_POST['id'];
if(!empty($addskill))	{	
				
$sql = "UPDATE registered_users SET addskill=? WHERE id=?";
       $stmt = mysqli_prepare($con, $sql);
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_addskill,$param_id);
            
            // Set parameters
            $param_addskill = $addskill;
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