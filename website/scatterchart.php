<?php include('header.php');
#File linechart.php
#Student Name: Mohammed Kadir
#Student Number: 18010426
#Created: 28/07/2021
#Revised: 30/07/2021
#Description: Creates scatter chart with averages for selected place with further options
#User Advice: None
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>


  <body>
    <div id="chart_div" style="width: 1000px; height: 800px;"></div>
    <div>
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <span>Year:</span>
            <select name="year">
                <option value="2004">2004</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
            </select>
        
        <span>Time:</span>
        <input type="time" name="time" value="<?php echo $time;?>"/>

        <span>Location:</span>
            <select name="location">
                <option value="../data_188.csv">188</option>
                <option value="../data_203.csv">203</option>
                <option value="../data_206.csv">206</option>
                <option value="../data_209.csv">209</option>
                <option value="../data_213.csv">213</option>
                <option value="../data_215.csv">215</option>
                <option value="../data_228.csv">228</option>
                <option value="../data_270.csv">270</option>
                <option value="../data_271.csv">271</option>
                <option value="../data_375.csv">375</option>
                <option value="../data_395.csv">395</option>
                <option value="../data_452.csv">452</option>
                <option value="../data_447.csv">447</option>
                <option value="../data_459.csv">459</option>
                <option value="../data_463.csv">463</option>
                <option value="../data_481.csv">481</option>
                <option value="../data_500.csv">500</option>
                <option value="../data_501.csv">501</option>
            </select>
            

        <span>Gas:</span>
            <select name="gas">
                <option value="4">Carbon Monoxide/NO</option>
            </select>
            
            <input type="submit" value="Submit"/>

            <?php 
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                }else{echo "no request";}
            ?>

        <?php 
            $year = $time = $location = $gas = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $year = $_POST['year']; // this $value variable contains the value of selected value.
                if (empty($year)) {
                    echo "Year is empty";
                } else {
                    echo $year;
                }
                $time = $_POST['time']; // this $value variable contains the value of selected value.
                if (empty($time)) {
                    echo "Time is empty";
                } else {
                    echo $time;
                }
                $location = $_POST['location']; // this $value variable contains the value of selected value.
                if (empty($location)) {
                    echo "Location is empty";
                } else {
                    echo $location;
                }
                $gas = $_POST['gas']; // this $value variable contains the value of selected value.
                if (empty($gas)) {
                    echo "Gas is empty";
                } else {
                    echo $gas;
                }
                
            }else{echo "no request";}
            //echo $data[1]
        ?>

        <?php

        error_reporting(0);

        # Function to change the time format
        function changeTime(array &$array)
        {
            if ($array[1] != 'ts') {
                $array[1] = date('Y-m-d H:i:s ', $array[1]);
            }
        }

        
        $i = 0;
        $j = 0;
        $k = 0;
        $certainYear = $year;
        $certainTime = $time;
        $month = array();
        $inputFile = $location;
        $gasNo = $gas;

        echo ("hello");

        // Open file
        if (($inputFile = fopen($inputFile, "r")) !== false) {
            while (($data = fgetcsv($inputFile, 10000, ";")) !== false) {

                changeTime($data);
                //print_r($data[1]);
                if (strpos($data[1], $certainYear) !== false) {
                    for($k = 1; $k < 13; $k++){
                        if (strpos($data[1], "-0$k-") !== false || strpos($data[1], "-$k-") !== false) {
                            if (strpos($data[1], $certainTime) !== false) {
                                $month[$k-1][] = $data[$gasNo];
                                $j = $j + 1;
                            }
                        }
                    }
                }
                $i = $i + 1;
            }
            print_r($month);
            $monthAvg[0] = array_sum($month[0])/count($month[0]);
            $monthAvg[1] = array_sum($month[1])/count($month[1]);
            $monthAvg[2] = array_sum($month[2])/count($month[2]);
            $monthAvg[3] = array_sum($month[3])/count($month[3]);
            $monthAvg[4] = array_sum($month[4])/count($month[4]);
            $monthAvg[5] = array_sum($month[5])/count($month[5]);
            $monthAvg[6] = array_sum($month[6])/count($month[6]);
            $monthAvg[7] = array_sum($month[7])/count($month[7]);
            $monthAvg[8] = array_sum($month[8])/count($month[8]);
            $monthAvg[9] = array_sum($month[9])/count($month[9]);
            $monthAvg[10] = array_sum($month[10])/count($month[10]);
            $monthAvg[11] = array_sum($month[11])/count($month[11]);

            //echo("AVERAGES");
            print_r($monthAvg);

        }
        ?>
      </form>
    </div>
    <div>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Month', 'Gas Level'],
            [ 1,      parseInt('<?php echo $monthAvg[0]; ?>')],
            [ 2,      parseInt('<?php echo $monthAvg[1]; ?>')],
            [ 3,      parseInt('<?php echo $monthAvg[2]; ?>')],
            [ 4,      parseInt('<?php echo $monthAvg[3]; ?>')],
            [ 5,      parseInt('<?php echo $monthAvg[4]; ?>')],
            [ 6,      parseInt('<?php echo $monthAvg[5]; ?>')],
            [ 7,      parseInt('<?php echo $monthAvg[6]; ?>')],
            [ 8,      parseInt('<?php echo $monthAvg[7]; ?>')],
            [ 9,      parseInt('<?php echo $monthAvg[8]; ?>')],
            [ 10,      parseInt('<?php echo $monthAvg[9]; ?>')],
            [ 11,      parseInt('<?php echo $monthAvg[10]; ?>')],
            [ 12,      parseInt('<?php echo $monthAvg[11]; ?>')],
            ]);
            
            var options = {
            title: 'NO levels in <?php echo $year?> at <?php echo $time?> averaged by month',
            hAxis: {title: 'Month', minValue: 1, maxValue: 12},
            vAxis: {title: 'Gas Levels', minValue: 0, maxValue: 100},
            legend: 'none'
            };

            var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
        </script>
    </div>
  </body>
</html>