<?php
    echo "<h3> Displaying results </h3>";

    // function to fetch the xml depending on the name selected
    function GetXML($name) {
         $xmlDoc = new DOMDocument();
         $xmlDoc->load($name . ".xml");
         return $xmlDoc;
    }


    // function to count the number of publications the lecturer had
    function getCount($file, $author, $venue){
        $xmlFetched = GetXML($file);
        $xpath = new DOMXpath($xmlFetched);
        $body = $xmlFetched->getElementsByTagName('dblpperson')->item(0);
        $query = "count(r/*[contains(@key,'$venue')]/author[contains(@pid,'$author')] | r/*[contains(@key,'$venue')]/editor[contains(@pid,'$author')])";
        $elements = $xpath->evaluate($query, $body);
        return $elements;
    }
    // fetching the lecturers the user selected and putting them into an array
    if (isset($_GET["lecturer"])){
        // error handling to check if the user selected a lecturer
        $authorID = $_GET["lecturer"];
    }else{
        // setting error message
        $authorID = "please select one or more lecturers";
    }

    // sorting the various strings the lectueres can be assigned
    $authorsNames = array('cali' => 'Cali-Andrea', 'hidders' => 'Hidders-Jan', 'levene' => 'Levene-Mark', 'martin' => 'Martin-Nigel', 'poulo' =>'Poulovassilis-Alexandra', 'wood' => 'Wood-Peter' );
    $authorsNames2 = array('cali' => 'AndreaCali', 'hidders' => 'JanHidders', 'levene' => 'MarkLevene',  'martin' => 'NigelJMartin', 'poulo' =>'APoulovassilis', 'wood' => 'PeterTWood');
    $authorsNames3 = array('cali' => 'Andrea', 'hidders' => 'Jan', 'levene' => 'Mark', 'martin' => 'Nigel', 'poulo' => 'Alexandra', 'wood' => 'Peter');

        if (isset($_GET["lecturer"])){
             echo "<table>";
                echo "<tr>";
                echo "<td>";
                echo "</td>";

                // creating the table
                foreach ($authorID as $authorName)
                {
                  //adding the lecturers names to the top row
                  echo "<th>";
                  echo $authorsNames3[$authorName];
                  echo "</th>";
                }

                echo "</tr>";

                foreach ($authorID as $authorName1) {
                  //adding the lecturers names to the far left collum
                  echo "<tr>";
                  echo "<th>";
                  echo $authorsNames3[$authorName1];
                  echo "</th>";

                  foreach ($authorID as $authorName2) {
                      // adding all publications count and collaboartions count
                      echo "<td>";

                      echo getCount($authorsNames[$authorName2],$authorsNames2[$authorName1],$_GET["venue"]);

                      echo "</td>";

                  }
                  echo "</tr>";
                }
                echo "</table>";
        }else{
            echo "<h4> please select one or more lecturers </h4>";
        }

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

<br>
</br>

<form action="index.php" method="post">
return to query page:<input type="submit">
</form>

</body>
</html>