<?php
	require_once "connection.php";
	
	$output="";
	if(isset($_POST['product_id'])){
		$sql="select * from tblproduct where id='".$_POST["product_id"]."'";
	}
	else{
		echo "Product not available";
		$sql="";
	}
	$result=mysqli_query($con,$sql);
	while ($row=mysqli_fetch_array($result)){
		$output .='<div>'.$row['price'].'></div>';
		echo "<script>alert('hello');</script>";
	}
	echo $output;
?>