<?php include './sharedlayout/header.php';
session_start();
      include './sharedlayout/navbar.php';

require 'dbclass.php';
$res = DB::get()->prepare('SELECT COUNT(*) FROM pricing');
$res->execute();
$num_rows = $res->fetchColumn();
$sql = "SELECT Basic, Advanced, Professional FROM pricing";
$result = DB::get()->prepare($sql);
$result = DB::get()->query($sql);
if($num_rows > 0){
    while($row = $result->fetch()){
      $basic = $row['Basic'];
      $advanced = $row['Advanced'];
      $professional = $row['Professional'];
    }
    $result = null;
}

$res = DB::get()->prepare('SELECT COUNT(*) FROM hashes');
$res->execute();
$num_rows = $res->fetchColumn();
$sql = "SELECT Basic, Advanced, Professional FROM hashes";
$result = DB::get()->prepare($sql);
$result = DB::get()->query($sql);
if($num_rows > 0){
    while($row = $result->fetch()){
      $small = $row['Basic'];
      $medium = $row['Advanced'];
      $large = $row['Professional'];
    }
    $result = null;
}

?>
<body class="section">
  <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-4">
            <div class="card" data-background-color="orange">
              <form class="form" method="post" name="basic" action="">
                <div class="header text-center">
                  <h4 class="title title-up">Basic</h4><hr>
                  <div class="card-body">
                    <h6 class="title">For Minimalists</h6>
                      <h3 class="title" id="price" name="price">$<?php echo $basic ?></h3>
                      <hr>
                      <h4 class="title" id="hashes" name="hashes"><?php echo $small ?> H/S</h3>
                      <hr>
                      <p class="">No Contract</p>
                      <p class="">No Maintenance Fee</p>
                      <br>
                      <a href="buyPower.php" class="btn btn-warning" type="button">Buy Now!</a>
                      <br>
                      <button class="btn btn-default" type="button">Details</button>
                  </div>
               </div>
            </form>
          </div>
        </div>
          <div class="col-md-4">
              <div class="card" data-background-color="orange">
                <form class="form" method="post" name="advanced" action="checkSignup()">
                  <div class="header text-center">
                    <h4 class="title title-up">Advanced</h4><hr>
                    <div class="card-body">
                      <h6 class="title">For Crypto Enthusiasts</h6>
                        <h3 class="title">$<?php echo $advanced ?></h3>
                        <hr>
                        <h4 class="title"><?php echo $medium ?> H/S</h3>
                        <hr>
                        <p class="">No Contract</p>
                        <p class="">No Maintenance Fee</p>
                        <br>
                        <a href="buyPower.php" class="btn btn-warning" type="button">Buy Now!</a>
                        <br>
                        <button class="btn btn-default" type="button">Details</button>
                    </div>
                 </div>
              </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" data-background-color="orange">
              <form class="form" method="post" name="pro" action="checkSignup()">
                <div class="header text-center">
                  <h4 class="title title-up">Pro</h4><hr>
                  <div class="card-body">
                    <h6 class="title">Max your Profit</h6>
                      <h3 class="title">$<?php echo $professional ?></h3>
                      <hr>
                      <h4 class="title"><?php echo $large ?> H/S</h3>
                      <hr>
                      <p class="">No Contract</p>
                      <p class="">No Maintenance Fee</p>
                      <br>
                      <a href="buyPower.php" class="btn btn-warning" type="button" onclick="buyPower.php">Buy Now!</a>
                      <br>
                      <button class="btn btn-default" type="button">Details</button>
                  </div>
               </div>
             </form>
            </div>
        </div>
    </div>
          </div>
</div>
</body>

<?php include './sharedlayout/footer.php'; ?>
