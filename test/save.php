<?php
function queryDB($sql,$ms_dsn,$ms_use,$ms_psa){
	try{
		$pdo = new PDO($ms_dsn,$ms_use,$ms_psa);
		if($pdo == null){}
		else{
			$stmt = $pdo->query($sql);
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt = null;
		}
	}catch (PDOException $e){
		print('Error:'.$e->getMessage());
		die();
	}
	$pdo = null;
	return $result;
}

$dsn  = "mysql:dbname=test;host=localhost";
$user = "test";
$pass = "root";

$user = $_POST["user"];
$sql = "insert into users (user) value ('". $user ."')";

echo queryDB($sql, $dsn, $user, $pass);

?>