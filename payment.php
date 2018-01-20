<?php
session_start();
if($_SESSION['validated'] != ''){

require "boot.php";
require "dbclass.php";
include './sharedlayout/clientHeader.php';
#include './sharedlayout/clientNav.php';

$Email = $_SESSION['Email'];
$sqlCount ="SELECT COUNT(Email) FROM customers where Email ='$Email'";
$res = DB::get()->prepare($sqlCount);
$res->execute();
$num_rows = $res->fetchColumn();
$sql = "SELECT * FROM customers where Email='$Email'";
$results = DB::get()->prepare($sql);
$results = DB::get()->query($sql);
if ($num_rows > 0){
  while($row = $results->fetch())
  {
    $CustomerID=$row['ID'];
    $FirstName=$row['FirstName'];
    $LastName=$row['LastName'];
    $wallet=$row['Wallet'];
  }
  $results=null;

}

if (empty($_POST['payment_method_nonce'])) {
    header('location: index.php?status=3');
}

#$result = Braintree_PaymentMethod::create([
#  'customerId' => $CustomerID,
#  'paymentMethodNonce' => $_POST['payment_method_nonce'],
#  'options' => [
#    'verifyCard' => true,
#    'verificationAmount' => '1.00',
#  ]
#]);


$result = Braintree_Transaction::sale([
  'amount' => $_POST['amount'],
  'paymentMethodNonce' => $_POST['payment_method_nonce'],
  'customer' => [
    'firstName' => $_POST['firstName'],
    'lastName' => $_POST['lastName'],
#    'email' => $Email,
#    'address' => $_POST['address'],  <-- ADD LATER FOR VAULTING
#    'zip' => $_POST['zip'],
#    'phoneNumber' => $_POST['phoneNumber'],
  ],
  'options' => [
#    'verifyCard' => true,
#    'verificationAmount' => '1.00',
    'submitForSettlement' => true,
    'storeInVaultOnSuccess' => true,
  ]
]);

$result->success;

$verification = $result->creditCardVerification;
$verification->status;
// "processor_declined"

$verification->processorResponseCode;
// "2000"

$verification->processorResponseText;
// "Do Not Honor"



if ($result->success === true) {

} else
{
    print_r($result->errors);
    die();
}

?>

<body>
  <div class="wrapper">
  <div class="main-panel">
    <div class="row">
    <table class="table">
      <tr>
        <td>
          <div class="col-md-6">
          <form class="payment-form" action="confirmedPayment.php" method="post">


                <input type="hidden"  readonly="readonly" name="CustomerID" id="CustomerID" value="<?php echo $CustomerID;?>"><br><br>


                <input type="hidden" readonly="readonly" name="OrderDetail" id="OrderDetail" value="<?php echo $FirstName;?>"><br><br>

                <label for="BTConfimNumber" class="heading">Transaction ID</label><br>
                <input type="text" readonly="readonly" name="BTConfimNumber" id="BTConfimNumber" value="<?php echo $result->transaction->id ;?>"><br><br>

                <label for="BillingFirstName" class="heading">Billing First Name</label><br>
                <input type="text" readonly="readonly"name="BillingFirstName" id="BillingFirstName" value="<?php echo $result->transaction->customer['firstName'] ;?>"><br><br>

                <label for="BillingLastName" class="heading">Billing Last Name</label><br>
                <input type="text" readonly="readonly" name="BillingLastName" id="BillingLastName" value="<?php echo $result->transaction->customer['lastName'] ;?>"><br><br>

                <label for="FirstName" class="heading">Account First Name</label><br>
                <input type="text" disabled="disabled" name="FirstName" id="FirstName" value="<?php echo $FirstName?>"><br><br>

                <label for="lastName" class="heading">Account Last Name</label><br>
                <input type="text" disabled="disabled" name="LastName" id="LastName" value="<?php echo $LastName?>"><br><br>

                <label for="Total" class="heading">Amount (USD)</label><br>
                <input type="text" readonly="readonly" name="Total" id="Total" value="<?php echo $result->transaction->amount ." " . $result->transaction->currencyIsoCode ;?>"><br><br>
              </form>
                    </div>
    </td>
    <td>
      <div class="col-md-6">
        <div class="card">
          <p>Thank you for your order! Your order was placed successfully and your transaction details are on the right. Please select the FINISH button to complete
          ordering process. NOTE: DO NOT PRESS YOUR BROWSER'S BACK BUTTON AT THIS TIME. IT IS IMPORTANT YOU PRESS FINISH.</p>
          <p>You can always review your orders by navigating to the account orders page.</p>
          <a href="client.php">return home</a>
        </div>
      </div>
    </td>

  </table>
    </div>
  </div>
</div>
      </body>
<?php
}
else {
	header("Location: login.php?error=2");
} ?>
