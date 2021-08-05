<?php
#File normalize-to-xml.php
#Student Name: Mohammed Kadir
#Student Number: 18010426
#Created: 21/07/2021
#Revised: 30/07/2021
#Description: Normalize csv files into xml
#User Advice: None


    $st = microtime(true);

    // names of input and output files
    $inputFilenames = array("data_188.csv", "data_203.csv", "data_206.csv", "data_209.csv", "data_213.csv", "data_215.csv", "data_228.csv", "data_270.csv", "data_271.csv", "data_375.csv", "data_395.csv", "data_452.csv", "data_447.csv", "data_459.csv", "data_463.csv", "data_481.csv", "data_500.csv", "data_501.csv");
    $outputFilenames = array("data_188.xml", "data_203.xml", "data_206.xml", "data_209.xml", "data_213.xml", "data_215.xml", "data_228.xml", "data_270.xml", "data_271.xml", "data_375.xml", "data_395.xml", "data_452.xml", "data_447.xml", "data_459.xml", "data_463.xml", "data_481.xml", "data_500.xml", "data_501.xml");


    for($i = 0; $i < count($inputFilenames); $i++){
        $station = array();
        $record = array();

        //create a new xmlwriter object
        $xml = new XMLWriter(); 
        $xml->openURI($outputFilenames[$i]);
        $xml->setIndent(true);

        //create the document tag
        $xml->startDocument("1.0", "UTF-8");
        

        $inputFile = fopen($inputFilenames[$i], "r");
        // twice to skip header
        $row = fgetcsv($inputFile, 1000000,';');
        $row = fgetcsv($inputFile, 1000000,';');

        $xml->startElement("Station"); 
        $xml->writeAttribute('id', $row[0]);
        $xml->writeAttribute('name', $row[14]);
        $xml->writeAttribute('geocode', $row[15]);

        // first row
        // check if timestamp should be written, check if any attributes are there, then check every attribute to be written

        if(($row[2] != "") || ($row[4] != "") || ($row[3] != "") || ($row[5] != "") || ($row[6] != "") || ($row[7] != "") || ($row[8] != "") || ($row[9] != "") || ($row[10] != "") || ($row[11] != "") || ($row[12] != "") || ($row[13] != "")) {
            $xml->startElement("rec");
            $xml->writeAttribute('ts', $row[1]);
            if ($row[2] != "") {
                $xml->writeAttribute('nox', $row[2]);
            }
            if ($row[4] != "") {
                $xml->writeAttribute('no', $row[4]);
            }
            if ($row[3] != "") {
                $xml->writeAttribute('no2', $row[3]);
            }
            if ($row[5] != "") {
                $xml->writeAttribute('pm10', $row[5]);
            }
            if ($row[6] != "") {
                $xml->writeAttribute('nvpm10', $row[6]);
            }
            if ($row[7] != "") {
                $xml->writeAttribute('vpm10', $row[7]);
            }
            if ($row[8] != "") {
                $xml->writeAttribute('nvpm2.5', $row[8]);
            }
            if ($row[9] != "") {
                $xml->writeAttribute('pm2.5', $row[9]);
            }
            if ($row[10] != "") {
                $xml->writeAttribute('vpm2.5', $row[10]);
            }
            if ($row[11] != "") {
                $xml->writeAttribute('co', $row[11]);
            }
            if ($row[12] != "") {
                $xml->writeAttribute('o3', $row[12]);
            }
            if ($row[13] != "") {
                $xml->writeAttribute('so2', $row[13]);
            }
        }

         // check if timestamp should be written, check if any attributes are there, then check every attribute to be written. Ends when no more rows left
        while (($row = fgetcsv($inputFile, 1000000,';')) !== false){
            if(($row[2] != "") || ($row[4] != "") || ($row[3] != "") || ($row[5] != "") || ($row[6] != "") || ($row[7] != "") || ($row[8] != "") || ($row[9] != "") || ($row[10] != "") || ($row[11] != "") || ($row[12] != "") || ($row[13] != "")) {
                $xml->startElement("rec");
                $xml->writeAttribute('ts', $row[1]);
                if ($row[2] != "") {
                    $xml->writeAttribute('nox', $row[2]);
                }
                if ($row[4] != "") {
                    $xml->writeAttribute('no', $row[4]);
                }
                if ($row[3] != "") {
                    $xml->writeAttribute('no2', $row[3]);
                }
                if ($row[5] != "") {
                    $xml->writeAttribute('pm10', $row[5]);
                }
                if ($row[6] != "") {
                    $xml->writeAttribute('nvpm10', $row[6]);
                }
                if ($row[7] != "") {
                    $xml->writeAttribute('vpm10', $row[7]);
                }
                if ($row[8] != "") {
                    $xml->writeAttribute('nvpm2.5', $row[8]);
                }
                if ($row[9] != "") {
                    $xml->writeAttribute('pm2.5', $row[9]);
                }
                if ($row[10] != "") {
                    $xml->writeAttribute('vpm2.5', $row[10]);
                }
                if ($row[11] != "") {
                    $xml->writeAttribute('co', $row[11]);
                }
                if ($row[12] != "") {
                    $xml->writeAttribute('o3', $row[12]);
                }
                if ($row[13] != "") {
                    $xml->writeAttribute('so2', $row[13]);
                }
                $xml->endElement();
            } 
            
        }

    $xml->endElement(); 

    // Display current buffer
    print_r($xml->flush()); 

    // put buffer in file
    $filename = $outputFilenames[$i];
    $file = $xml->flush();
    }

echo '<p>It took ';
echo microtime(true) - $st;

 
?>