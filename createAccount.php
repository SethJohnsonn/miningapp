<?php include './sharedlayout/header.php';
      session_start();
      include './sharedlayout/navbar.php';
?>

  <div class="page-header" filter-color="orange">
    <div class="page-header-image" style="background-image:url(../assets/img/login.jpg)"></div>
    <div class="container">
        <div class="col-md-4 content-center">
            <div class="card card-login card-plain">
                <form class="form" method="post" action="insertCustomer.php">
                    <div class="header header-primary text-center">
                        <div class="logo-container">
                            <img src="/assets/img/now-logo.png" alt="">
                        </div>
                    </div><br>
                    <div class="content">
                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons users_circle-08"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="First Name" name="fname">
                        </div>
                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons text_caps-small"></i>
                            </span>
                            <input type="text" placeholder="LastName" class="form-control" name="lname" />
                        </div>
                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                              <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            </span>
                            <input type="text" placeholder="Email" class="form-control" name="email" />
                        </div>
                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                              <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                            <input type="password" placeholder="Password" class="form-control" name="Password" />
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Create Account</a>
                    </div>
                    <div class="pull-left">
                        <h6>
                            Already have an account?
                        </h6>
                    </div>
                    <div class="pull-right">
                        <h6>
                            <a href="/login.php" class="link">Sign In</a>
                        </h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>

<?php include './sharedlayout/footer.php'; ?>
