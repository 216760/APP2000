<!-- ---------------------------------------------------------------------------------------------------------- -->
<!-- TIL INFORMASON:												-->
<!-- I denne filen ligger det kode som er hentet og tilpasset egen løsning fra kildene nedenfor.		-->
<!-- Dette er også dokumentert under "Kommentarer til kildebruk" i rapporten og markert i selve koden		-->
<!-- Grunnen til dette er basert på “best practice”  måter å programmere på. 					-->
<!-- Vi har gjennom en rekke eksempler via dokumenterte kilder lært oss hvordan php språket fungerer. 		-->
<!-- 														-->
<!--  Kodet og tilpasset av: Henrik Solnør Johansen Andreas Knutsen og Anders Koo  			 	-->
<!--										                      		-->
<!--  Kilde: 													-->                                       
<!--    	https://www.youtube.com/watch?v=cgvDMUrQ3vA						        -->
<!-- 		https://www.w3schools.com/TAgs/tag_hn.asp							-->
<!--                                                         							-->
<!-- ---------------------------------------------------------------------------------------------------------- -->

<?php
include('lang-config.php'); // Inkluderer oppsett for flere språk
?>
<html>
<section class="bg-main">

	<div class="container-fluid">
<!-- -------------------------------------------------------------------------------------------------------------------- -->
<!-- START 														  -->
<!-- For å sette opp muligheter for både norsk og engelsk opppset av vi hentet kode og tilpasset fra kilden under  	  -->																	 
<!-- Kilde: https://www.youtube.com/watch?v=OePNkDd3Yb8 								  -->
<!-- -------------------------------------------------------------------------------------------------------------------- -->

		<h2 style="text-align:right">
		<?php echo $lang_text['paragraph-right']; ?> <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
		  
		<h2>

	</div>
	
</section>

<section class="bg-secondary-custom">

	<div class="container-fluid">
		
	<h2 style="text-align:left">
		<?php echo $lang_text['paragraph-left']; ?> <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
		
		</h2>
<!-- -------------------------------------------------------------------------------------------------------------------- -->
<!-- STOPP 														  -->
<!-- For å sette opp muligheter for både norsk og engelsk opppset av vi hentet kode og tilpasset fra kilden under         -->																	 
<!-- Kilde: https://www.youtube.com/watch?v=OePNkDd3Yb8 								  -->
<!-- -------------------------------------------------------------------------------------------------------------------- -->
	</div>
	
</section>
</html>
