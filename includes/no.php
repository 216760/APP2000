<!---------------------------------------------------------------------------------------------------------------->
<!-- TIL INFORMASON:																						    -->
<!-- I denne filen ligger det kode som er hentet og tilpasset egen løsning fra kildene nedenfor.		        -->
<!-- Dette er også dokumentert under kildebruk i rapporten og markert i selve koden. 					        -->
<!-- Grunnen til dette er basert på “best practice”  måter å programmere på.  							        -->
<!-- Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer. 							        -->
<!-- Vi ser først på en demo av hvordan et eksempel virker, koder oss gjennom guiden for å lære hva som skjer.  -->
<!-- Etter dette gjør vi en vurdering om å bruke, tilpasse og implementere eksempelet i vår kode eller ikke.    -->
<!--                                                                                                            -->
<!-- Kilde:                                                                                                     -->
<!--    https://www.youtube.com/watch?v=cgvDMUrQ3vA                                                             -->
<!--    https://drive.google.com/file/d/1WM7zpPmlS7JFFfdn6PfsdxlT2iS5zOSF/view                                  -->       
<!--  											                                                                -->
<!---------------------------------------------------------------------------------------------------------------->

<!-------------------------------------------------------------------------------------------------------------------------->
<!-- START 																								  				  -->
<!-- For å sette opp muligheter for både norsk og engelsk opppset av vi hentet kode og tilpasset fra Youtube kanalen	  -->
<!-- Coding Passive Income: https://www.youtube.com/watch?v=cgvDMUrQ3vA													  -->
<!-------------------------------------------------------------------------------------------------------------------------->	

<!-------------------------------------------------------------------------------------------------------------------------->
<!-- Oppretter arrays for de forskjellige elementene som trenger å bli oversatt mellom norsk/engelsk                      -->
<!-- Coding Passive Income: https://www.youtube.com/watch?v=cgvDMUrQ3vA                                                   -->
<!-------------------------------------------------------------------------------------------------------------------------->
<?php
    $lang_button = array(
        "editbtn"    => "Rediger",
        "deletebtn" => "Slett",
        "savebtn"    => "Lagre",
        "closebtn"    => "Lukk",
        "cancelbtn"    => "Avbryt",
        "updatebtn"    => "Oppdater",
        "submitbtn"    => "Send",
        "loginbtn"  => "Logg inn",
        "registerbtn" => "Registrer",
        "subscriptionbtn" => "Legg til et nytt abonnement"
    );
    $lang_input = array(
        "input-username" => "Skriv inn ditt brukernavn...",
        "input-email" => "Skriv inn din e-mail...",
        "input-password" => "Skriv inn ditt password...",
        "feedback-input-name" => "Navn",
        "feedback-input-email" => "E-mail",
        "feedback-input-subject" => "Emne",
        "feedback-input-message" => "Melding"
    );
    $lang_text = array(
        "paragraph-right" => "Hold kontroll på prøveperiodene<br>dine med vår tjeneste",
        "paragraph-left" => "Unngå unødvendige månedlige<br>kostnader",
        "card-header" => "Legg til et nytt abonnement",
        "card-title" => "Tjeneste",
        "subscription-name" => "Navn på tjeneste",
        "edit-subscription" => "Endre abonnement",
        "card-start-date" => "Start dato",
        "card-end-date" => "Slutt dato",
        "feedback-title" => "Send en melding"
    );
?>
<!-- -------------------------------------------------------------------------------------------------------------------- -->
<!-- STOPP 																								  				  -->
<!-- For å sette opp muligheter for både norsk og engelsk opppset av vi hentet kode og tilpasset fra Youtube kanalen	  -->
<!-- Coding Passive Income: https://www.youtube.com/watch?v=cgvDMUrQ3vA													  -->
<!-- -------------------------------------------------------------------------------------------------------------------- -->	