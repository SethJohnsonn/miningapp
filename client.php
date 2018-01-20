<?php
session_start();
include 'dbclass.php';
require 'fusioncharts.php';
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
		$wallet = $row['Wallet'];
  }
  $results=null;
}

 include "./sharedlayout/clientHeader.php";

$array=file_get_contents("https://api.nanopool.org/v1/zec/balance/".$wallet);
$balancearray = (explode(',', $array));
$finalbalance = substr($balancearray[1], 7, -1);

//general miner info
$minerinfo= file_get_contents("https://api.nanopool.org/v1/zec/user/" .$wallet);
$minerinfo = str_getcsv($minerinfo, ':');
#var_dump($minerinfo);

//get graph contents from api and do many many string operations to make it work with FusionCharts
$graphcontents = file_get_contents("https://api.nanopool.org/v1/zec/hashratechart/".$wallet);
$extrabs = array("{", ":", "''", "}");
#$graphcontents = str_replace($extrabs, "", $graphcontents);
$stringtoappend = '"';
$graphcontents = ltrim($graphcontents, '{"status":true,');
$graphcontents = rtrim($graphcontents, '"}"');
$graphcontents = $stringtoappend . $graphcontents;

$patterns = array();
$patterns[0] = '/date/';
$patterns[1] = '/shares/';
$patterns[2] = '/"hashrate":0/';

$replacements = array();
$replacements[0] = 'label';
$replacements[1] = 'value';
$replacements[3] = '';

ksort($patterns);
ksort($replacements);
ob_start();
echo preg_replace($patterns, $replacements, $graphcontents);
$jsonArray = ob_get_contents();
ob_end_clean();

json_encode($jsonArray);

#var_dump($graphcontents);

#$graphcontents = explode('"' , $graphcontents);
#var_dump($graphcontents);

/**
         *  Step 3: Create a `columnChart` chart object using the FusionCharts PHP class constructor.
         *  Syntax for the constructor: `FusionCharts("type of * chart", "unique chart id", "width of chart",
         *  "height of chart", "div id to render the chart", "data format", "data source")`
         **/
        /*$columnChart = new FusionCharts("line", "myFirstChart" , 600, 300, "chartContainer", "json",
            '{
                "chart": {
                    "caption": "Your Average Hash Rate",
                    "subCaption": "Last Day",
                    "xAxisName": "Time",
                    "yAxisName": "Rate",
                    "numberPostfix": "H/s",
                    "theme": "zune"
                },
                "data":
                }');
        /**
         *  Because we are using JSON/XML to specify chart data, `json` is passed as the value for the data
         *   format parameter of the constructor. The actual chart data, in string format, is passed as the value
         *   for the data source parameter of the constructor. Alternatively, you can store this string in a
         *   variable and pass the variable to the constructor.
         */

        /**
         * Step 4: Render the chart
         */
        #$columnChart->render();

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
                                          <p>Wallet ZEC</p>
                                          <?php echo $finalbalance ?>
                                      </div>
                                  </div>
                              </div>
                              <div class="footer">
                                  <hr />
                                  <div class="stats">
                                      <i class="ti-calendar"></i> Updated Just Now
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
                                          2000
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
                          <div class="content" id="chartdata" align="center" margin="auto">
                              <div class="ct-chart">
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
}
else {
	header("Location: login.php?error=2");
}
?>
