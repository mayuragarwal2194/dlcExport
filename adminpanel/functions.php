<?php
	// CREATE LOGS FOR EXCEPTION
	function create_logs($data){
		if (create_directory()) {
			file_put_contents('logs/'.date('y-m-d').'/logs_'.date('H').'.txt', json_encode($data),FILE_APPEND | LOCK_EX);
		}
	}
	// CREATE DIRECTORY(FOLDER) FOR LOGS
	function create_directory(){
		try{
			$path='logs/'.date('y-m-d');
			if (!is_dir($path)) {
				mkdir($path,0775,true);
			}
			return true;
		}catch(Exception $e){
			file_put_contents('logs/errorlogs.txt', json_encode($e->getMessage()),FILE_APPEND | LOCK_EX);
			return false;
		}
	}
?>