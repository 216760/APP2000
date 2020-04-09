<!----------------------------------------------------------------------------------------------------------------------------------------------
TIL INFORMASJON: 
I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under.
Dette vil også bli dokumentert under kildebruk i rapporten.  Grunnen til dette er basert på “best practice”  måter å programmere på.  
Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer. 
Vi ser først på en demo av hvordan et eksempel virker,  koder oss gjennom guiden for å lære hva som skjer. 
Etter dette gjør vi en vurdering om å bruke, tilpasse og implementer eksempelet i vår kode eller ikke. 

Kilde: http://www.openjs.com/ajax/tutorial/ajax.php

Medlemmer som har bidratt Henrik Solnør Johansen, Vigleik Espeland Stakseng, Anders Koo og Andreas Knutsen

------------------------------------------------------------------------------------------------------------------------------------------------> 
<!DOCTYPE html>
<html>

	<?php
	include('includes/header.php');
	?>

	<body>
		<!-- ------------------------------------------------------------------------------------------------
		Lager et form som da har 3 inputs name, email og subject og 1 textarea der man kan skrive inn. 
		Dette blir sendt når alle feltene er fylt ut, ellers så får du opp en feilmelding. 
		For at et form skal sendes, så man ha en id som kobler (my_form)formet sammen med scriptet nedenfor.
		Har 2 submit knapper der den ene knappen har en id "mybtn" som gjør at function starter. 
		Knapp 2 sender bruker tilbake til forsiden.  
		----------------------------------------------------------------------------------------------------->

		<?php
		include('includes/navbar.php');
		?>
			

		<div class="content-dashboard">
      		<div class="container">
        		<div class="row justify-content-center">
		            <div class="card shadow mx-auto" style="width: 25rem;">
              			<div class="card-header">Send a message</div>
	    				<form id="my_form" onsubmit="return submitForm();">
							<div class="form-group col-lg-12">
								<input id="name" placeholder="Name" type="name" required class="form-control">
							</div>
							<div class="form-group col-lg-12">
								<input id="email" placeholder="E-mail" type="email" class="form-control" required>
							</div>
							<div class="form-group col-lg-12">
								<input id="subject" placeholder="Subject"  type="subject" class="form-control">
							</div>
							<div class="form-group col-lg-12">
								<textarea class="form-control" id="message" placeholder="Write your message" rows="5" class="form-control" required ></textarea>
							</div>
							<div class="form-group col-lg-6">
								<input class="fdsendBtn"id="mybtn" type="submit" name="submitbtn" value="Submit" style="display:inline-block;"><span id="status"></span>
								<input class="fdbackBtn" type="submit" align="right" value="Cancel" style="display:inline-block;" onclick="document.location = 'dashboard.php'">
							</div>
						</form>	 
					</div>
				</div>
			</div>

		<!-- ---------------------------------------------------------------------------------------------------- 
		Footer
		----------------------------------------------------------------------------------------------------- -->

		<?php include('includes/footer.php');?>

		<!-- ---------------------------------------------------------------------------------------------------- 
		Footer
		----------------------------------------------------------------------------------------------------- -->

	</body>



	<?php
	include('includes/scripts.php');
	?>


</html>

<!-- ---------------------------------------------------------------------------------------------------- 

----------------------------------------------------------------------------------------------------- -->

<script>

		function _(id){ return document.getElementById(id); } // denne funksjonen tar alle id verdiene i form, for å kunne bli sendt til submitForm
		function submitForm(){
			// sånn at brukeren ikke kan sende dataen mange ganger
			_("mybtn").disabled = true; 
			// en tilbakemelding om at dataen blir sendt
			_("status").innerHTML = 'please wait ...'; 
			//et objekt, sånn at man kan tilkoble til en ny nøkkelparverdi
			var formdata = new FormData(); 
			// nøkkel og verdi
			formdata.append( "name", _("name").value );
			 // nøkkel og verdi
			formdata.append( "email", _("email").value ); 
			// nøkkel og verdi
			formdata.append( "message", _("message").value ); 
			// nøkkel og verdi
			formdata.append( "subject", _("subject").value ); 
			// denne lager et nytt XMLHttpRequest objekt, denne variabelen gjør at man kan oppdatere siden uten å laste inn siden på nytt
			var ajax = new XMLHttpRequest(); 
			// lager en metode, med hjelp av POST vil denne metoden sende dataen når tilkoblingen er åpen 
			ajax.open( "POST", "feedbackinsert.php" ); 
			// starter den funksjonen, blir "called" når readystate verdiene forandrer seg
			ajax.onreadystatechange = function() { 
				// Denne holder statusen til XMLHttpRequest, 
				// forespørselen starter 
				// kobler til databasen
				// forespørsel mottatt 
				// prosessere forspørsel 
				// forespørsel ferdig, responsetext er klar
				if(ajax.readyState == 4 && ajax.status == 200) {
					// hvis alt går, så har dataen fra skjemaet blitt sendt til databasen 
					if(ajax.responseText == "success"){
						_("my_form").innerHTML = '<h2>Thanks '+_("name").value+', your message has been sent.</h2>';  
					} else {
						// hvis det er en feil, så får man opp en responsetext. 
						_("status").innerHTML = ajax.responseText; 
						// denne gjør sånn at man kan trykke på submit knappen igjen
						_("mybtn").disabled = false; 
					}
				}
			}
			// sender verdiene fra (fromdata) som er name, email, subject og message in i databasen
			ajax.send( formdata ); 
		}
</script>

<!-- ---------------------------------------------------------------------------------------------------- 

----------------------------------------------------------------------------------------------------- -->
