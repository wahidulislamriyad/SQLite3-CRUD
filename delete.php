<?php

// Includs database connection
include "db_connect.php";

$id = $_GET['id']; // rowid from url

// Prepar the deleting query according to rowid
$query = "DELETE FROM users WHERE id=$id";

// Run the query to delete record
if( $db->query($query) ){
	$message = 'Record is deleted successfully. <meta http-equiv="refresh" content="2; url=index.php" />';
}else {
	$message = "Sorry, Record is not deleted.";
}

echo $message;
?>
<br>
<a href="index.php">Back to List</a>