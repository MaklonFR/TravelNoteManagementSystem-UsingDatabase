<?php
	include 'koneksi.php';
	if (!isset($_SESSION)) {
		session_start();	
	}

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: ../home.php?#');
	}

	$sql = "SELECT * FROM user WHERE nik = '".$_SESSION['admin']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>