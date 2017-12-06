<?php
  session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>I/O Form</title>
    <meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="form.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

<?php 
        $current = "form";
    ?>
    <?php include '../php/templateHeader.php';?>
    




<?php

$file = fopen("orders.csv", "r") or die('cannot open file');

// sort
$firstnames = array();
$rows = array();
//build array of surnames, and array of rows
while (false != ( $row = fgetcsv($file, 0, ',') )) {
    //extract surname from the first column
    //this should match the last word before the comma, if there is a comma
    preg_match('~([^\s]+)(?:,.*)?$~', $row[0], $m);
   // print_r($m);
    $firstnames[] = $m[1];
    $rows[] = $row;
}
//fclose($file);
//sort array of rows by surname using our array of surnames
//print_r($rows);
array_multisort($firstnames, $rows);
//print_r($rows);
$prev = "";
$new_cust = true;
$grand_total = 0;
echo "<hr /><br />";
echo "<div class=\"ledger\"><h1>All Orders</h1>";
for($i = 0; $i < count($rows); $i++){
    //foreach($rows[$i] as $key => $val)
      //  echo $key . ' = ' . $val . ' ';
    	if ($rows[$i][0] == $prev){
    		$new_cust = false;
    	} else {
    		if($i !== 0){
    			echo "<h4>Grand Total: $" . $grand_total . "</h4>";
    			$grand_total = 0;
    		}
    		$new_cust = true;
    		$prev = $rows[$i][0];
     	}
   

   if($new_cust){
   	echo "<h2>Customer: " . $rows[$i][0] . " " . $rows[$i][1] . "</h2>";
   	echo "<p>    Order: " . $rows[$i][2] . " <span id=\"cap\">" . $rows[$i][3] . "</span> x " . $rows[$i][4] . " = $" . $rows[$i][5] . " </p>";
   	$grand_total += $rows[$i][5];   
   } else {
   	 echo "<p>    Order: " . $rows[$i][2] . " <span id=\"cap\">" . $rows[$i][3] . "</span> x " . $rows[$i][4] . " = $" . $rows[$i][5] . " </p>";
   	$grand_total += $rows[$i][5];
   }
    /*for($j = 2; $j < count($rows[$i]); $j++){
    	echo $rows[$i][$j];

    }*/
   if($i == (count($rows) - 1))
	echo "<h4>Grand Total: $" . $grand_total . "</h4></div>";
}
//print_r($rows);

// set # of table columns
$numCols = 4;
$i=0;

/*
echo '<table border="1" align="center"><tr>' . "\n";
foreach( $rows as $rows2 )
{

if ($i % $numCols == 0 && $i != 0) 
    echo "</tr>\n<tr>"; // every time but the first

    echo '<td>';

    foreach( $rows2 as $key )
    {
            echo $key . '<br />';
        $i++;
    }
    echo "</td>\n";
}


while ($i++ % $numCols != 0) 
echo '<td>&nbsp;</td>' . "\n"; // fill in empty cells


// end table
echo '</tr></table>' . "\n\n\n";*/


?>

</body>
</html>