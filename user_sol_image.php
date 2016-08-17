<?php
	session_start();
	if(isset($_POST["user"]) && isset($_FILES["sol_yui_desc_image"]["tmp_name"])){
		if($_SESSION["db_name"] == $_POST["user"]){
			$name = $_FILES["sol_yui_desc_image"]["name"];
			$tmp_loc = $_FILES["sol_yui_desc_image"]["tmp_name"];
			$file_size = $_FILES["sol_yui_desc_image"]["size"];
			$type = $_FILES["sol_yui_desc_image"]["type"];
			$user_database_name = $_SESSION["db_name"];
			if($file_size < 524288){
				if($type = 'image/jpeg' || $type = 'imge/png' || $type = 'image/gif' || $type = 'image/bmp'){
					$date = date("ymdhisA");
					$ext = explode(".",$name);
					$count = count($ext);
					$extension = $ext[$count - 1];
					if(move_uploaded_file($tmp_loc,$user_database_name.'/queol/'.$date.".".$extension)){
						echo "Success:".$user_database_name.'/queol/'.$date.".".$extension;
					}else{
						echo $_FILES["sol_yui_desc_image"]["error"];
					}
				}else{
					echo "Error: Nice but <br>Image Format File Should Be Uploaded";
				}
			}else{
				echo "ERROR:Nice but <br>File Size Should Less Than 500kB";
			}
			
		}else{
			echo "ERROR:Authentication Failure";
		}
	}else{
		echo "ERROR: Missing Data";
	}
?>
