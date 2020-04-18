<!--  Kodet tilpasset av Andreas Kntusen start -->
<!--  Kilde: https://mdbootstrap.com/docs/jquery/navigation/footer/ -->
<?php
	// Hvis $_SESSION['id'] IKKE er tom (bruker er logget inn) og $_SESSION['lang'] har verdien 'en' (brukere velger språk i footeren)
	if (!empty($_SESSION['id']) && ($_SESSION['lang'] == "en")) {
		// Vis footer tilpasset for innloggede brukere med engelsk tekst
		echo '<!-- Footer -->
				<footer class="page-footer font-small unique-color-dark pt-4">
					<!-- Footer Elements -->
						<div class="container">
							<!-- Call to action -->
							<ul class="list-unstyled list-inline text-center py-2">
								<li class="list-inline-item">
									<h5 class="mb-1">Contact us @ project.resub@gmail.com</h5>
								</li>
							</ul>
							<ul class="list-unstyled list-inline text-center py-2">
								<li class="list-inline-item">
						            <a href="?lang=no" id="no">Norsk</a> <!-- Setter språk til norsk -->
		        					<a href="?lang=en" id="en">English</a> <!-- Setter språk til engelsk -->
								</li>
							</ul>
							<!-- Call to action -->
						</div>
					<!-- Footer Elements -->
				</footer>
				<!-- Footer -->';
	// Hvis $_SESSION['id'] ER tom (bruker er ikke logget inn) og $_SESSION['lang'] har verdien 'en' (brukere velger språk i footeren)
	} elseif (empty($_SESSION['id']) && ($_SESSION['lang'] == "en")) {
		// Vis footer tilpasset for besøkende som ikke er logget inn med engelsk tekst
		echo '<footer class="page-footer font-small unique-color-dark pt-4">
				<!-- Footer Elements -->
				<div class="container text-center">
					<!-- Call to action -->
					<ul class="list-unstyled list-inline text-center py-2" style="display:inline-block;">
						<li class="list-inline-item">
							<h5 class="mb-1">Register for free</h5>
						</li>
						<li class="list-inline-item">
							<a href="signup.php" class="btn btn-outline-white btn-rounded">Sign up!</a>
						</li>
					</ul>
					<ul class="list-unstyled list-inline text-center py-2" style="display:inline-block;">
						<li class="list-inline-item">
							<h5 class="mb-1">Already have an account?</h5>
						</li>
						<li class="list-inline-item">
							<a href="login.php" class="btn btn-outline-white btn-rounded">Log in</a>
						</li>
					</ul>
					<ul class="list-unstyled list-inline text-center py-2">
						<li class="list-inline-item">
				            <a href="?lang=no" id="no">Norsk</a> <!-- Setter språk til norsk -->
        					<a href="?lang=en" id="en">English</a> <!-- Setter språk til engelsk -->
						</li>
					</ul>
					<!-- Call to action -->
				</div>
				<!-- Footer Elements -->
			</footer>
			<!-- Footer -->';
	// Hvis $_SESSION['id'] IKKE er tom (bruker er logget inn) og $_SESSION['lang'] har verdien 'no' (brukere velger språk i footeren)
	} elseif (!empty($_SESSION['id']) && ($_SESSION['lang'] == "no")) {
		// Vis footer tilpasset for innloggede brukere med norsk tekst
		echo '<!-- Footer -->
				<footer class="page-footer font-small unique-color-dark pt-4">
					<!-- Footer Elements -->
						<div class="container">
							<!-- Call to action -->
							<ul class="list-unstyled list-inline text-center py-2">
								<li class="list-inline-item">
									<h5 class="mb-1">Kontakt oss @ project.resub@gmail.com</h5>
								</li>
							</ul>
							<ul class="list-unstyled list-inline text-center py-2">
								<li class="list-inline-item">
						            <a href="?lang=no" id="no">Norsk</a> <!-- Setter språk til norsk -->
		        					<a href="?lang=en" id="en">English</a> <!-- Setter språk til engelsk -->
								</li>
							</ul>
							<!-- Call to action -->
						</div>
					<!-- Footer Elements -->
				</footer>
				<!-- Footer -->';
	// Hvis $_SESSION['id'] ER tom (bruker er ikke logget inn) og $_SESSION['lang'] har verdien 'no' (brukere velger språk i footeren)
	} else {
		// Vis footer tilpasset for besøkende som ikke er logget inn med norsk tekst
		echo '<footer class="page-footer font-small unique-color-dark pt-4">
				<!-- Footer Elements -->
				<div class="container text-center">
					<!-- Call to action -->
					<ul class="list-unstyled list-inline text-center py-2" style="display:inline-block;">
						<li class="list-inline-item">
							<h5 class="mb-1">Opprett en ny konto</h5>
						</li>
						<li class="list-inline-item">
							<a href="signup.php" class="btn btn-outline-white btn-rounded">Registrer!</a>
						</li>
					</ul>
					<ul class="list-unstyled list-inline text-center py-2" style="display:inline-block;">
						<li class="list-inline-item">
							<h5 class="mb-1">Har du allerede en konto?</h5>
						</li>
						<li class="list-inline-item">
							<a href="login.php" class="btn btn-outline-white btn-rounded">Logg in</a>
						</li>
					</ul>
					<ul class="list-unstyled list-inline text-center py-2">
						<li class="list-inline-item">
				            <a href="?lang=no" id="no">Norsk</a> <!-- Setter språk til norsk -->
        					<a href="?lang=en" id="en">English</a> <!-- Setter språk til engelsk -->
						</li>
					</ul>
					<!-- Call to action -->
				</div>
				<!-- Footer Elements -->
			</footer>
			<!-- Footer -->';
	} 
?>		
<!--  Kodet tilpasset av Andreas Kntusen topp -->