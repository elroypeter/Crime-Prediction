<?php 

$dbhandle = new mysqli('localhost','root','','crime_prediction');
echo $dbhandle->connect_error;
//testing only
$query = "SELECT year, totalcrime FROM crime_data_by_year order by year asc " ;
//replace with it
//$query = "SELECT year,crimeno FROM crime_records order by year Asc";

$res = $dbhandle->query($query);

?>



<html>
  <head>

<title>Crime Prediction Tool</title>
<!-- Latest compiled and minified CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
      

         ['Year', 'No OF Crimes', { role: 'style' } ],
 <?php 
while($row=$res->fetch_assoc())
{
    echo "['".$row['year']."', ".$row['totalcrime'].",'gold'],"; 
    
}

          ?>

        ]);

        var options = {
          chart: {
            title: 'Crime Statistics by Year',
            subtitle: 'Year, Crime No',
          }
        };



        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }


    </script>
  </head>
  <body>
<div class="container">
<nav id ="nvb" class="navbar navbar-default">
      <div class="container-fixed">
        <div class="navbar-header">
            <a class="navbar-brand" id="icon" href="index.php"><i  class="fa fa-shield fa-2x" aria-hidden="true"></i><b>CPT</b></a>     
    </div>
  </div>
</nav>
<ul  id ="" class="nav nav-pills">
  <li role="presentation" ><a href="index.php">crime prediction</a></li>  
  <li role="presentation" class="active"><a href="stat.php">statistics</a></li>
</ul><br>

<div id="columnchart_material" style=" height: 500px;"></div>
  
</div>
</body>
</html>