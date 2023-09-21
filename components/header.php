<?php
	if(isset($_GET['page_state'])){
		$page_state = $_GET['page_state'];
	}else{
		$page_state = "Home";
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href="./public/assets/images/logo.png" rel="icon">
	<link href="./public/assets/images/logo.png" rel="apple-touch-icon">
	<title>PODVIBES<?php echo " - ".$page_state; ?></title>
	<!-- <link rel="stylesheet" type="text/css" href="./public/assets/css/main.css"> -->
	<link rel="stylesheet" type="text/css" href="./public/assets/css/origin.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<!-- <body bgcolor="black" style="background-image: url(./public/assets/images/EA2D09C2-5A51-46A2-876D-8B46E59C0B62.jpg);"> -->
<body>