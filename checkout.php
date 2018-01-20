<?php require 'dbclass.php';
session_start();
if($_SESSION['validated'] != ''){
include './sharedlayout/clientHeader.php';
include './sharedlayout/clientNav.php';
?>
<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- braintree -->
<script src="https://js.braintreegateway.com/js/braintree-2.31.0.min.js"></script>

<!-- setting up braintree -->
<script>
    $.ajax({
        url: "token.php",
        type: "get",
        dataType: "json",
        success: function (data) {
                braintree.setup(data,'dropin', { container: 'dropin-container'});
        }
    })
</script>

<?php
if(isset($_GET['price'])) {
$price = $_GET['price'];
$package = $_GET['hashes'];
}
else {
  $package = "There was an error. Contact the System Administrator";
  $price = "There was an error. Contact the System Administrator";
}
 ?>
<body>
  <div class="wrapper">
  <div class="main-panel"><br><br><br>
    <div class="container" align="center"><br>
    <a href="https://developers.braintreepayments.com/guides/credit-cards/testing-go-live/php" target="_blank">Fake Credit cards to use in sandbox</a>
          <form action="payment.php" method="post" class="payment-form">
              <p>Please input your payment information here and your order will be confirmed on the next page.
                 Please note we do NOT store payment information in our databases!</p>

              <label for="firstName" class="heading">First Name</label><br>
              <input type="text" name="firstName" id="firstName" required><br><br>

              <label for="lastName" class="heading">Last Name</label><br>
              <input type="text" name="lastName" id="lastName" required><br><br>

              <label for="amount" class="heading">Amount (USD)</label><br>
              <input type="text" align="center" name="amount" id="amount" value ="<?php echo $price ?>" readonly><br><br>

              <label for="package" class="heading">Your Hashes per Second Package</label><br>
              <input type="text" align="right" name="package" id="package" value ="<?php echo $package ?>" readonly><br><br>

              <div id="dropin-container"></div>
              <br><br>
              <button type="submit">Pay</button>

          </form>

        </div>
      </div>
    </div>
</body>

<?php include "./sharedlayout/clientFooter.php";
}
else {
	header("Location: login.php?error=2");
} ?>
