<?php include "./sharedlayout/clientHeader.php";
$balance = 0;
$balancearray = array();
$myUrl="t1StdxN1qZEcpJR9Qerm1iNaSoa4tRjjWGh";
$balance=file_get_contents("https://api.nanopool.org/v1/zec/balance/".$myUrl);
echo  $balance;
foreach ($variable as $key => $value) {
	# code...
}
?>
<body>

<div class="wrapper">
	<?php include "./sharedlayout/clientNav.php"; ?>

    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-4 col-sm-6">
                      <div class="card">
                          <div class="content">
                              <div class="row">
                                  <div class="col-xs-5">
                                      <div class="icon-big icon-warning text-center">
                                          <i class="ti-server"></i>
                                      </div>
                                  </div>
                                  <div class="col-xs-7">
                                      <div class="numbers">
                                          <p>Capacity</p>
                                          105GB
                                      </div>
                                  </div>
                              </div>
                              <div class="footer">
                                  <hr />
                                  <div class="stats">
                                      <i class="ti-reload"></i> Updated now
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <div class="card">
                          <div class="content">
                              <div class="row">
                                  <div class="col-xs-5">
                                      <div class="icon-big icon-success text-center">
                                          <i class="ti-wallet"></i>
                                      </div>
                                  </div>
                                  <div class="col-xs-7">
                                      <div class="numbers">
                                          <p>Revenue</p>
                                          $1,345
                                      </div>
                                  </div>
                              </div>
                              <div class="footer">
                                  <hr />
                                  <div class="stats">
                                      <i class="ti-calendar"></i> Last day
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <div class="card">
                          <div class="content">
                              <div class="row">
                                  <div class="col-xs-5">
                                      <div class="icon-big icon-danger text-center">
                                          <i class="ti-pulse"></i>
                                      </div>
                                  </div>
                                  <div class="col-xs-7">
                                      <div class="numbers">
                                          <p>Your Hash Rate</p>
                                          23
                                      </div>
                                  </div>
                              </div>
                              <div class="footer">
                                  <hr />
                                  <div class="stats">
                                      <i class="ti-timer"></i> H/S
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">

                  <div class="col-md-12">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">Users Behavior</h4>
                              <p class="category">24 Hours performance</p>
                          </div>
                          <div class="content">
                              <div id="chartHours" class="ct-chart">
															https://api.nanopool.org/v1/zec/balance/t1StdxN1qZEcpJR9Qerm1iNaSoa4tRjjWGh</div>
                              <div class="footer">
                                  <div class="chart-legend">
                                      <i class="fa fa-circle text-info"></i> Open
                                      <i class="fa fa-circle text-danger"></i> Click
                                      <i class="fa fa-circle text-warning"></i> Click Second Time
                                  </div>
                                  <hr>
                                  <div class="stats">
                                      <i class="ti-reload"></i> Updated 3 minutes ago
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>


                </div>
            </div>
        </div>
    </div>
</div>
</body>

<?php include "./sharedlayout/clientFooter.php";
?>
