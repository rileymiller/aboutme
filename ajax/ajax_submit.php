<?php
  session_start();
?>
<?php $PATH = "http://luna.mines.edu/rileymiller/website"; ?>
<link rel="stylesheet" type="text/css" href="form.css">

<?php 
        $current = "form";
    ?>
    <?php include '../php/templateHeader.php';?>







<?php 
  
  require 'connection.php';
  function getCustomerID() {
     //echo "getCustomerID called <br />";
     $conn = Connect();

     $sql = "SELECT DISTINCT * FROM f17_rileymiller.CUSTOMER WHERE first_name = ? && last_name = ?";
  
     $uniqCustomer = $conn->prepare($sql);
     $uniqCustomer->bind_param("ss", $first_name, $last_name);
     $first_name = $_SESSION['first'];
     $last_name = $_SESSION['last'];
     $uniqCustomer->execute();

     if(!$uniqCustomer) {
        trigger_error('Invalid query' . $conn->error);
     } 

     $uniqCustomer = $uniqCustomer->get_result();
     if($uniqCustomer->num_rows > 0){
      return $uniqCustomer->fetch_assoc()['id'];
     } else {
    //  echo 'Customer not in the table';
     }

     $conn->close();
  
  }

  function getProductID() {
     #require 'connection.php';
    //echo "getProductID called <br />";
     $conn = Connect();

     $sql = "SELECT id, value FROM f17_rileymiller.PRODUCT WHERE value = ?";
  
     $uniqProduct = $conn->prepare($sql);
     $uniqProduct->bind_param("s", $value);
     $value = $_SESSION['phones'];
    // echo "<br />$value" . $value;
     
     $uniqProduct->execute();

     if(!$uniqProduct) {
        trigger_error('Invalid query' . $conn->error);
     } 

     $uniqProduct = $uniqProduct->get_result();
     if($uniqProduct->num_rows > 0){
      return $uniqProduct->fetch_assoc()['id'];
     } else {
     // echo 'Product not in the table';
     }

     $conn->close();
  
  }

  function customerExists() {
  #require 'connection.php';
  $conn = Connect();

  //mysqli_report(MYSQLI_REPORT_ALL);
  
#query number 1
  $sql1 = "SELECT * FROM f17_rileymiller.CUSTOMER WHERE first_name = ? && last_name = ?";

  $stmt1 = $conn->prepare($sql1);

  $stmt1->bind_param("ss", $first, $last);
/*
  $sql2 = "INSERT INTO f17_rileymiller.CUSTOMER (first_name, last_name, email) VALUES (?,?,?)";
  $stmt2 = $conn->prepare($sql2);
  $stmt2->bind_param("sss", $first, $last, $email);

  $sql2 = "INSERT INTO f17_rileymiller.CUSTOMER (first_name, last_name, email) VALUES (?,?,?)";
  $stmt2 = $conn->prepare($sql2);
  $stmt2->bind_param("sss", $first, $last, $email);
*/

  $first = $_SESSION['first'];
  $last = $_SESSION['last'];
  $stmt1->execute();
  $result = $stmt1->get_result();
  $row = $result->fetch_assoc();

  if(!$row){
   // echo "customer not found"; 
    $conn->close();
    return false;
  } else {
   // echo "customer found"; 
    $conn->close();
    return true;
  }
  #$email = $_SESSION['email'];
/*
  $phones = $_SESSION['phones'];
  $quantity = $_SESSION['quantity'];
  $donate = $_SESSION['donate'];
  $cost = $_SESSION['cost'];
  $date = $_SESSION['date'];
*/
  #$ret_first = $ret_last = $ret_email = '';

 // $stmt1->execute();

 // var_dump($stmt1);
  //echo "$stmt1-num_rows: " . $stmt1->num_rows;
}
  //$stm1->get_result();
  
 # $stmt1->bind_result($ret_first, $ret_last, $ret_email);

 # echo "ret_first: " . $ret_first . " $ret_last: " . $ret_last . " $ret_email: " . $ret_email;
  #if the customer exists..
  if(!customerExists()) {
    echo "<h2>Welcome new customer!</h2>";
    // $conn->close();

    $conn = Connect();
     //mysqli_report(MYSQLI_REPORT_ALL);
  
    $sql = "INSERT INTO f17_rileymiller.CUSTOMER (first_name,last_name,email) VALUES (?,?,?)";
    $newCust = $conn->prepare($sql);
    $newCust->bind_param("sss", $first, $last,$email);

    $first = $_SESSION['first'];
    $last = $_SESSION['last'];
    $email = $_SESSION['email'];

    $newCust->execute();    

    $order_time = $_SESSION['date'];
    $product_id = getProductID();
    $customer_id = getCustomerID();

        #insert new order!!
      $sql3 = "INSERT INTO f17_rileymiller.ORDERS (order_time, product_id, customer_id,quantity,tax,donation,total_cost) VALUES ('$order_time',$product_id,$customer_id, ?,?,?,?)";
      $stmt3 = $conn->prepare($sql3);
      $stmt3->bind_param("dddd", $quantity, $tax, $donation, $total_cost);

      $quantity = floatval($_SESSION['quantity']);
      $tax = floatval((($_SESSION['cost'] * $_SESSION['quantity']) * 1.07));
      
      $total_cost = floatval((($_SESSION['cost'] * $_SESSION['quantity']) * 1.07));
      if($_SESSION['donate'] == "yes") {
      $donation = floatval((ceil($total_cost / 100) * 100) - $total_cost);
      $total_cost = floatval(ceil($total_cost / 100) * 100);
      } else {
        $donation = 0;  
      } 

      $stmt3->execute();

      if(!$stmt3){
        trigger_error('Invalid query' . $conn->error);
      } else {
        echo "<h3>Order Submitted</h3>";
      }

  } else {
  echo "<h2>Welcome back!</h2>";
 
  $conn = Connect();


    $sql = "INSERT INTO f17_rileymiller.CUSTOMER (first_name,last_name,email) VALUES (?,?,?)";
    $newCust = $conn->prepare($sql);
    $newCust->bind_param("sss", $first, $last,$email);

    $first = $_SESSION['first'];
    $last = $_SESSION['last'];
    $email = $_SESSION['email'];

    $newCust->execute();
  
  $order_time = $_SESSION['date'];
  $product_id = getProductID();
  $customer_id = getCustomerID();

  //echo "$product_id: " . $product_id;
  //echo "$customer_id: " . $customer_id;
    
  #echo "<h1>About to hit error on line 192</h1>";
  //mysqli_report(MYSQLI_REPORT_ALL);
  $sql3 = "INSERT INTO f17_rileymiller.ORDERS (order_time, product_id, customer_id,quantity,tax,donation,total_cost) VALUES ('$order_time',$product_id,$customer_id, ?,?,?,?)";
  $stmt3 = $conn->prepare($sql3);
  $stmt3->bind_param("dddd", $quantity, $tax, $donation, $total_cost);

  $quantity = floatval($_SESSION['quantity']);
  $tax = floatval((($_SESSION['cost'] * $_SESSION['quantity']) * 1.07));
  
  $total_cost = floatval((($_SESSION['cost'] * $_SESSION['quantity']) * 1.07));
  if($_SESSION['donate'] == "yes") {
  $donation = floatval((ceil($total_cost / 100) * 100) - $total_cost);
  $total_cost = floatval(ceil($total_cost / 100) * 100);
  } else {
    $donation = 0;  
  } 

  $stmt3->execute();

  if(!$stmt3){
    trigger_error('Invalid query' . $conn->error);
  } else {
    echo "<h3>Order Submitted</h3>";
  }

  }
  $conn->close();
?>

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
