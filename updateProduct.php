<?php

require_once("MainController.php");
$controller = new Controller;
if(isset($_POST['update']))
{
	$updateStatus=$controller->displayProductForUpdate();
	$categoryResult=$controller->displayCategory();
}
if(isset($_POST['updateProduct']))
{
	$updateDoneStatus=$controller->updateProduct();	
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
	<input type="hidden" name="productid" value=<?php echo $updateData['product_id']; ?>>
	<input type="text" name="productname" value='<?php echo $updateData['product_name']; ?>' required>
	<br>
	<textarea name="productdescription" required><?php echo $updateData['product_description']; ?></textarea>
	<br>
	<input type="text" name="productprice" value='<?php echo $updateData['product_price']; ?>'>
	<br>
	<select name="category">
		<?php
			while($categoryData=mysqli_fetch_assoc($categoryResult))
			{
				if($categoryData['category_id']==$updateData['category_id'])
				{
					echo "<option value=".$categoryData['category_id']." selected>".$categoryData['category_name']."</option>";
				}
				else
				{
					echo  "<option value=".$categoryData['category_id'].">".$categoryData['category_name']."</option>";
				}
			}

		?>
	</select>
	<br>
	<input type="submit" name="updateProduct" value="update">	
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
		echo"<a href='displayProduct.php'>Go Back</a>";
	}
	else
	{
		echo "Error while Updating";
	}
}
?>
</body>
</html>