<!-- ------------------------------------------------------------------------------------------------ 
TIL INFORMASJON:
 

// I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under.
// Dette vil også bli dokumentert under kildebruk i rapporten.  Grunnen til dette er basert på “best practice”  måter å programmere på.  
// Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer. 

// Vi ser først på en demo av hvordan et eksempel virker, koder oss gjennom guiden for å lære hva som skjer. 
// Etter dette gjør vi en vurdering om å bruke, tilpasse og implementer eksempelet i vår kode eller ikke. 

// Kilder: https://www.youtube.com/watch?v=3bGDe0rbImY&t=635s

Kodet og tilpasset av:  Henrik Solnør Johansen og Anders Koo

-----------------------------------------------------------------------------------------------------  -->

<?php
session_start(); // Gjenopptar session
?>


<!DOCTYPE html>
<html>

	<?php include('includes/header.php');?> <!-- Inkluderer header.php -->

	<body id="custom-body">

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
----------------------------------------------------------------------------------------------------- -->

<?php include('includes/scripts.php');?>

<!-- ---------------------------------------------------------------------------------------------------- 
Henter script filer (JS, JQUERY, BOOTSTRAP)
----------------------------------------------------------------------------------------------------- -->
