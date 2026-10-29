<?php
	require_once __DIR__ . '/app_security.php';
	app_start_session();
	if (empty($_SESSION['customer_id'])) {
		header("location:login.php");
		exit;
	}
	if (!isset($_GET['billno'])) {
		header("location:shop.php");
	} else {
		$id = filter_input(INPUT_GET, 'billno', FILTER_VALIDATE_INT);
		if (!$id || $id < 1) {
			http_response_code(404);
			exit('Invoice not found.');
		}
		require_once "connection.php";
		require "invoicr/invoicr.php";
		$invoice = new Invoicr();
		
		//$billno=$_SESSION['billno'];
		$billno = $id;
		
		$order_sql = "select PC.name, M.type, P.price, C.qty, P.price*C.qty as total from tblcustomerorder C inner join tblproduct P on C.productid=P.id inner join tblproductcategory PC on P.productcategoryid = PC.id inner join tblmeasurement M on P.measurementid= M.id inner join tblbill B on B.no=C.billno where C.billno=? and B.customerid=?";
		$order_statement = mysqli_prepare($con, $order_sql);
		$customerId = (int)$_SESSION['customer_id'];
		mysqli_stmt_bind_param($order_statement, 'ii', $billno, $customerId);
		mysqli_stmt_execute($order_statement);
		$order_query = mysqli_stmt_get_result($order_statement);
		$order_Data = array();
		//echo $order_sql;
		//echo mysqli_error($con);
		
		while ($order = mysqli_fetch_array($order_query)) {
			$subData = array();
			$subData[] = $order['name'];
			$subData[] = $order['type'];
			$subData[] = $order['qty'];
			$subData[] = "₹" . $order['price'] . ".00";
			$subData[] = "₹" . $order['total'] . ".00";
			$order_Data[] = $subData;
		}
		//print_r($order_Data);
		
		$bill_sql = "SELECT B.no as billno,B.customerid as cid,C.fname,C.lname,C.address,L.Name as landmark,C.contactno,B.date,B.total_amount FROM tblbill B INNER JOIN tblcustomer C on C.id=B.customerid INNER JOIN tbllandmark L on L.id=C.landmarkid WHERE B.no=? AND B.customerid=?";
		$bill_statement = mysqli_prepare($con, $bill_sql);
		mysqli_stmt_bind_param($bill_statement, 'ii', $billno, $customerId);
		mysqli_stmt_execute($bill_statement);
		$bill_query = mysqli_stmt_get_result($bill_statement);
		$bill_Data = array();
		//echo $bill_sql;
		//echo mysqli_error($con);
		
		while ($bill = mysqli_fetch_array($bill_query)) {
			$sub = array();
			$sub['billno'] = $bill['billno'];
			$sub['cid'] = $bill['cid'];
			$sub['fname'] = $bill['fname'];
			$sub['lname'] = $bill['lname'];
			$sub['address'] = $bill['address'];
			$sub['landmark'] = $bill['landmark'];
			$sub['contactno'] = $bill['contactno'];
			$sub['date'] = $bill['date'];
			$sub['total_amount'] = $bill['total_amount'];
			$bill_Data[] = $sub;
		}
		mysqli_stmt_close($bill_statement);
		mysqli_stmt_close($order_statement);
		if (count($bill_Data) === 0) {
			http_response_code(404);
			exit('Invoice not found.');
		}
		//print_r($bill_Data);
		
		//
		//Invoice Data
		//
		
		$invoice->set("company", [
			"image/logo.png",
			"DUDHWALA>COM",
			"7,Shaktinath Soc. , Near Kumarsala, Zadeshwar, Bharuch - 392011 ",
			"Phone: +91 9924209820", "Whatsapp: +91 9909410487",
			"Email: info@dudhwala.com"
		]);
		foreach ($bill_Data as $value) {
			// 2B - INVOICE INFO
			$invoice->set("invoice", [
				["Invoice #", $value['billno']],
				["DOP", $value['date']]
			]);

// 2C - BILL TO
			$invoice->set("billto", [
				$value['fname'] . " " . $value['lname'],
				$value['address'],
				$value['landmark'],
				$value['contactno']
			]);

// 2D - SHIP TO
			$invoice->set("shipto", [
				$value['fname'] . " " . $value['lname'],
				$value['address'],
				$value['landmark'],
				$value['contactno']
			]);
			
			// 2F - TOTALS
			$invoice->set("totals", [
				["SUB-TOTAL", "₹" . $value['total_amount'] . ".00"],
				["SHIPPING CHARGE", "₹0.00"],
				["GRAND TOTAL", "₹" . $value['total_amount'] . ".00"]
			]);
		}
		foreach ($order_Data as $i) {
			$invoice->add("items", $i);
		}
		
		$invoice->set("notes", [
			"Thank you! for Purchase our Product."
		]);
		
		/* [STEP 3 - OUTPUT] */
		// 3A - CHOOSE TEMPLATE, DEFAULTS TO SIMPLE IF NOT SPECIFIED
		$invoice->template("apple");
		$invoice->outputPDF(3, "download" . "/" . "invoice$billno.pdf");
		$invoice->outputPDF(2, "invoice$billno.pdf");
		$invoice->outputPDF(1);
		
		$invoice->outputHTML(1);
		
		//$invoice->outputPDF();
		
	}
	?>