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

	<?php session_start();?> <!-- Gjenopptar session -->
	<?php include('includes/header.php');?> <!-- Inkluderer header.php -->
	

	<body id="custom-body">
<!-- ------------------------------------------------------------------------------------------------
Lager en form med fire inputs: name, email, subject og textarea. 
Dette blir sendt når alle feltene har innhold og bruker trykker på "submit". 
For at et form skal sendes må man ha en id som kobler (my_form)-formen sammen med scriptet nedenfor. 
"mybtn" setter igang prosessen med å sende formen. 
Den andre knappen returnerer brukeren til dashbordet.
----------------------------------------------------------------------------------------------------->

		<?php include('includes/navbar.php');?> <!-- Inkluderer navbar.php -->
			

		<div class="content-dashboard">
      		<div class="container">
        		<div class="row justify-content-center">
		            <div class="card shadow mx-auto" style="width: 25rem;">
              			<div class="card-header" style="background-color: #543091">Send a message</div>
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

<?php include('includes/footer.php');?> <!-- Inkluderer footer.php -->

<!-- ---------------------------------------------------------------------------------------------------- 
Footer
----------------------------------------------------------------------------------------------------- -->

	</body>


	<?php
	include('includes/scripts.php'); ?> <!-- Inkluderer scripts.php -->



</html>

<!-- ---------------------------------------------------------------------------------------------------- 

----------------------------------------------------------------------------------------------------- -->

<script>

function _(id) { // funksjon som returnerer alle id'ene i skjema
	return document.getElementById(id); 
} 

function submitForm(){ // Dette er en funksjon som samler inn data fra feedback skjema ovenfor
  _("mybtn").disabled = true; // Kaller på _funksjon, deretter blir disabled funksjonen kalt på som gjør at brukeren ikke kan sende data flere ganger
  _("status").innerHTML = 'please wait ...'; // Kaller på _funksjon, deretter blir innerHTML metoden i document objektet kalt på som gjør at du kan sette inn tekst
  var formdata = new FormData();  //variabel som initialiserer FormData objektet
  formdata.append( "name", ("name").value ); //append er en metode som henter verdier fra de id'en name skjema
  formdata.append( "email", ("email").value ); //append er en metode som henter verdier fra de id'en email skjema
  formdata.append( "message", ("message").value ); //append er en metode som henter verdier fra de id'en message skjema
  formdata.append( "subject", ("subject").value );  //append er en metode som henter verdier fra de id'en subjekt i skjema
  var ajax = new XMLHttpRequest(); // ajax variabel initialiserer XMLHttpRequest objektet
  ajax.open( "POST", "feedbackinsert.php" ); // open er en metode fra XMLHttpRequest objektet som sender en POST forespørsel til feedbackinsert.php
  ajax.onreadystatechange = function() { // onreadystatechange er en metode med en anonym funksjon som behandler forskjellige typer statuser basert på en forespørsel
    if(ajax.readyState == 4 && ajax.status == 200) {
      if(ajax.responseText == "success"){ // hvis status er vellykket får brukeren en tilbakemelding
        ("myform").innerHTML = '<h2>Thanks '+("name").value+', your message has been sent.</h2>'; 
      } else {
        ("status").innerHTML = ajax.responseText;  // hvis ikke får man feilmelding
        ("mybtn").disabled = false; //deaktiverer submit
      }
    }
  }

  ajax.send(formdata); // Sender request til database
}
</script>

<!-- ---------------------------------------------------------------------------------------------------- 

----------------------------------------------------------------------------------------------------- -->
