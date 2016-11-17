<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<?php echo '<title>'. (isset($pageTitle) ? $pageTitle .' - ' : '') . $title .'</title>'; ?>

		<meta name="description" content="Northwind website for SENG365 assignment" />
		<meta name="author" content="Alex Gabites" />

		<link rel="icon" type="image/x-icon" href="<?php echo base_url("public/favicon.ico"); ?>" />

		<link rel="stylesheet" media="screen" href="<?php echo base_url("public/css/bootstrap.flatly.min.css"); ?>" />
		<link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,400italic,900" />
		<link rel="stylesheet" media="screen" href="<?php echo base_url("public/css/app.css"); ?>" />


		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="header">
			<nav class="navbar navbar-default navbar-app navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
							<span class="navbar-text visible-xs">&nbsp;</span>
						</button>
						<a class="navbar-brand" href="<?php echo site_url(); ?>">Northwind</a>
					</div>
					<div class="collapse navbar-collapse" id="navigation">
						<ul class="nav navbar-nav">
							<?php
							echo '
							<li'. ($pageTitle == 'About' ? ' class="active"' : '') .'><a href="'. site_url("pages/about") .'">About</a></li>';
							if ($loggedIn) {
								echo '
							<li'. ($pageTitle == 'Product Browser' ? ' class="active"' : '') .'><a href="'. site_url("products/browser") .'">Products</a></li>
							<li'. (strpos($pageTitle, 'Order') !== False ? ' class="active"' : '') .'><a href="'. site_url("orders/browser") .'">Orders</a></li>';
							}
							?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<?php
							if ($loggedIn) {
								echo '
							<li class="user-avatar'. ($pageTitle == 'Account' ? ' active' : '') .'"><a href="'. site_url("pages/account") .'"><img src="'. base_url($_SESSION['account']['avatar']) .'" alt="Avatar" /> '. $_SESSION['account']['username'] .'</a></li>';
							} else {
								echo '
							<li'. ($pageTitle == 'Account' ? ' class="active"' : '') .'><a href="'. site_url("pages/account") .'">Sign In</a></li>';
							}
							?>
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<div class="app">
			<div class="container">
				<!-- Navigation for mobile only (cause we can't use javascript so the bootstrap responsive navigation is out :\) -->
				<div class="phone-nav visible-xs text-center"><a href="<?php echo site_url(); ?>">Account</a> | <a href="<?php echo site_url("pages/about") ?>">About</a><?php if ($loggedIn) { echo ' | <a href="'. site_url("products/browser") .'">Products</a> | <a href="'. site_url("orders/browser") .'">Orders</a>'; } ?></div>

    			<?php echo $content; ?>
			</div>
		</div>

		<div class="footer text-center">
			<div class="container">
				<hr />
				<p>Northwind Assignment for SENG365<br />&copy; Alex Gabites 2016</p>
			</div>
		</div>
	</body>
</html>
