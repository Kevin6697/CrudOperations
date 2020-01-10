<?php

require_once("MainController.php");
$controller = new Controller;
if(isset($_POST['update']))
{
	$updateStatus=$controller->displayCategoryForUpdate();
}
if(isset($_POST['updateCategory']))
{
	$updateDoneStatus=$controller->updateCategory();	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

if(isset($updateStatus))
{
if(mysqli_num_rows($updateStatus)<=0)
{
	echo"No Data Found";
}
else
{
	while($updateData=mysqli_fetch_assoc($updateStatus))
	{
?>	
<form method=post action=<?php  echo $_SERVER['PHP_SELF'];?>>
	<input type="hidden" name="catgoryid" value=<?php echo $updateData['category_id']; ?>>
	<input type="text" name="catgoryname" value='<?php echo $updateData['category_name']; ?>'>
	<br>
	<input type="submit" name="updateCategory" value="update">	
<?php		
	}
?>		
<?php					
}	
}
if(isset($updateDoneStatus))
{
	if($updateDoneStatus)
	{
		echo "Updated Successfully";
		echo"<a href='displayCategory.php'>Go Back</a>";
	}
	else
	{
		echo "Error while Updating";
	}
}
?>
</body>
</html>