<div class="col-md-5">
  <!--Div that will hold the pie chart-->
  <div class="panel panel-primary">
    <div class="panel-heading">학년분포도</div>
    <div class="panel-body">
      <div id="pi_graph"></div>
    </div>
  </div>
</div>




<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

var one=<?php echo ($s_count[0][0]->num)?>;
var two=<?php echo ($s_count[1][0]->num)?>;
var three=<?php echo ($s_count[2][0]->num)?>;
var four=<?php echo ($s_count[3][0]->num)?>;


      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['1학년', one],
          ['2학년', two],
          ['3학년', three],
          ['4학년', four]
          ]);

        // Set chart options
        var options = {'title':'학년 분포도',
        'width':230,
        'height':150};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('pi_graph'));
        chart.draw(data, options);
      }
    </script>