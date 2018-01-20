<?php
session_start();
include 'dbclass.php';

if($_SESSION['validated'] != ''){

 include "./sharedlayout/clientHeader.php";

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

 <body>

 <div class="wrapper">
 	<?php include "./sharedlayout/clientNav.php"; ?>
  <div class="container"><br><br>
      <div class="row justify-content-md-center">
        <div class="col-md-3">
            <div class="card" data-background-color="orange">
              <form class="form" method="post" name="basic" action="checkout.php?price=<?php echo $basic?>&hashes=<?php echo $small?>">
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
                      <button class="btn btn-success" type="submit" onclick="">Buy Now!</button>
                      <br>
                  </div>
               </div>
            </form>
          </div>
        </div>
      <div class="col-md-3">
          <div class="card" data-background-color="orange">
            <form class="form" method="post" name="advanced" action="checkout.php?price=<?php echo $advanced?>&hashes=<?php echo $medium?>">
              <div class="header text-center">
                <h4 class="title title-up">Advanced</h4><hr>
                <div class="card-body">
                  <h6 class="title">For Crypto Enthusiasts</h6>
                    <h3 class="title" name="price">$<?php echo $advanced ?></h3>
                    <hr>
                    <h4 class="title" name="hashes"><?php echo $medium ?> H/S</h3>
                    <hr>
                    <p class="">No Contract</p>
                    <p class="">No Maintenance Fee</p>
                    <br>
                    <button class="btn btn-success" type="submit">Buy Now!</button>
                    <br>
                </div>
             </div>
          </form>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" data-background-color="orange">
          <form class="form" method="post" name="pro" action="checkout.php?price=<?php echo $professional?>&hashes=<?php echo $large?>">
            <div class="header text-center">
              <h4 class="title title-up">Pro</h4><hr>
              <div class="card-body">
                <h6 class="title">Max your Profit</h6>
                  <h3 class="title" name="price">$<?php echo $professional ?></h3>
                  <hr>
                  <h4 class="title" name="hashes"><?php echo $large ?> H/S</h3>
                  <hr>
                  <p class="">No Contract</p>
                  <p class="">No Maintenance Fee</p>
                  <br>
                  <button class="btn btn-success" type="submit">Buy Now!</button>
                  <br>
              </div>
           </div>
         </form>
        </div>
    </div>
  </div>
</div>
</div>

<?php include "./sharedlayout/clientFooter.php";
}
else {
	header("Location: login.php?error=2");
}
?>
