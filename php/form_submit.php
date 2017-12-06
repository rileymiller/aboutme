<?php
  session_start();
?>

<link rel="stylesheet" type="text/css" href="form.css">

<?php 
        $current = "form";
    ?>
    <?php include '../php/templateHeader.php';?>
    




<?php

/*echo "THANK YOU!!!";
echo "first: " . $_SESSION['first'];*/


//adding receipt
$total = $don = "";
$total = floatval((($_SESSION['cost'] * $_SESSION['quantity']) * 1.07));
echo "<div class=\"receipt\">";
echo '<h1>Receipt</h1> <br />';
echo "<div id=\"phone\">" . $_SESSION['phones'] . ": $" . $_SESSION['cost'] . "<br /></div>";
echo "Quantity: " . $_SESSION['quantity'] . "<br />";
echo "Subtotal (7% sales tax): $" . $total . "<br />";
if($_SESSION['donate'] == "yes") {
  $don = floatval((ceil($total / 100) * 100) - $total);
  echo "Donation: $" . $don . "<br />";
  echo "<h3>Grand Total: $" . floatval(ceil($total / 100) * 100) . "</h3><br />";
} else {
  echo "<h3>Grand Total: $" . $total . "</h3><br />";
}
echo "<p>Submitted at: " . $_SESSION['date'] . "</p>";
echo "</div>"

?>