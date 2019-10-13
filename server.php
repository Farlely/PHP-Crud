<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', 'root', 'crud');

	// initialize variables
	$name = "";
	$adres = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['adres'];

		mysqli_query($db, "INSERT INTO info (name, adres) VALUES ('$name', '$address')");
		$_SESSION['message'] = "Address saved";
		header('location: index.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$adres = $_POST['adres'];

		mysqli_query($db, "UPDATE info SET name='$name', adres='$adres' WHERE id=$id");
		$_SESSION['message'] = "Address updated!";
		header('location: index.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Address deleted!";
	header('location: index.php');
}


	$results = mysqli_query($db, "SELECT * FROM info");


?>
