<?php

	Class Controller
	{
		private $hostname="localhost";
		private $username="root";
		private $password="";
		private $databseName="internship";
		private $con="";

		function __construct()
		{
			$this->con=$this->connectionToDb();
			if(empty($this->con))
			{
				die("Could not connect. Try later after some time");
			}
		}
		function connectionToDb()
		{
			return @mysqli_connect($this->hostname,$this->username,$this->password,$this->databseName);
		}
		function insertCategory()
		{
			$query="insert into category_master(category_name) values('".$_POST['categoryname']."')";
			return mysqli_query($this->con,$query);
		}	
		function displayCategory()
		{
			$q="Select * from category_master";
			return mysqli_query($this->con,$q);
		}
		function deleteCategory()
		{
			$q="delete from category_master where category_id=".$_POST['catgoryid'];
			return mysqli_query($this->con,$q);	
		}
		function displayCategoryForUpdate()
		{
			 $q="Select * from category_master where category_id=".$_POST['catgoryid'];
			return mysqli_query($this->con,$q);
		}
		function updateCategory()
		{
			 $q="update category_master set category_name='".$_POST['catgoryname']."' where category_id=".$_POST['catgoryid'];
			return mysqli_query($this->con,$q);	
		}
		function insertProduct()
		{
			$query="insert into product_master(product_name,product_price,product_description,category_id) values('".$_POST['productname']."',".$_POST['productprice'].",'".$_POST['productdescription']."',".$_POST['category'].")";
			return mysqli_query($this->con,$query);	
		}
		function displayProduct()
		{
			$q="Select * from product_master pm,category_master cm where cm.category_id=pm.category_id";
			return mysqli_query($this->con,$q);
		}
		function deleteProduct()
		{
			$q="delete from product_master where product_id=".$_POST['productid'];
			return mysqli_query($this->con,$q);	
		}
		function displayProductForUpdate()
		{
			$q="Select * from product_master pm,category_master cm where pm.product_id =".$_POST['productid']." and cm.category_id=pm.category_id";
			return mysqli_query($this->con,$q);	
		}
		function updateProduct()
		{
			$q="update product_master set product_name='".$_POST['productname']."', product_description='".$_POST['productdescription']."', product_price=".$_POST['productprice'].", category_id=".$_POST['category']." where product_id=".$_POST['productid'];
			return mysqli_query($this->con,$q);
		}
	}

	
?>