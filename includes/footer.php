<!----------------------------------------------------------------------------------------------------------------------------------------------

TIL INFORMASJON: 

I denne filen ligger det gjenbrukt og tilpasset kode som er funnet på linkene oppsummert under.
Dette vil også bli dokumentert under kildebruk i rapporten.  Grunnen til dette er basert på “best practice”  måter å programmere på.  
Vi har gjennom en rekke eksempler lært oss hvordan php språket fungerer. 

Vi ser først på en demo av hvordan et eksempel virker,  koder oss gjennom guiden for å lære hva som skjer. 
Etter dette gjør vi en vurdering om å bruke, tilpasse og implementer eksempelet i vår kode eller ikke. 

Linker til gjenbrukt kode:
https://www.w3schools.com/howto/howto_css_fixed_footer.asp 


------------------------------------------------------------------------------------------------------------------------------------------------>




<!-- ---------------------------------------------------------------------------------------------------- 
Footer
----------------------------------------------------------------------------------------------------- -->

<?php
  if (!empty($_SESSION)) {
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
              <!-- Call to action -->

            </div>
            <!-- Footer Elements -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
              <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
            </div>
            <!-- Copyright -->

          </footer>
          <!-- Footer -->';
  } else {

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
              <!-- Call to action -->

            </div>
            <!-- Footer Elements -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
              <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
            </div>
            <!-- Copyright -->

          </footer>
          <!-- Footer -->';
  }
?>		

<!-- ---------------------------------------------------------------------------------------------------- 
Footer
----------------------------------------------------------------------------------------------------- -->
