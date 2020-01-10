<?php

require_once("MainController.php");
if(isset($_POST['submit']))
{
	$controller = new Controller;
	$status=$controller->insertCategory();
}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action=<?php echo  $_SERVER['PHP_SELF'];?>>
		<table border="0">
			<tr>
				<td>Enter Category Name :</td>
				<td><input type="text" name="categoryname" required></td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
						<input type="submit" name="submit" value="Insert">
					</center>
				</td>
			</tr>
		</table>
	</form>	
	<?php
		if(isset($status))
		{
			if($status==1)
			{
				echo"Inserted Successfully";
			}
			else
			{
				echo "Error while inserting the data";
			}
		}

	?>
</body>
</html>