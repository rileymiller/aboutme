<?php
require 'connection.php';

  $conn = Connect();


if(!empty($_POST["first"])) {

 $sql = "SELECT DISTINCT first_name, last_name, email FROM f17_rileymiller.CUSTOMER WHERE first_name like  '%" . $_POST["first"] . "%' ";
  
 $customer_first = $conn->query($sql);

//$query ="SELECT * FROM country WHERE country_name like '" . $_POST["keyword"] . "%' ORDER BY country_name LIMIT 0,6";
//$result = $db_handle->runQuery($query);


if(!empty($customer_first)) {


 
?>

<ul id="first_search">
<?php
foreach($customer_first as $first) {
?>
<li onClick="selectFirst('<?php echo $first["first_name"]; ?>','<?php echo $first["last_name"]; ?>','<?php echo $first["email"]; ?>')"><?php echo $first["first_name"] . " " . $first["last_name"] . " " . $first["email"] . " "; ?></li>
<?php } ?>
</ul>
<?php } $conn->close(); } ?>


<?php
//require 'connection.php';

  $conn = Connect();


if(!empty($_POST["last"])) {

 $sql1 = "SELECT DISTINCT first_name, last_name, email FROM f17_rileymiller.CUSTOMER WHERE last_name like  '%" . $_POST["last"] . "%' ";
  
 $customer_last = $conn->query($sql1);

//$query ="SELECT * FROM country WHERE country_name like '" . $_POST["keyword"] . "%' ORDER BY country_name LIMIT 0,6";
//$result = $db_handle->runQuery($query);


if(!empty($customer_last)) {


 
?>

<ul id="last_search">
<?php
foreach($customer_last as $last) {
?>
<li onClick="selectLast('<?php echo $last["first_name"]; ?>','<?php echo $last["last_name"]; ?>','<?php echo $last["email"]; ?>')"><?php echo $last["first_name"] . " " . $last["last_name"] . " " . $last["email"] . " "; ?></li>
<?php } ?>
</ul>
<?php } $conn->close();} ?>





<?php
//require 'connection.php';

  $conn = Connect();


if(!empty($_POST["email"])) {

 $sql2 = "SELECT DISTINCT first_name, last_name, email FROM f17_rileymiller.CUSTOMER WHERE email like  '%" . $_POST["email"] . "%' ";
  
 $customer_email = $conn->query($sql2);

//$query ="SELECT * FROM country WHERE country_name like '" . $_POST["keyword"] . "%' ORDER BY country_name LIMIT 0,6";
//$result = $db_handle->runQuery($query);


if(!empty($customer_email)) {


 
?>

<ul id="email_search">
<?php
foreach($customer_email as $email) {
?>
<li onClick="selectEmail('<?php echo $email["first_name"]; ?>','<?php echo $email["last_name"]; ?>','<?php echo $email["email"]; ?>')"><?php echo $email["first_name"] . " " . $email["last_name"] . " " . $email["email"] . " "; ?></li>
<?php } ?>
</ul>
<?php } $conn->close();} ?>



