<?php include('header.php'); 
#File linechart.php
#Student Name: Mohammed Kadir
#Student Number: 18010426
#Created: 25/07/2021
#Revised: 30/07/2021
#Description: Creates linecharts for selected place with further options
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
        <span>Date:</span>
        <input type="date" name="date" value="<?php echo $date;?>" min="1996-01-01" max = "2005-12-31"/>
        
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
        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            }else{echo "no request";}
        ?>

      <span>Gas:</span>
        <select name="gas">
            <option value="2">NOX</option>
            <option value="3">NO2</option>
            <option value="4">NO</option>
        </select>
        
        <input type="submit" value="Submit"/>

        <?php 
            $date = $location = $gas = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $date = $_POST['date']; // this $value variable contains the value of selected value.
                    if (empty($date)) {
                        echo "Date is empty";
                    } else {
                        echo $date;
                    }
                }else{echo "no request";}
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
        //$hour = array();
        $certainDate = $date;
        $inputFile = $location;
        $gasNo = $gas;

        echo ("hello");

        // Open file
        if (($inputFile = fopen($inputFile, "r")) !== false) {
            while (($data = fgetcsv($inputFile, 10000, ";")) !== false) {

                changeTime($data);
                if (strpos($data[1], $certainDate) !== false) {
                    $hour[$j] = $data[$gasNo];
                    $j = $j + 1;
                }
                $i = $i + 1;
            }
            print_r($hour);

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
            ['Hour', 'Gas Level'],
            [ 1,      parseInt('<?php echo $hour[0]; ?>')],
            [ 2,      parseInt('<?php echo $hour[1]; ?>')],
            [ 3,      parseInt('<?php echo $hour[2]; ?>')],
            [ 4,      parseInt('<?php echo $hour[3]; ?>')],
            [ 5,      parseInt('<?php echo $hour[4]; ?>')],
            [ 6,      parseInt('<?php echo $hour[5]; ?>')],
            [ 7,      parseInt('<?php echo $hour[6]; ?>')],
            [ 8,      parseInt('<?php echo $hour[7]; ?>')],
            [ 9,      parseInt('<?php echo $hour[8]; ?>')],
            [ 10,      parseInt('<?php echo $hour[9]; ?>')],
            [ 11,      parseInt('<?php echo $hour[10]; ?>')],
            [ 12,      parseInt('<?php echo $hour[11]; ?>')],
            [ 13,      parseInt('<?php echo $hour[12]; ?>')],
            [ 14,      parseInt('<?php echo $hour[13]; ?>')],
            [ 15,      parseInt('<?php echo $hour[14]; ?>')],
            [ 16,      parseInt('<?php echo $hour[15]; ?>')],
            [ 17,      parseInt('<?php echo $hour[16]; ?>')],
            [ 18,      parseInt('<?php echo $hour[17]; ?>')],
            [ 19,      parseInt('<?php echo $hour[18]; ?>')],
            [ 20,      parseInt('<?php echo $hour[19]; ?>')],
            [ 21,      parseInt('<?php echo $hour[20]; ?>')],
            [ 22,      parseInt('<?php echo $hour[21]; ?>')],
            [ 23,      parseInt('<?php echo $hour[22]; ?>')],
            [ 24,      parseInt('<?php echo $hour[23]; ?>')],
            ]);
            
            var options = {
            title: 'Gas levels over time',
            hAxis: {title: 'Years', minValue: 1, maxValue: 24},
            vAxis: {title: 'Gas Levels', minValue: 0, maxValue: 100},
            legend: 'none'
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
        </script>
    </div>
  </body>
</html>