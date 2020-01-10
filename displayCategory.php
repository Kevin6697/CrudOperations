<?php

require_once("MainController.php");
$controller = new Controller;
$categoryResult=$controller->displayCategory();
if(isset($_POST['delete']))
{
	$deleteStatus=$controller->deleteCategory();
}

else
{
if(mysqli_num_rows($categoryResult)<=0)
{
	echo "No Category Found";
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type =  "text/javascript" language = "javascript">
		function confirmation()
		{
			var confirmValue=confirm("do u want to delete ?");
			if(confirmValue  == true)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	</script>	
</head>
<body>
		<table border="1" cellpadding="5">
			<th>Category Id</th>
			<th>Category Name</th>
			<th colspan="2">Category Operations</th>
		<?php
			while($categoryData=mysqli_fetch_assoc($categoryResult))
			{
				echo"<tr>";
					echo "<td>";
						echo $categoryData['category_id'];	
					echo"</td>";
					echo "<td>";
						echo $categoryData['category_name'];	
					echo"</td>";
					echo "<td>";
					?>
					<form method=post action=<?php  echo "updateCategory.php";?>>
						<input type="hidden" name="catgoryid" value=<?php echo $categoryData['category_id']; ?>>
						<input type="submit" name="update" value="update">
					</form>	
				<?php	
					echo"</td>";
					echo "<td>";
					?>
					<form method=post action=<?php  echo $_SERVER['PHP_SELF'];?>>
						<input type="hidden" name="catgoryid" value=<?php echo $categoryData['category_id']; ?>>
						<input type="submit" name="delete" value="delete" onclick=" return confirmation()">
					</form>	
				<?php	
					echo"</td>";		
				echo "</tr>";
			}
		?>
		</table>
		<?php
			if(isset($deleteStatus))
			{
				if($deleteStatus==1)
				{
					echo"Deleted Successfully";
					// header("Location:displayCategory.php");
				}
				else
				{
					echo "Error While deleting th record";
				}
			}	
			
	?>		
</body>
</html>	
<?php
}	
 }
	
?>