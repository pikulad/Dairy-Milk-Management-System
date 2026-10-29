<?php
	require_once "connection.php";
	
	$productId = isset($_POST['product_id']) ? filter_var($_POST['product_id'], FILTER_VALIDATE_INT) : false;
	if (!$productId || $productId < 1) {
		http_response_code(400);
		echo 'Product not available';
		exit;
	}

	$statement = mysqli_prepare($con, "SELECT price FROM tblproduct WHERE id = ? AND status = 1");
	mysqli_stmt_bind_param($statement, 'i', $productId);
	mysqli_stmt_execute($statement);
	$result = mysqli_stmt_get_result($statement);
	$product = mysqli_fetch_assoc($result);
	mysqli_stmt_close($statement);
	if (!$product) {
		http_response_code(404);
		echo 'Product not available';
		exit;
	}
	echo '<div>' . htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8') . '</div>';
?>