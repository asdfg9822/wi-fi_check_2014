
<div class="col-md-5">
  <div class="panel panel-primary">
    <div class="panel-heading">차수별 출석률</div>
    <div class="panel-body">
      <div id="area_graph" style="width: 250px; height: 150px;"></div>
    </div>
  </div>

</div>
<?php
foreach($date_list as $i=> $entry){
  $list[$i]=$entry->date;
}
foreach($date_att as $i => $entry){
  $num1[$i] = $entry[0]->num;
}
?>





<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

var num="2";
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Date', '출석률'],

      <?php
      for($i = 0; $i < count($list); $i++){
        echo "['".$list[$i]."', ".$num1[$i]."],";
      }
      ?>
      ]);

    var options = {
      title: '차수별 출석률',
      hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0}
    };

    var chart = new google.visualization.AreaChart(document.getElementById('area_graph'));
    chart.draw(data, options);
  }
</script>