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
	require 'connection.php';
   function customerExists($id) {
  	$conn = Connect();

 	 $sql1 = "SELECT * FROM f17_rileymiller.CUSTOMER WHERE id = ?";

  	$stmt1 = $conn->prepare($sql1);

  	$stmt1->bind_param("i", $customer_id);
 	
  	$customer_id = $id;

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
  
}
    if(isset($_GET["id"]))
    {
        
         $customer_id = $_GET["id"];
      //  echo "customer_id: " . $customer_id;
        
        $conn = Connect();
    

        	 echo "<hr /><br />";
    		echo "<div class=\"ledger\"><h1>All Orders</h1>";

  $sql = "SELECT first_name, last_name, email from CUSTOMER WHERE id = $customer_id";
  $result = $conn->query($sql);

  $grand_total = 0;
  $total_customers = 0;
  $total_orders = 0;
  $total_units = 0;
  $total_subtotal = 0;
  $total_tax = 0;
  $total_donations = 0;
  #mysqli_report(MYSQLI_REPORT_ALL);
  if($result->num_rows > 0) {

    while($row = $result->fetch_assoc()){
            echo "<h2>Customer: " . $row["first_name"] . " " . $row["last_name"] . "</h2>";
    		echo "<p>Email: " . $row["email"] . "</p>";

    		echo "<table id=\"customer\">
            
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Purchase Date</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Tax</th>
                    <th>Donation</th>
                    <th>Total</th>
                </tr>
            </thead><tbody>";
        $orders = "SELECT order_id, order_time, product_id, quantity, tax, donation, total_cost FROM ORDERS WHERE customer_id = $customer_id";

        $order = $conn->query($orders);

        $total_customers++;

        while($print_field = $order->fetch_assoc()){
          $total_orders++;

         // echo "total_orders: " . $total_orders;

          $product_id = $print_field["product_id"];
          $product_all = "SELECT name, price FROM PRODUCT WHERE id = $product_id";

          $product = $conn->query($product_all);

          $final_product = $product->fetch_assoc();

          $total_units += $print_field["quantity"];

          $subtotal = ((float)$print_field["quantity"] * $final_product["price"]);
           $total_subtotal += $subtotal;
           $total_donations += $print_field["donation"];
           $total_tax += $print_field["tax"];
           $grand_total += $print_field["total_cost"];
        
          echo "<tr><td>" . $print_field["order_id"] . "</td><td>" . $print_field["order_time"] . "</td><td>" . $final_product["name"] . "</td><td>" . $print_field["quantity"] . "</td><td>" . round($subtotal,2) . "</td><td>" . $print_field['tax'] . "</td><td>" . $print_field['donation'] . "</td><td>" . $print_field['total_cost'] . "</td></tr>";
        }

    }
  } 




           echo "</tbody><tfoot>
                <tr>
                    <td>Average Per Order</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>" . round($total_units / $total_orders, 2) . "</td>
                    <td>$" . round($total_subtotal / $total_orders, 2) . "</td>
                    <td>$" . round ($total_tax / $total_orders, 2) . "</td>
                    <td>$" . round($total_donations / $total_orders, 2) . "</td>
                    <td>$" . round($grand_total / $total_orders, 2) . "</td>
                </tr>
                <tr>
                    <td>Grand Total</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>" . $total_units . "</td>
                    <td>" . $total_subtotal . "</td>
                    <td>" . $total_tax . "</td>
                    <td>" . $total_donations . "</td>
                    <td>" . $grand_total . "</td>
                </tr></tfoot>";
 
        
}
    else {
    echo "<h2>No orders submitted</h2>";
  }

?>