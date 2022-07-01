<?php
session_start();
//load Config File
$config = require_once('../assets/config.php');
//Include and Define important Settings
$SessionToken = $config['Session-Token'];
if(isset($_SESSION["{$SessionToken}"])) {
?>
	<html lang="de">
		<head>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <title>elansing.de - Online-Banking</title>

		  <!-- Google Font: Source Sans Pro -->
		  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		  <!-- Font Awesome Icons -->
		  <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
		  <!-- overlayScrollbars -->
		  <link rel="stylesheet" href="/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
		  <!-- Theme style -->
		  <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
		</head>
		<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
			<?php
				include'menue.php';
			?>
			  <div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
				  <div class="container-fluid">
					<div class="row mb-2">
					  <div class="col-sm-6">
						<h1>Updates</h1>
					  </div>
					  <div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
						  <li class="breadcrumb-item"><a href="/">Home</a></li>
						  <li class="breadcrumb-item active">Updates</li>
						</ol>
					  </div>
					</div>
				  </div><!-- /.container-fluid -->
				</section>

				<!-- Main content -->
				<section class="content">
				  <div class="container-fluid">

					<!-- Timelime example  -->
					<div class="row">
					  <div class="col-md-12">
						<!-- The time line -->
						<div class="timeline">
						  <!-- timeline time label -->
						  <div class="time-label">
							<span class="bg-red">01. Jul. 2022</span>
						  </div>
						  <!-- /.timeline-label -->
						  <!-- timeline item -->
						  <div>
							<i class="fa fa-info"></i>
							<div class="timeline-item">
							  <span class="time"><i class="fas fa-clock"></i> 22:33</span>
							  <h3 class="timeline-header">Start der Programmierarbeiten am Webinterface</h3>
							  <div class="timeline-body">
	                <ol>
	                  <li>Eröffnung des GitHub-Repositorys "Webinterface"</li>
	                  <li>Erstellung eines Grunddesigns</li>
	                  <li>Planung der zukünftigen Funktionen</li>
	                  <li>Erstellung der GitHub-Issues für die Funktionen</li>
										<li>Erstellung eines Config-Files für Wichtige Einstellungen</li>
										<li>Erstellung des Logins</li>
	                  <li>Erstellung der Update-Seite</li>
	                </ol>
							  </div>
							</div>
						  </div>
						  <!-- END timeline item -->
						</div>
					  </div>
					  <!-- /.col -->
					</div>
				  </div>
				  <!-- /.timeline -->

				</section>
				<!-- /.content -->
			  </div>
			  <!-- /.content-wrapper -->
			<?php
				include'footer.php';
			?>
		</body>
	</html>

<?php
} else {
?>
		<meta http-equiv="refresh" content="0; URL=/" />
<?php
}
?>
