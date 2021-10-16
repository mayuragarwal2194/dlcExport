<!DOCTYPE html>
<?php include_once('functions.php'); ?>
<?php include_once('new_conn.php'); ?>
<?php
	// DELETE QUERY
	if (!empty($_GET['sid'] )) {
		$id = $_GET['sid'];
		$del = "DELETE FROM add_state WHERE state_id='$id'";
		$exeDel= $con->query($del);
	}
?>
<!-- MULTIPLE DELETE QUERY -->
<?php
	$stateid=$_POST['del'];

	if (count($_POST['del'])>0) {
		foreach ($stateid as $sids) {
			$muldel="DELETE FROM add_state WHERE state_id='$sids'";
			$exeMultiDel= $con->query($del);
		}
	}	
?>
<html>
<head>
	<meta charset="utf-8">
	<title>STATE</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
			<h2 class="text-center text-uppercase mt-5 mb-5">View State</h2>
	</header>
	<div class="container-fluid mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<form method="post">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
					        <thead>
					            <tr>
					            	<th>
					            		<button type="submit" class="btn" name="mul-del">
											<i class="fa fa-trash"></i>
										</button>
					            	</th>
					                <th>Sr No.</th>
					                <th>Name</th>
					                <th>Country</th>
					                <th>Status</th>
					                <th>Action</th>
					            </tr>
					        </thead>
	        				<tbody></tbody>
					        <tfoot>
					            <tr>
					            	<th>
					            		<button type="submit" class="btn" name="mul-del">
											<i class="fa fa-trash"></i>
										</button>
					            	</th>
					                <th>Sr No.</th>
					                <th>Name</th>
					                <th>Country</th>
					                <th>Status</th>
					                <th>Action</th>
					            </tr>
					        </tfoot>
	   					</table>
   					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php include_once('script_tag.php'); ?>
<script>
	$(document).ready(function() {
	// DATATABLE'S MAIN DESIGNE  
    var table = $('#example').DataTable( {
    	// DOM SET KARNA
         "dom": "<'float-left'l><'float-right ml-3'B><'float-right mt-1'f>rt<'float-left'i><'float-right'p>",
        // AJAX ENABLE
		 "processing": true,
		 "serverSide": true,
		 "ajax":{
		 	"url": "state_ajax.php",
		 	"type": "POST",
		 },
        // WHICH BUTTONS DO WE WANTS 
         buttons: [ 'copy', 'excel', 'pdf' ],
         // NAME GIVEN TO COLOUMN FOR USE IN ORDER FILTERING AND SEARCH OPPTION 
        "columns": [
        		{ "name":"", "searchable": false , "sortable": false },
				{ "name":"state_id", "searchable": true },
				{ "name":"state_name", "searchable": true },
				{ "name":"c_id", "searchable": true },
				{ "name":"state_status", "searchable": true },
				{ "name":"", "searchable": false , "sortable": false }
		],
		"order": [[1, 'asc']] 
    } );
 
    table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>