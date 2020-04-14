<!--  Kodet tilpasset av Andreas Kntusen start -->

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


          </footer>
          <!-- Footer -->';
  }
?>		
<!--  Kodet tilpasset av Andreas Kntusen topp -->
