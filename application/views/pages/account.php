<?php
echo '
				<div class="row">
					<div class="col-md-12">';

if (!$loggedIn) {
	echo '
						<div class="page-header text-center">
							<h1>Welcome to Northwind</h1>
						</div>

						<div class="row">
							<div class="col-md-4 col-md-offset-4">';

	if ($response == 'failed') {
		echo '
								<div class="alert alert-danger text-center"><strong>Incorrect username or password.</strong></div>';
	}

	if ($response == 'loggedout') {
		echo '
								<div class="alert alert-success text-center"><strong>Successfully logged out.</strong></div>';
	}

	echo '
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Sign in</h3>
									</div>
									<div class="panel-body">
						    			<form action="'. site_url('pages/account') .'" method="post">
											<div class="form-group">
						    					<input type="text" class="form-control" placeholder="Username" name="username" />
											</div>
											<div class="form-group">
												<input type="password" class="form-control" placeholder="Password" name="password" />
											</div>
											<button type="submit" class="btn btn-primary">Login</button>
										</form>
									</div>
								</div>
								<p class="text-center"><small>See the <a href="'. site_url('pages/about') .'">about page</a> for valid username and password combinations.</small></p>
							</div>
						</div>';
} else {
	echo '
						<div class="page-header text-center">
							<h1>'. $pageTitle .'</h1>
						</div>

						<div class="row">
							<div class="col-md-4 col-md-offset-4">';

	if ($response == 'success') {
		echo '
								<div class="alert alert-success text-center"><strong>Successfully logged in.</strong></div>';
	}

	echo '
								<div class="panel panel-default">
									<div class="panel-body text-center">
										<div>
											<img src="'. base_url($_SESSION['account']['avatar']) .'" alt="Avatar" />
										</div>
										<h3>Welcome, '. $_SESSION['account']['username'] .'</h3>
										<hr>
										<div class="row">
											<div class="col-xs-6 col-xs-offset-3">
								    			<form action="'. site_url('pages/account') .'" method="post">
													<input type="hidden" name="logout" value="1" />
													<button type="submit" class="btn btn-block btn-danger">Logout</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>';
}

echo '
					</div>
				</div>';
