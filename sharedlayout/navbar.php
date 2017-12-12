<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-primary " color-on-scroll="400">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="/index.php" rel="tooltip" title="Home" data-placement="bottom">
               Mining App
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/pricing.php">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        <p>Pricing</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about.php">
                        <i class="now-ui-icons files_paper"></i>
                        <p>About</p>
                    </a>
                </li>
                <?php
                if(isset($_SESSION['validated']) !="")
                  {
                    echo'
                            <li class="nav-item">
                                <a class="nav-link btn btn-neutral" href="/client.php">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    <p>My Account</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-neutral" href="/logout.php">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    <p>Logout</p>
                                </a>
                            </li>';
                  }
                  else{
                    echo '   <li class="nav-item">
                              <a class="nav-link btn btn-neutral" href="/createAccount.php">
                                  <i class="fa fa-sign-in" aria-hidden="true"></i>
                                  <p>Sign Up</p>
                              </a>
                          </li>
                          <li class="nav-item">
                                    <a class="nav-link btn btn-neutral" href="/login.php">
                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                        <p>Log In</p>
                                    </a>
                                </li>';
                  }
                    ?>
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="#" target="_blank">
                        <i class="fa fa-twitter"></i>
                        <p class="d-lg-none d-xl-none">Twitter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="#" target="_blank">
                        <i class="fa fa-facebook-square"></i>
                        <p class="d-lg-none d-xl-none">Facebook</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="#" target="_blank">
                        <i class="fa fa-instagram"></i>
                        <p class="d-lg-none d-xl-none">Instagram</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
