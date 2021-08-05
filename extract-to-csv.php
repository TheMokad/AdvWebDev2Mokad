<?php
#File extract-to-csv.php
#Student Name: Mohammed Kadir
#Student Number: 18010426
#Created: 20/07/2021
#Revised: 30/07/2021
#Description: Reads air quality data and sorts into individual csv files.
#User Advice: None


# set timezone
@date_default_timezone_set("GMT");

ini_set('memory_limit', '512M');
ini_set('max_execution_time', '300');
ini_set('auto_detect_line_endings', TRUE);

$st = microtime(true);

$headers = array("siteID","ts","nox","no2","no","pm10","nvpm10","vpm10","nvpm2.5","pm2.5","co","o3","so2","loc","lat","long");

$csvInputPath = "air-quality-data-2004-2019.csv";

$outputFileNames = array("data_188.csv", "data_203.csv", "data_206.csv", "data_209.csv", "data_213.csv", "data_215.csv", "data_228.csv", "data_270.csv", "data_271.csv", "data_375.csv", "data_395.csv", "data_452.csv", "data_477.csv", "data_459.csv", "data_463.csv", "data_481.csv", "data_500.csv", "data_501.csv");


if(!file_exists($csvInputPath)) {
    echo "file cant be found";
    exit(0);
  }

$inputFile = fopen($csvInputPath, "r");

if (!$inputFile) {
    echo "Error opening data file.\ ";
    exit;
}

$count = count(fgetcsv($inputFile)) - 1;
echo $count;


$stations = array(188, 203, 206, 209, 213, 215, 228, 270, 271, 375, 395, 447, 452, 459, 463, 481,
                  500, 501);

for($i = 0; $i < count($stations); $i++){
    $handle = fopen("data_$stations[$i].csv", 'w');
    $outputFileNames[$i] = $handle;
    echo "<p>data_$stations[$i]</p>";
    fputcsv($handle, $headers, ';', FILE_APPEND);
}


while (($row = fgetcsv($inputFile, 1000000,';')) !== false) {
    $monitor_id = $row[4];
    switch ($monitor_id) {
        case 188:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[0], $entry, ';');
            }
            break;
        case 203:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[1], $entry, ';');
            }
            break;
        case 206:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[2], $entry, ';');
            }
            break;
        case 209:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[3], $entry, ';');
            }
            break;
        case 213:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[4], $entry, ';');
            }
            break;
        case 215:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[5], $entry, ';');
            }
            break;
        case 228:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[6], $entry, ';');
            }
            break;
        case 270:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[7], $entry, ';');
            }
            break;
        case 271:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[8], $entry, ';');
            }
            break;
        case 375:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[9], $entry, ';');
            }
            break;
        case 395:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[10], $entry, ';');
            }
            break;
        case 447: 
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[11], $entry, ';');
            }
            break;
        case 452: 
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
              $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[12], $entry, ';');
            }
            break;
        case 459: 
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[13], $entry, ';');
            }
            break;
        case 463:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[14], $entry, ';');
            }
            break;
        case 481:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[15], $entry, ';');
            }
            break;
        case 500:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[16], $entry, ';');
            }
            break;
        case 501:
            if (($row[1] != "") || ($row[11] != "")) {
                $row[0] = strtotime($row[0]);
                $entry = array($row[4], $row[0], $row[1], $row[2], $row[3], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[17], $row[18]);
                fputcsv($outputFileNames[17], $entry, ';');
            }
            break;
    }
}

echo '<p>It took ';
echo microtime(true) - $st;
?>