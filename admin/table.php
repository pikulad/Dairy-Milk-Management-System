<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</head>
<body>
<div class="col-md-12">
    <table id="example" class="table table-striped" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Contact No</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Contact No</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        </tfoot>
    </table>

    <!--create modal dialog for display detail info for edit on button cell click-->
</div>


<script>
    $(document).ready(function(){
        var dataTable=$('#example').DataTable({
            "processing": true,
            "serverSide":true,
            "ajax":{
                url:"data/dtstaff.php",
                type:"post"
            }
        });
    });
</script>
<!--script js for get edit data-->
<!--<script>
	$(document).on('click','#getEdit',function(e){
		e.preventDefault();
		var per_id=$(this).data('id');
		//alert(per_id);
		$('#content-data').html('');
		$.ajax({
			url:'editdata.php',
			type:'POST',
			data:'id='+per_id,
			dataType:'html'
		}).done(function(data){
			$('#content-data').html('');
			$('#content-data').html(data);
		}).fial(function(){
			$('#content-data').html('<p>Error</p>');
		});
	});
</script>-->
</body>
</html>