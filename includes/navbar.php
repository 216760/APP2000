<!--  Kodet tilpasset av Andreas Kntusen start -->
<?php
	if (!empty($_SESSION['id']) && ($_SESSION['lang'] == "en")) {
			echo '<div class="container">
					<nav class="navbar navbar-expand-md fixed-top">
						<a class="navbar-brand" href="index.php">RE:SUB</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
							<span class="navbar-toggler-icon"></span>
						</button>

						<!-- Kodet av: Vigleik Espeland Stakseng START -->
						<input type="checkbox" data-toggle="toggle" data-on="Dark Mode" data-off="Light Mode" id="toggle1" onchange="toggleDark()" data-size="sm">
						<!-- Kodet av: Vigleik Espeland Stakseng STOP -->

						<div class="collapse navbar-collapse " id="navbarResponsive">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="dashboard.php">Dashboard</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="feedback.php">Feedback</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="logout.php">Logout</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>';
	} elseif (empty($_SESSION['id']) && $_SESSION['lang'] == "en"){
		echo '<div class="container">
				<nav class="navbar navbar-expand-md fixed-top">
					<a class="navbar-brand" href="index.php">RE:SUB</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
							<span class="navbar-toggler-icon"></span>
						</button>

						<!-- Kodet av: Vigleik Espeland Stakseng START -->
						<input type="checkbox" data-toggle="toggle" data-on="Dark Mode" data-off="Light Mode" id="toggle1" onchange="toggleDark()" data-size="sm">
						<!-- Kodet av: Vigleik Espeland Stakseng STOP -->

					<div class="collapse navbar-collapse " id="navbarResponsive">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="login.php">Log in to your account</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>';
	} elseif (!empty($_SESSION) && $_SESSION['lang'] == "no") {
		echo '<div class="container">
				<nav class="navbar navbar-expand-md fixed-top">
					<a class="navbar-brand" href="index.php">RE:SUB</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Kodet av: Vigleik Espeland Stakseng START -->
					<input type="checkbox" data-toggle="toggle" data-on="Dark Mode" data-off="Light Mode" id="toggle1" onchange="toggleDark()" data-size="sm">
					<!-- Kodet av: Vigleik Espeland Stakseng STOP -->

					<div class="collapse navbar-collapse " id="navbarResponsive">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="dashboard.php">Dashbord</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="feedback.php">Feedback</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="logout.php">Logg ut</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>';
	} else {
		echo '<div class="container">
				<nav class="navbar navbar-expand-md fixed-top">
					<a class="navbar-brand" href="index.php">RE:SUB</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
							<span class="navbar-toggler-icon"></span>
						</button>

						<!-- Kodet av: Vigleik Espeland Stakseng START -->
						<input type="checkbox" data-toggle="toggle" data-on="Dark Mode" data-off="Light Mode" id="toggle1" onchange="toggleDark()" data-size="sm">
						<!-- Kodet av: Vigleik Espeland Stakseng STOP -->

					<div class="collapse navbar-collapse " id="navbarResponsive">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="login.php">Logg inn på din konto</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>';
	}
?>
<!--  Kodet tilpasset av Andreas Kntusen stopp -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>