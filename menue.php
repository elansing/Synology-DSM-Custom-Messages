<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
	      <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
		<!-- Benutzermenue -->
		<?php
      //load Config File
      $config = require_once('../assets/config.php');
      //Include and Define important Settings
      $SessionToken = $config['Session-Token'];
      $Database = $config['DB'];
      $Databasehost = $config['DB-Host'];
      $Databaseuser = $config['DB-User'];
      $Databasepasswd = $config['DB-Passwd'];
			$KD = $SessionToken;
      $pdo = new PDO("mysql:host={$Databasehost};dbname={$Database}", "{$Databaseuser}", "{$Databasepasswd}";
			$sql = "SELECT * FROM login WHERE user = '".$KD."'";
			$user = $pdo->query($sql)->fetch();
		?>

		<li class="nav-item dropdown user-menu">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
				<i class="icon fas fa-user"></i>
				<span class="d-none d-md-inline">
					<?php
						echo ucfirst($_SESSION["elansing_uWjXvgPMQHbJatunXDNP32"]);
					?>
				</span>
			</a>
			<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<!-- User image -->
				<li class="user-header bg-primary">
					<img src="/img/user.png" class="img-circle elevation-2" alt="User Image">
					<p align="center">
						<?php
							echo $user['Konteninhaber'];
						?>
						<br>
						<small><?php echo $user['Rang'];?></small>
					</p>
				</li>
				<!-- Menu Body -->
				<li class="user-body">
					<div class="row">
						<div class="col-12 text-center">
							<a href="/Support"><i class="fas fa-ticket-alt"></i> &nbsp; Ticket-Support</a>
						</div>
					</div>
				<!-- /.row -->
				</li>
				<!-- Menu Footer-->
				<li class="user-footer">
					<a href="/?action=Settings" class="btn btn-default btn-flat"><i class="icon fas fa-cogs">&nbsp;</i>Settings</a>
					<a href="/logout" class="btn btn-default btn-flat float-right"><i class="icon fas fa-sign-out-alt">&nbsp;</i>Sign out</a>
				</li>
			</ul>
		</li>
    </ul>
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/Uebersicht" class="brand-link">
      <span class="brand-text font-weight-light">elansing.de Online-Banking</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			<li class="nav-item">
				<a href="/" class="nav-link">
					<i class="fas fa-home nav-icon"></i>
					<p>Übersicht</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="/Update.php" class="nav-link">
					<i class="fas fa-pen-square nav-icon"></i>
					<p>Updates</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="/Logs.php" class="nav-link">
					<i class="fas fa-scroll nav-icon"></i>
					<p>Logs</p>
				</a>
			</li>
			<hr>
			<li class="nav-item">
				<?php
				if($user['Rang'] == 'Dev' || $user['Rang'] == 'Admin') {
				?>
					<a href="/admin" class="nav-link">
						<i class="fas fa-user-cog nav-icon"></i>
						<p>Verwaltungsoberfläche</p>
					</a>
				<?php
					}
				?>
            </li>
			<li class="nav-item">
				<?php
				if($user['Rang'] == 'Dev' || $user['Rang'] == 'Admin' || $user['Rang'] == 'Supporter') {
				?>
						<a href="/admin/Logs.php" class="nav-link">
							<i class="fas fa-clipboard-list nav-icon"></i>
							<p>Systemlogs</p>
						</a>
				<?php
					}
				?>
            </li>
			<li class="nav-item">
				<?php
				if($user['Rang'] == 'Dev' || $user['Rang'] == 'Admin') {
				?>
					<a href="/admin/Autobuchungen.php" class="nav-link">
						<i class="fas fa-clock nav-icon"></i>
						<p>Autobuchungen</p>
					</a>
				<?php
					}
				?>
            </li>
			<li class="nav-item">
				<?php
				if($user['Rang'] == 'Dev' || $user['Rang'] == 'Admin' || $user['Rang'] == 'Supporter') {
				?>
					<a href="/Support/admin" class="nav-link">
						<i class="fas fa-ticket-alt nav-icon"></i>
						<p>Support</p>
					</a>
				<?php
					}
				?>
            </li>
			<li class="nav-item">
				<?php
				if($user['Rang'] == 'Dev' || $user['Rang'] == 'Admin') {
				?>
					<a href="/Systemsettings.php" class="nav-link">
						<i class="fas fa-cog nav-icon"></i>
						<p>Systemeinstellungen</p>
					</a>
				<?php
					}
				?>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
