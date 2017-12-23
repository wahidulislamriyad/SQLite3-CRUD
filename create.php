<?php
// Includs database connection
include "db_connect.php";

// Updating the table row with submited data according to rowid once form is submited 
if( isset($_POST['submit_data']) ){
    // Gets the data from post
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$username = $_POST['username'];
	$password = base64_encode($_POST['password']);
	$role = $_POST['role'];
	$active = $_POST['active'];
    $last = $_POST['last'];
    
    // Check if same id exists in database
    $query = "SELECT id, * FROM users WHERE id=$id";
    $result = $db->query($query);
    $data = $result->fetchArray(); // set the row in $data
    if (!$data['id'] == '') {
        echo 'Sorry, same id exists in database.';
        $retry = true; // Set retry variable for re-input
    } else {

	    // Makes query with post data
	    $query = "INSERT INTO users (id,username,password,name,email,phone,role,active,last) VALUES ($id, '$username', '$password', '$name',  '$email','$phone', '$role', '$active', '$last' );";
	
	    // Executes the query
	    // If data inserted then set success message otherwise set error message
	    // Here $db comes from "db_connection.php"
	    if( $db->exec($query) ){
    		$message = 'Data was inserted successfully.<meta http-equiv="refresh" content="2; url=index.php" />';
	    }else{
		    $message = 'Sorry, Data was not inserted.<meta http-equiv="refresh" content="2; url=index.php" />';
	    }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>
	<div>

		<!-- showing the message here-->
		<div><?php if (isset($message)) { echo $message; } ?></div>

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">
			<tr>
				<td>ID:</td>
<td><input type="number" name="id" value="" autofocus required><?php if (isset($retry)) { ?>&nbsp; &nbsp; &nbsp; &nbsp; <font color="red"><-- X</font><?php } ?></td>
			</tr>
            <tr>
				<td>Name:</td>
				<td><input name="name" type="text" value="<?php if (isset($retry)) { echo $name; } ?>" required></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input name="email" type="email" value="<?php if (isset($retry)) { echo $email; } ?>" required></td>
			</tr>
			<tr>
				<td>Phone:</td>
				<td><input name="phone" type="text" value="<?php if (isset($retry)) { echo $phone; } ?>" required></td>
			</tr>
			<tr>
				<td>Username:</td>
				<td><input name="username" type="text" value="<?php if (isset($retry)) { echo $username; } ?>" required></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input name="password" type="password" value="<?php if (isset($retry)) { echo base64_decode($password); } ?>" required></td>
			</tr>
			<tr>
				<td>Role:</td>
				<td><input name="role" type="text" value="<?php if (isset($retry)) { echo $role; } ?>" required></td>
			</tr>
			<tr>
				<td>Active:</td>
				<td><input name="active" type="text" value="<?php if (isset($retry)) { echo $active; } ?>" required></td>
			</tr>
			<tr>
				<td>Last Active:</td>
				<td><input name="last" type="text" value="<?php if (isset($retry)) { echo $last; } ?>" required></td>
			</tr>
			<tr>
				<td><a href="index.php">Back</a></td>
				<td><input name="submit_data" type="submit" value="Update Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>