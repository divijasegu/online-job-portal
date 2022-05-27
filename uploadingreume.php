<?php 
// Include config file
 include("include\session.php");
 require_once "include\config.php";
 $_SESSION['firstname'] = "Techone";
if(isset($_POST['notification'])){
	
	$uploadtime = date("Y-m-d H:i:s");
	$cname = $_FILES['sfile']['name'];
}
$id = $_POST['id'];
if(!empty($cname))	{	
				$tname = $_FILES['sfile']['tmp_name'];
				$tname = $_FILES['sfile']['tmp_name'];
				$size	= $_FILES['sfile']['size'];
				$name = $_SESSION['firstname'].date("his");
				$fext = pathinfo($cname, PATHINFO_EXTENSION);
				$fire = pathinfo($name,PATHINFO_FILENAME);
				$savename = $fire.".".$fext;
				$finalfile = "asset/doc/$savename";
														}
		if(!empty($cname)){
	 if($size < 500000){
				$check = move_uploaded_file($tname,$finalfile);
				if($check){
$sql = "UPDATE registered_users SET addresume=? WHERE id=?";
       $stmt = mysqli_prepare($con, $sql);
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_addresume,$param_id);
            
            // Set parameters
            $param_addresume = $finalfile;
            $param_id = $id;
            

            
           
$test =	mysqli_stmt_execute($stmt);
if($test = TRUE){ ?>
						<script>
						if(confirm("File Uploaded Sucessfully!!!"))
						{	document.location = 'myaccount.php';
						}
						else
						{
							document.location = 'myaccount.php';
						}
						</script>
				<?php
											}
					else {?>
					<script>
					if(confirm("file is not uploaded"))
			
				{	document.location = 'myaccount.php';
				}
				else
				{
					document.location = 'myaccount.php';
				}
				</script>
				<?php
													//echo "file is not uploaded";
				}
			}
	 }
	 else{
		 echo "file size is too large";	
	 }
 }else
 {	
	echo "Please select an file to upload";
 }												
 ?>