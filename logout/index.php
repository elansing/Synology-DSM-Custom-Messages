<?php
  session_start();
  //load Config File
  $config = require_once('../assets/config.php');
  //Include and Define important Settings
  $SessionToken = $config['Session-Token'];
  $Database = $config['DB'];
  $Databasehost = $config['DB-Host'];
  $Databaseuser = $config['DB-User'];
  $Databasepasswd = $config['DB-Passwd'];

  if(isset($_SESSION["{$SessionToken}"])){
    $user = $_SESSION["{$SessionToken}"];
    session_destroy();

    //Logout speichern
    $timestamp = time();
    $date = date("d.m.Y", $timestamp);
    $time = date("H:i", $timestamp);
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip = trim($_SERVER['HTTP_X_FORWARDED_FOR']);
    } else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    $host = gethostbyaddr($ip);
    $Token = $config['IP2Location-Token'];
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json?token={$Token}"));
    if(isset($details->bogon) && $details->bogon == "true"){
      $City = "Server";
      $Country = "Home";
      $AS = "Local Network";
    } else {
      $City = $details->city;
      $Country = $details->country;
      $AS = $details->org;
    }

    $verbindung = mysqli_connect("localhost", "elansing_Banking", "Fff9s6?712")
    or die ("Fehler im System");

    mysqli_select_db($verbindung, "elansing_Banking")
    or die ("Verbidung zur Datenbank war nicht moeglich...");

    $control = 0;

    $eintrag = "INSERT INTO Logs
    	(Ereignis, Zeit, Datum, user, IP, Hostname, ISP, City, Country, Showed)
    	VALUES
    	('Logout', '$time', '$date', '$user', '$ip', '$host', '$AS', '$City', '$Country', 'yes')";
    $eintragen = mysqli_query($verbindung, $eintrag);
  }
?>

<html lang="de">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>elansing-IT.de Webinterface</title>

		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
		<!-- icheck bootstrap -->
		<link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
	</head>
	<body class="hold-transition login-page">
				<div class="login-box">
				  <div class="login-logo">
					b>elansing-IT.de </b>Webinterface
				  </div>
				  <!-- /.login-logo -->
				  <div class="card">
					<div class="card-body login-card-body">
						<p class="login-box-msg">Logout-Erfolgreich</p>
						Der Logout war erfolgreich..<br>
						<br>
						<div class="row">
						  <!-- /.col -->
						  <div class="col-4">
							<a href="/" ><button  class="btn btn-primary btn-block">zum Login</button></a>
						  </div>
						  <!-- /.col -->
						</div>
					</div>
					<!-- /.login-card-body -->
				  </div>
				</div>
				<!-- /.login-box -->

				<!-- jQuery -->
				<script src="../../assets/plugins/jquery/jquery.min.js"></script>
				<!-- Bootstrap 4 -->
				<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
				<!-- AdminLTE App -->
				<script src="../../assets/dist/js/adminlte.min.js"></script>
	</body>
</html>
