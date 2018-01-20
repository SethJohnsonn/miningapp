function checkSignup(form){
  var session = getCookie("validation");
  var price = form.price.value;
  var hashes = form.hashes.value;
  if(session){
    window.location.replace("client.php");
  }
  else {
    window.location.replace("createAccount.php");
  }
  return;
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

$(function(){
	  $.ajax({
	    url: 'http://localhost/chartData.php',
	    type: 'GET',
	    success : function(data) {
	      chartData = data;
	      var chartProperties = {
	        "caption": "Hashrate over 24 Hours",
	        "xAxisName": "Time",
	        "yAxisName": "Hash Rate",

	        "theme": "zune"
	      };
	      var apiChart = new FusionCharts({
	        type: 'line',
	        renderAt: 'chartdata',
	        width: '500',
	        height: '400',
	        dataFormat: 'json',
	        dataSource: {
	          "chart": chartProperties,
	          "data": chartData
	        }
	      });
	      apiChart.render();
	    }
	  });
	});
