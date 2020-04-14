<!--  KODE TILPASSET AV: ANDREAS KNUTSEN START -->
<?php
if (!empty($_SESSION)) {
		echo '<div class="container">
				<nav class="navbar navbar-expand-md fixed-top">
					<a class="navbar-brand" href="index.php">RE:SUB</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Kodet av: Vigleik Espeland Stakseng START -->
					<button class="btn btn-primary" id="dark-mode-toggle">Darkmode</button>
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



} else {
	echo '<div class="container">
			<nav class="navbar navbar-expand-md fixed-top">
				<a class="navbar-brand" href="index.php">RE:SUB</a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
								<span class="navbar-toggler-icon"></span>
							</button>

							<!-- Kodet av: Vigleik Espeland Stakseng START -->
							<button class="btn btn-primary" id="dark-mode-toggle">Darkmode</button>
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
}
?>
<!--  KODE TILPASSET AV: ANDREAS KNUTSEN SLUTT -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>