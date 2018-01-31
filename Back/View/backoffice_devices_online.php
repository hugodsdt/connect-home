<?php
session_start();
if($_SESSION['status']!="Active") {
	header ('Location: ../index.php');
 	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width">
	<title>Back-Office Capteurs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> <!-- inclure les fenetres modales -->
</head>
<?php include("header_bo.php"); ?>
<body>
<h2> <center> Devices en ligne </center> </h2>
<?php include ("../Model/table_devices.php"); ?>

</body>
