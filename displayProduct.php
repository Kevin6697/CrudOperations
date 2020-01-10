<?php

require_once("MainController.php");
$controller = new Controller;
$productResult=$controller->displayProduct();
if(isset($_POST['delete']))
{
	$deleteStatus=$controller->deleteProduct();
}

else
{
if(mysqli_num_rows($productResult)<=0)
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
			<th>Product Id</th>
			<th>Product Name</th>
			<th>Product Description</th>
			<th>Product Price</th>
			<th>Category Name</th>
			<th colspan="2">Product Operations</th>
		<?php
			while($productData=mysqli_fetch_assoc($productResult))
			{
				echo"<tr>";
					echo "<td>";
						echo $productData['product_id'];	
					echo"</td>";
					echo "<td>";
						echo $productData['product_name'];	
					echo"</td>";
					echo "<td>";
						echo $productData['product_description'];	
					echo"</td>";
					echo "<td>";
						echo $productData['product_price'];	
					echo"</td>";
					echo "<td>";
						echo $productData['category_name'];	
					echo"</td>";
					echo "<td>";
					?>
					<form method=post action=<?php  echo "updateProduct.php";?>>
						<input type="hidden" name="productid" value=<?php echo $productData['product_id']; ?>>
						<input type="submit" name="update" value="update">
					</form>	
				<?php	
					echo"</td>";
					echo "<td>";
					?>
					<form method=post action=<?php  echo $_SERVER['PHP_SELF'];?>>
						<input type="hidden" name="productid" value=<?php echo $productData['product_id']; ?>>
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