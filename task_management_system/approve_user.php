<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM system_newclient where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'approve.php';
?>