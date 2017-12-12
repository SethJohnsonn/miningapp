<?php include './sharedlayout/header.php';
session_start();
      include './sharedlayout/navbar.php';

?>
  <div class="page-header" filter-color="orange">
    <div class="page-header-image" style="background-image:url(../assets/img/login.jpg)"></div>
    <div class="container">
        <div class="col-md-4 content-center">
            <div class="card card-login card-plain">
                <form class="form" method="post" action="authenticate.php">
                    <div class="header header-primary text-center">
                        <div class="logo-container">
                            <img src="/assets/img/now-logo.png" alt="">
                        </div>
                    </div><br>
                    <?php
                    $error = 0;
                    $error = $_GET['error'];
                    if($error == 1)
                      echo '<div class="alert alert-danger" role="alert">
                    	<div class="container">
                    		<div class="alert-icon">
                    			<i class="now-ui-icons objects_support-17"></i>
                    		</div>
                    		<strong>Oh snap!</strong> Change a few things up and try submitting again.
                    		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    			<span aria-hidden="true">
                    				<i class="now-ui-icons ui-1_simple-remove"></i>
                    			</span>
                    		</button>
                    	</div>
                    </div>';
                    elseif ($error == 2)
                      echo "You must log in first.";
                    	elseif ($error == 3)
                    	  echo '<div class="alert alert-danger" role="alert">
                    	<div class="container">
                    		<div class="alert-icon">
                    			<i class="now-ui-icons objects_support-17"></i>
                    		</div>
                    		<strong>Oh snap!</strong> Change a few things up and try submitting again.
                    		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    			<span aria-hidden="true">
                    				<i class="now-ui-icons ui-1_simple-remove"></i>
                    			</span>
                    		</button>
                    	</div>
                    </div>';
                    ?>
                    <div class="content">
                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons users_circle-08"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Email" name="Email">
                        </div>
                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons text_caps-small"></i>
                            </span>
                            <input type="password" placeholder="Password" class="form-control" name="Password" />
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Login</a>
                    </div>
                    <div class="pull-left">
                        <h6>
                            Not Signed Up?
                        </h6>
                    </div>
                    <div class="pull-right">
                        <h6>
                            <a href="/createAccount.php" class="link">Create Account</a>
                        </h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
<?php

?>
<?php include './sharedlayout/footer.php';?>
