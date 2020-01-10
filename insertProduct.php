<?php
require_once("MainController.php");
$controller = new Controller;
$categoryResult=$controller->displayCategory();

if(isset($_POST['insert']))
{	
	$status=$controller->insertProduct();	
}


if(mysqli_num_rows($categoryResult)<=0)
{
	die("No Category Found.First Enter Categories");
}
else
{
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<table border="0">
			<tr>
				<td>Enter Product Name :</td>
				<td><input type="text" name="productname" required></td>
			</tr>
			<tr>
				<td>Enter Product Price :</td>
				<td><input type="text" name="productprice" required></td>
			</tr>
			<tr>
				<td>Enter Product Description :</td>
				<td><textarea rows="2"name="productdescription" cols="21" required></textarea></td>
			</tr>
			<tr>
				<?php
				
				?>
				<td>Select Category :</td>
				<td>	
					<select name="category">
					<?php
						while ($data=mysqli_fetch_assoc($categoryResult)) {
							echo "<option value=".$data['category_id'].">".$data['category_name']."</option>";
						}
					  }
					?>	
					</select>					
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<center><input type="submit" name="insert" value="Insert"></center>
				</td>
			</tr>									
		</table>
	</form>
	<?php
		if(isset($status))
		{
			if($status==1)
			{
				echo"Inserted Succesfully";
			}
			else
			{
				echo"Error while inserting";
			}
		}

	?>
</body>
</html>