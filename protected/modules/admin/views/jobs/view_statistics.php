 
<?php 
$chartData=array();
$chartData_ready=array();
foreach ($model->getData() as $key=>$value) { 
    
   $chartData[$key]="'".$value['cdate']."',".$value['idjobsapplied']."";   
     $chartData[$key]= explode(',', $chartData[$key]);
    
     $chartData[$key]= "['".$value['cdate']."', ".$value['idjobsapplied']."],";
 }
 ?>

 <?php //$chartData='['.implode("$chartData[0]" .'], ', $chartData[1]).']';?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Applies'],
          <?php foreach ($chartData as $value) echo $value;?>
          
        ]);

        var options = {
          title: 'Job Statistics',
          hAxis: {title: 'Job Statistics', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
   
<div id="chart_div" style="width: 900px; height: 500px;"></div>
