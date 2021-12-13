<div>
<h2 class="font-semibold text-xl text-gray-800 leading-tight ">
     Progress
</h2>

    <div id="piechart" style="width: 100%; height: 500px;"></div>
    <!-- <div id="columnchart_material" style="width: 900px; height: 500px; " class="pt-2 "></div> -->

    <script type="text/javascript">
   
    var obj = <?php echo $obj; ?>
   

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
     
      var data = google.visualization.arrayToDataTable([
        ['Correct', 'Total'],
        ['Correct', obj.correct],
        ['Wrong', obj.wrong],
      ]);

      var options = {
        title: 'Learning Progress'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }

    
  </script>

  <!-- <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses', 'Profit'],
        ['2014', 1000, 400, 200],
        ['2015', 1170, 460, 250],
        ['2016', 660, 1120, 300],
        ['2017', 1030, 540, 350]
      ]);

      var options = {
        chart: {
          title: 'Student Performance',
        }
      };

      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script> -->


 
</div>
