<?php

// ----------------------------------------------------------------------------- //
// Kodet og tilpasset av:  Henrik Solnør Johansen, Anders Koo og Andreas Knutsen //
// ----------------------------------------------------------------------------- //


session_start(); // Gjenopptar session
?>


<!DOCTYPE html>
<html lang="en">

	<?php include('includes/header.php');?> <!-- Inkluderer header.php -->

	<body>

		<?php include('includes/navbar.php');?> <!-- Inkluderer navbar.php -->

		<!--  Visning av landdingsiden -->

		<div class="content-main">
			<?php include('includes/main.php');?> <!-- Inkluderer main.php -->
		</div>

		<!-- Visning av landdingsiden  -->


		<!-- Visning av footer -->
		<footer>
			<?php include('includes/footer.php');?> <!-- Inkluderer footer.php -->
		</footer>
		<!--  Visning av footer -->

	</body>
	
</html>

<!-- ---------------------------------------------------------------------------------------------------- 
Henter script filer (JS, JQUERY, BOOTSTRAP)
-------------------------------------------------------------------------------------------------------->

<?php include('includes/scripts.php');?>

<!-- ---------------------------------------------------------------------------------------------------- 
Henter script filer (JS, JQUERY, BOOTSTRAP)
-------------------------------------------------------------------------------------------------------->