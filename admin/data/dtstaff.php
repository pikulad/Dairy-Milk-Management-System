<?php
$connection=mysqli_connect('localhost','root','mysql','dudhwala')
or die("connection failed".mysqli_errno());
	$request=$_REQUEST;
	$col =array(
		0   =>  'fname',
		1   =>  'lname',
		2   =>  'address',
		3   =>  'gender',
		4   =>  'contactno',
		5   =>  'email',
		6	=>	'role'
	);  //create column like table in database
	
	$sql ="SELECT fname,lname,address,gender,contactno,email,role FROM `tblstaff`";
	$query=mysqli_query($connection,$sql);
	
	$totalData=mysqli_num_rows($query);
	
	$totalFilter=$totalData;
	
	//Search
	
	if(!empty($request['search']['value'])){
		$sql ="SELECT fname,lname,address,gender,contactno,email,role FROM tblstaff WHERE 1=1";
		$sql.=" AND (fname Like '".$request['search']['value']."%' ";
		$sql.=" OR lname Like '".$request['search']['value']."%' ";
		$sql.=" OR contactno Like '".$request['search']['value']."%' ";
		$sql.=" OR email Like '".$request['search']['value']."%' )";
	}
	$query=mysqli_query($connection,$sql);
	$totalData=mysqli_num_rows($query);
	
	//Order
	
	$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']." LIMIT ". $request['start'].",".$request['length']."  ";
	
	$query=mysqli_query($connection,$sql);
	
	$data=array();
	echo mysqli_error($connection);
	while($row=mysqli_fetch_array($query)){
		$subdata=array();
		$subdata[]=$row[0]; //id
		$subdata[]=$row[1]; //name
		$subdata[]=$row[2]; //salary
		$subdata[]=$row[3];//age           //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table on database
		$subdata[]=$row[4];                      //<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Edit</button><button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash">&nbsp;</i>Delete</button>
		$subdata[]=$row[5];
		if($row[6]==0){
			$subdata[]="Admin";
		}
		elseif ($row[6]==1){
			$subdata[]="Employee";
		}
		$data[]=$subdata;
	}
	
	$json_data=array(
		"draw"              =>  intval($request['draw']),
		"recordsTotal"      =>  intval($totalData),
		"recordsFiltered"   =>  intval($totalFilter),
		"data"              =>  $data
	);
	
	echo json_encode($json_data);

?>

