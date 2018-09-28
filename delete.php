<?php

if (isset($_GET['id'])) {
	
	require_once"connection.php";

	$id = $_GET['id'];
	$delete_contact = "delete from contacts where contact_id = $id ";
	$sql_delete_contact = $conn->query($delete_contact);

	if ($sql_delete_contact == true) {
		header("Location: index.php");
	}
}


?>
