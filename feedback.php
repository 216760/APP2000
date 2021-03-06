<?php
/*****************************************************************************************************************
* TIL INFORMASJON:										                 *																		  
* 													         *
* I denne filen ligger det tilpasset kode som er funnet på linkene nedenfor					 *	
* Dette er også dokumentert under "Kommentarer til kildebruk" i rapporten og markert i selve koden.              *
* Grunnen til dette er basert på “best practice”  måter å programmere på.  					 *
* Vi har gjennom en rekke eksempler via dokumenterte kilder lært oss hvordan ajax teknikken fungerer. 		 *
*														 *
* Kilder: 												         *
* http://www.openjs.com/ajax/tutorial/ajax.php 									 *
* https://developer.mozilla.org/en-US/docs/Web/API/FormData/append				                 * 
* https://www.w3schools.com/js/js_ajax_http.asp									 *
* https://www.w3schools.com/js/js_ajax_http_send.asp								 * 
* https://www.w3schools.com/js/js_ajax_http_response.asp							 * 
* https://www.w3schools.com/js/js_ajax_xmlfile.asp								 *
* https://www.w3schools.com/js/js_ajax_php.asp									 *
* https://www.w3schools.com/js/js_ajax_asp.asp									 *
* https://www.w3schools.com/js/js_ajax_database.asp								 *
* https://www.w3schools.com/js/js_ajax_applications.asp								 *
* https://www.w3schools.com/js/js_ajax_examples.asp    							         *
* https://www.w3schools.com/jsref/prop_pushbutton_disabled.asp							 *
* https://www.w3schools.com/jsref/prop_html_innerhtml.asp							 * 
* https://drive.google.com/file/d/1WM7zpPmlS7JFFfdn6PfsdxlT2iS5zOSF/view					 * 
* https://www.youtube.com/watch?v=cgvDMUrQ3vA									 * 
* https://getbootstrap.com/docs/4.3/components/card/								 * 
* https://getbootstrap.com/docs/4.3/utilities/spacing/#horizontal-centering					 * 
* https://getbootstrap.com/docs/4.3/components/forms/								 * 
* https://www.youtube.com/playlist?list=PL0eyrZgxdwhyeIDc3EA4XGsI9HoWLc6nF					 * 
* 	 													 * 
* Vi har med vilje laget informasjonsboksene i koden med ulike størrelser 					 * 
* for å kunne skille dem fra hverandre. 								         *				
*														 *
* Kodet og tilpasset av Henrik Solnør Johansen, Vigleik Espeland Stakseng, Anders Koo og Andreas Knutsen 	 *
*														 *
******************************************************************************************************************/

include('lang-config.php'); // Inkluderer oppsett for flere språk
session_start();			// Gjenopptar session


$id = $_SESSION["id"]; 
if(!isset($_SESSION['id'])){ // Hvis session ikke er satt blir brukeren 
	header('Location:login.php'); //videresendt til login.php
}

?>

<!DOCTYPE html>
<html>

	<?php
	include('includes/header.php'); // Inkluderer header.php
	?>

	<body>

		<!-- ---------------------------------------------------------------------------------------------------- -->
		<!-- Lager en form med fire inputs: name, email, subject og textarea. 					  -->
		<!-- Dette blir sendt når alle feltene har innhold og bruker trykker på "submit". 			  -->
		<!-- For at et form skal sendes må man ha en id som kobler (my_form)-formen sammen med scriptet nedenfor. -->
		<!-- "mybtn" setter igang prosessen med å sende formen. 						  -->
		<!-- Den andre knappen returnerer brukeren til dashbordet.						  -->
		<!-- ---------------------------------------------------------------------------------------------------- -->
		
		<?php
		include('includes/navbar.php'); // Inkluderer navbar.php
		?>
			

		<div class="content-dashboard">
      		<div class="container">
        		<div class="row justify-content-center">

<!-- -------------------------------------------------------------------------------------------------------------------- -->
<!-- START 														  -->
<!-- Oppsett av feeback skjema er gjort ved hjelp av disse lenkene:							  -->
<!-- https://getbootstrap.com/docs/4.3/components/card/								    	  --> 
<!-- https://getbootstrap.com/docs/4.3/utilities/spacing/#horizontal-centering						  -->
<!-- https://getbootstrap.com/docs/4.3/components/forms/								  -->
<!-- -------------------------------------------------------------------------------------------------------------------- -->

		            <div class="card shadow mx-auto" style="width: 25rem;">
            								     <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
              			<div class="card-header"><?php echo $lang_text['feedback-title']; ?></div>
	    				<form id="my_form" onsubmit="return submitForm();">
							<div class="form-group col-lg-12">
															  <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
								<input id="name" placeholder="<?php echo $lang_input['feedback-input-name']; ?>" required class="form-control">
							</div>
							<div class="form-group col-lg-12">
															   <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
								<input id="email" placeholder="<?php echo $lang_input['feedback-input-email']; ?>" type="email" class="form-control" required>
							</div>
							<div class="form-group col-lg-12">
																 <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
								<input id="subject" placeholder="<?php echo $lang_input['feedback-input-subject']; ?>" type="subject" class="form-control">
							</div>
							<div class="form-group col-lg-12">
								                                                         <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
								<textarea class="form-control" id="message" placeholder="<?php echo $lang_input['feedback-input-message']; ?>" rows="5" class="form-control" required ></textarea>
							</div>
							<div class="form-group col-lg-12">
																																	<!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
								<button class="btn btn-primary" id="mybtn" type="submit" name="submitbtn"><span id="status"></span><?php echo $lang_button['submitbtn']; ?></button>
																																		  <!-- Henter verdi fra et php-array(en.php/no.php) basert på verdien til $_SESSION['lang'] -->
								<button class="btn btn-primary" type="submit" align="right" onclick="document.location = 'dashboard.php'"><?php echo $lang_button['cancelbtn']; ?></button>
							</div>
						</form>	 
					</div>

<!-- -------------------------------------------------------------------------------------------------------------------- -->
<!-- STOPP 														  -->
<!-- Oppsett av feeback skjema er gjort ved hjelp av disse lenkene:							  -->
<!-- https://getbootstrap.com/docs/4.3/components/card/									  --> 
<!-- https://getbootstrap.com/docs/4.3/utilities/spacing/#horizontal-centering						  -->
<!-- https://getbootstrap.com/docs/4.3/components/forms/								  -->
<!-- -------------------------------------------------------------------------------------------------------------------- -->

				</div>
			</div>
		</div>

		<!-- ---------------------------------------------------------------------------------------------------- 
		Footer START
		----------------------------------------------------------------------------------------------------- -->

		<?php include('includes/footer.php'); // Inkluderer footer.php
		?> 

		<!-- ---------------------------------------------------------------------------------------------------- 
		Footer STOPP
		----------------------------------------------------------------------------------------------------- -->

	</body>



	<?php
	include('includes/scripts.php'); // Inkluderer scripts.php
	?>


</html>

			<!-- ------------------------------------------------------------------------------------------------ -->
			<!-- START 											      -->
			<!-- For å sette opp AJAX med feedback skjema har vi funnet på navnet på funksjonene _() 	      -->
			<!-- og submitForm(), men koden på innsiden er laget basert på disse kildene:			      -->
			<!--												      --> 
			<!-- Kilder: 											      -->
			<!--	http://www.openjs.com/ajax/tutorial/ajax.php 						      -->			 
			<!--	https://developer.mozilla.org/en-US/docs/Web/API/FormData/append			      -->		 
			<!--    https://www.w3schools.com/js/js_ajax_http.asp						      -->				
			<!--	https://www.w3schools.com/js/js_ajax_http_send.asp					      -->			 
			<!--	https://www.w3schools.com/js/js_ajax_http_response.asp					      -->				 
			<!--	https://www.w3schools.com/js/js_ajax_xmlfile.asp					      -->					 
			<!--	https://www.w3schools.com/js/js_ajax_php.asp						      -->					
			<!--	https://www.w3schools.com/js/js_ajax_asp.asp						      -->					
			<!--	https://www.w3schools.com/js/js_ajax_database.asp					      -->					 
			<!--	https://www.w3schools.com/js/js_ajax_applications.asp					      -->					
			<!--	https://www.w3schools.com/js/js_ajax_examples.asp    					      -->				
			<!--	https://www.w3schools.com/jsref/prop_pushbutton_disabled.asp				      -->					
			<!--	https://www.w3schools.com/jsref/prop_html_innerhtml.asp					      -->				
			<!--	https://drive.google.com/file/d/1WM7zpPmlS7JFFfdn6PfsdxlT2iS5zOSF/view			      -->			 
			<!--	https://www.youtube.com/watch?v=cgvDMUrQ3vA						      -->				
			<!--	https://getbootstrap.com/docs/4.3/components/card/					      -->			 
			<!--	https://getbootstrap.com/docs/4.3/utilities/spacing/#horizontal-centering		      -->				 	 
			<!--	https://getbootstrap.com/docs/4.3/components/forms/					      -->	
			<!--	https://www.youtube.com/playlist?list=PL0eyrZgxdwhyeIDc3EA4XGsI9HoWLc6nF		      -->
			<!--    https://www.w3schools.com/js/js_ajax_http_send.asp 		  			      --> 
			<!-- ------------------------------------------------------------------------------------------------ -->
			     

<script>
			//***********************************************************//
			// START 						     //
			// Kode tilpasset og basert på kilder angitt over.	     // 
			//							     //
			// Medlemmer som har bidratt Henrik Solnør Johansen          //
			//***********************************************************//

		function _(id){ return document.getElementById(id); } // funksjon som returnerer alle id'ene i skjema
		// Dette er en funksjon som samler inn data fra feedback skjema ovenfor
		function submitForm(){
			// Kaller på _funksjon, deretter blir disabled funksjonen kalt på som gjør at brukeren ikke kan sende data flere ganger
			_("mybtn").disabled = true; 
			// Kaller på _funksjon, deretter blir innerHTML metoden i document objektet kalt på som gjør at du kan sette inn tekst
			_("status").innerHTML = 'please wait ...'; 


			// ------------------------------------------------------------------------------------------------------------ //
			// START                                                                                                        //
			// Denne delen er hentet fra og tilpasset egen løsning via kilden under					        //
			//														//
			// kilde: https://developer.mozilla.org/en-US/docs/Web/API/FormData/append                                	//	
			//                                                                                                              //					
			// ------------------------------------------------------------------------------------------------------------ //
			
			
			//variabel som initialiserer FormData objektet
			var formdata = new FormData(); 
			//append er en metode som henter verdier fra de id'en name skjema via _funksjon
			formdata.append( "name", _("name").value );
			//append er en metode som henter verdier fra de id'en email skjema _funksjon
			formdata.append( "email", _("email").value ); 
			//append er en metode som henter verdier fra de id'en message skjema _funksjon
			formdata.append( "message", _("message").value ); 
			//append er en metode som henter verdier fra de id'en subjekt i skjema _funksjon
			formdata.append( "subject", _("subject").value ); 

			// ------------------------------------------------------------------------------------------------------------ //
			// STOPP                                                                                                        //
			// Denne delen er hentet fra og tilpasset egen løsning via kilden under						//
			//														//
			// kilde: https://developer.mozilla.org/en-US/docs/Web/API/FormData/append                                	//	
			//                                                                                                              //					
			// ------------------------------------------------------------------------------------------------------------ //


			// ------------------------------------------------------------------------------------------------------------ //
			// START                                                                                                        //
			// Denne delen er hentet fra og tilpasset til egen løsning  							//
			// Kilde:													//
			// https://www.w3schools.com/js/js_ajax_http_send.asp   							//
			// https://www.w3schools.com/js/js_ajax_http_response.asp                                          	        //
			// https://www.w3schools.com/js/js_ajax_php.asp									//
			// https://www.w3schools.com/js/js_ajax_http.asp							        //
			//													        //
			// ------------------------------------------------------------------------------------------------------------ //


			// denne lager et nytt XMLHttpRequest objekt, denne variabelen gjør at man kan oppdatere siden uten å laste inn siden på nytt
			var ajax = new XMLHttpRequest(); // ajax variabel initialiserer XMLHttpRequest objektet
			// open er en metode fra XMLHttpRequest objektet som sender en POST forespørsel til feedbackinsert.php
			ajax.open( "POST", "feedbackinsert.php" ); 
			// onreadystatechange er en metode med en anonym funksjon som behandler forskjellige typer statuser basert på en forespørsel
			ajax.onreadystatechange = function() { 
				if(ajax.readyState == 4 && ajax.status == 200) {
					if(ajax.responseText == "success"){ // hvis status er vellykket får brukeren en tilbakemelding
						_("my_form").innerHTML = '<h2>Thanks '+_("name").value+', Feedback has been sent.</h2>';  
					} else {
						// hvis ikke får man feilmelding
						_("status").innerHTML = ajax.responseText; 
						//deaktiverer submit
						_("mybtn").disabled = false; 
					}
				}
			}
			// Sender request til database
			ajax.send( formdata ); 
		}

			// ------------------------------------------------------------------------------------------------------------ //
			// STOPP                                                                                                        //
			// Denne delen er hentet fra og tilpasset til egen løsning  						        //
			// https://www.w3schools.com/js/js_ajax_http_send.asp   						        //
			// https://www.w3schools.com/js/js_ajax_http_response.asp                                          	        //
			// https://www.w3schools.com/js/js_ajax_php.asp									//
			// https://www.w3schools.com/js/js_ajax_http.asp								//
			// https://www.w3schools.com/js/js_ajax_asp.asp	// 								//
			//														//
			// ------------------------------------------------------------------------------------------------------------ //


			// -------------------------------------------------------- //
			// STOPP 						    //
			// Kode tilpasset og basert på kilder angitt under          // 
			//						            //
			// Medlemmer som har bidratt Henrik Solnør Johansen	    //
			// -------------------------------------------------------- //


			// ------------------------------------------------------------------------------------------------------------ //
			// STOPP                                                                                                        //
			// For å sette opp AJAX med feedback skjema har vi funnet på navnet på funksjonene _() 			      	//
			// og submitForm(), men koden på innsiden er laget basert på disse kildene:				   	//
			//														//
			// Kilder:													//
			// http://www.openjs.com/ajax/tutorial/ajax.php 								//
			// https://developer.mozilla.org/en-US/docs/Web/API/FormData/append						//
			// https://www.w3schools.com/js/js_ajax_http.asp								//
			// https://www.w3schools.com/js/js_ajax_http_send.asp								//
			// https://www.w3schools.com/js/js_ajax_http_response.asp							//
			// https://www.w3schools.com/js/js_ajax_xmlfile.asp								//
			// https://www.w3schools.com/js/js_ajax_php.asp									//
			// https://www.w3schools.com/js/js_ajax_asp.asp									//
			// https://www.w3schools.com/js/js_ajax_database.asp								//
			// https://www.w3schools.com/js/js_ajax_applications.asp							//
			// https://www.w3schools.com/js/js_ajax_examples.asp                             	    			//
			// https://www.w3schools.com/jsref/prop_pushbutton_disabled.asp                                			//
			// https://www.w3schools.com/jsref/prop_html_innerhtml.asp							//
			// https://drive.google.com/file/d/1WM7zpPmlS7JFFfdn6PfsdxlT2iS5zOSF/view				        //	 
			// https://www.youtube.com/watch?v=cgvDMUrQ3vA									//	
			// https://getbootstrap.com/docs/4.3/components/card/								//	 
			// https://getbootstrap.com/docs/4.3/utilities/spacing/#horizontal-centering					//	 	 
			// https://getbootstrap.com/docs/4.3/components/forms/								//
			// https://www.youtube.com/playlist?list=PL0eyrZgxdwhyeIDc3EA4XGsI9HoWLc6nF				        //
			// ------------------------------------------------------------------------------------------------------------ //





</script>
