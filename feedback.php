  
<!----------------------------------------------------------------------------------------------------------------------------------------------
TIL INFORMASJON: 
I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under.
Dette vil også bli dokumentert under kildebruk i rapporten.  Grunnen til dette er basert på “best practice”  måter å programmere på.  
Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer. 
Vi ser først på en demo av hvordan et eksempel virker,  koder oss gjennom guiden for å lære hva som skjer. 
Etter dette gjør vi en vurdering om å bruke, tilpasse og implementer eksempelet i vår kode eller ikke. 
Kilde: http://www.openjs.com/ajax/tutorial/ajax.php
------------------------------------------------------------------------------------------------------------------------------------------------> 


<!DOCTYPE html>
<html>
<?php
session_start();
include('includes/navbar.php');
include('includes/header.php');
?>

<title>Feedback</title>


<body>
			
	<div class="fdwrapper">				

			<form id="my_form" onsubmit="return submitForm();">
			  <p><input id="name" placeholder="Navn" required class=""></p>
			  <p><input id="email" placeholder="E-mail" type="email" class="" required></p>
			  <p><input id="subject" placeholder="Emne" type="subject"></p>
			  <textarea id="message" placeholder="skriv inn melding" rows="10" class="" required ></textarea>
			  <input class="fdsendBtn"id="mybtn" type="submit" name="submitbtn" value="Submit"> <span id="status"></span>
			</form>	
			<input class="fdbackBtn" type="submit" align="right" value="Cancel" onclick="document.location = 'index.php'">
	</div>  


</body>




<!-- ---------------------------------------------------------------------------------------------------- 
Footer
----------------------------------------------------------------------------------------------------- -->

<?php include('includes/footer.php');?>

<!-- ---------------------------------------------------------------------------------------------------- 
Footer
----------------------------------------------------------------------------------------------------- -->

</html>

<!-- ---------------------------------------------------------------------------------------------------- 

----------------------------------------------------------------------------------------------------- -->

<script>

		function _(id){ return document.getElementById(id); }
		function submitForm(){
			_("mybtn").disabled = true; // sånn at brukeren ikke kan sende dataen mange ganger
			_("status").innerHTML = 'please wait ...'; // en tilbakemelding opp at dataen blir sendt
			var formdata = new FormData(); //et objekt, sånn at man kan tilkoble til en ny nøkkelparverdi
			formdata.append( "name", _("name").value ); // nøkkel og verdi
			formdata.append( "email", _("email").value ); // nøkkel og verdi
			formdata.append( "message", _("message").value ); // nøkkel og verdi
			formdata.append( "subject", _("subject").value ); // nøkkel og verdi
			var ajax = new XMLHttpRequest(); // lager en variabel
			ajax.open( "POST", "feedbackinsert.php" ); // lager en metode 
			ajax.onreadystatechange = function() { // etter den er klar så starter den funksjonen
				if(ajax.readyState == 4 && ajax.status == 200) {
					if(ajax.responseText == "success"){
						_("my_form").innerHTML = '<h2>Thanks '+_("name").value+', your message has been sent.</h2>';  // hvis alt går, så har dataen fra skjemaet blitt sendt til databasen 
					} else {
						_("status").innerHTML = ajax.responseText; // hvis det er en feil, så får man opp en responsetext. 
						_("mybtn").disabled = false; // denne gjør sånn at man kan trykke på submit knappen igjen
					}
				}
			}
			ajax.send( formdata ); // lager en metode der man sender (fromdata) som er name, email og message
		}
</script>

<!-- ---------------------------------------------------------------------------------------------------- 

----------------------------------------------------------------------------------------------------- -->