<?php include_once('functions.php'); ?>
<?php include_once('new_conn.php'); ?>
<?php
	// print_r($_REQUEST);exit;
	// TOTAL RECORDS COUNT
	$countQueryStr="SELECT count(*) FROM add_state";
	$recordCount=$con->query($countQueryStr)->fetchColumn();
	// GENERALISED SELECT QUERY
	$queryStr='SELECT * FROM add_state INNER JOIN add_country ON add_state.c_id =add_country.country_id';

	// GENERAL SEARCH QUERY
	$condition='';
	if (!empty($_REQUEST['search']['value'])) {
		$searchvalue=$_REQUEST['search']['value'];
		foreach ($_REQUEST['columns'] as $column) {
			if ($column['searchable']=="true") {
				if (!empty($condition)) {
					$condition .= ' OR';
				}
				$condition .= ' '.$column['name'].' LIKE "%'.$searchvalue.'%"';
			}
		}
	}
	if(!empty($condition)){
		$queryStr .= ' WHERE'.$condition;
	}

	// Ordering
	$orderColumn=isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:'';
	$orderColumnName=($orderColumn!='')?$_REQUEST['columns'][$orderColumn]['name']:'';
	$sequence=isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:'asc';
	if (!empty($orderColumnName)) {
		$queryStr .= ' ORDER BY ' .$orderColumnName.' '.$sequence;
	}

	// Lmiting
	if(isset($_REQUEST['start']) && isset($_REQUEST['length'])){
		$queryStr .= ' LIMIT '.$_REQUEST['start'].','.$_REQUEST['length'];
	}

	$exe= $con->query($queryStr);
	// $DATA KO DEFINE KIYA KI $DATA EK ARRAY KI TARAH KAM KAREGA
	$data = array();
	// DATA FETCH KIYA
	if (!empty($exe)) {
		foreach ($exe as $fetch) {
			$stateStatus = ($fetch['state_status']=='0')? 'Deactivate' : 'Activate';
			$stid =$fetch['state_id'];
			$data[] = array(
				'<input type="checkbox" value="'.$stid.'" name="del[]"/>',
				$fetch['state_id'],
				$fetch['state_name'],
				$fetch['country_name'],
				$stateStatus,
				'<a href="state_view.php?sid='.$stid.'" class="btn btn-danger btn-sm">Delete</a>'.
				'<button class="btn btn-primary btn-sm ml-1" type="button">Edit</button>'
			);
		}
	}
	// FETCH KIYA HUA DATA MAIN PAGE PAR SEND KARNA (IN FORM OF JSON) 
	echo json_encode([
		'draw' => $_REQUEST['draw'],
		'recordsTotal' => $recordCount,
		'recordsFiltered' => $recordCount,
		'data' => $data
	]);
?>