<?php
session_start();
include 'dbclass.php';
if($_SESSION['validated'] != ''){

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
		$wallet = $row['wallet'];
  }
  $results=null;
}
include "./sharedlayout/clientHeader.php";
?>
<body>
  	<?php include "./sharedlayout/clientNav.php"; ?>
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="card card-user">
                        <div class="content">
                              <br><br><br>
                              <h4 class="title"><?php echo $FirstName. ' ' .$LastName ?><br />
                              </h4>

                        </div>
                        <hr>
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <h5>12<br /><small>Files</small></h5>
                                </div>
                                <div class="col-md-4">
                                    <h5>2GB<br /><small>Used</small></h5>
                                </div>
                                <div class="col-md-3">
                                    <h5>24,6$<br /><small>Spent</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>


                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Profile</h4>
                        </div>
                        <div class="content">
                            <form>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Company</label>
                                            <input type="text" class="form-control border-input" disabled placeholder="Company" value="Creative Code Inc.">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control border-input" placeholder="Username" value="michael23">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control border-input" placeholder="Email">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Company" value="Chet">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control border-input" placeholder="Last Name" value="Faker">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control border-input" placeholder="Home Address" value="Melbourne, Australia">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control border-input" placeholder="City" value="Melbourne">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" class="form-control border-input" placeholder="Country" value="Australia">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input type="number" class="form-control border-input" placeholder="ZIP Code">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
  </body>

<?php include "./sharedlayout/clientFooter.php";
}
else {
	header("Location: login.php?error=2");
}
?>
