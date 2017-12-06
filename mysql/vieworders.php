<?php
  session_start();
?>
<?php $PATH = "http://luna.mines.edu/rileymiller/website"; ?>

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
  $conn = Connect();
    echo "<hr /><br />";
    echo "<div class=\"ledger\"><h1>All Orders</h1>";


  $sql = "SELECT id, first_name, last_name from CUSTOMER";
  $result = $conn->query($sql);
  $grand_total = 0;
  $total_customers = 0;
  $total_orders = 0;
  $total_units = 0;
  $total_subtotal = 0;
  $total_tax = 0;
  $total_donations = 0;

  if($result->num_rows > 0) {

    while($row = $result->fetch_assoc()){
        $customer_id = $row["id"];
        echo "<h2>Customer <a href=\"" . $PATH . "/mysql/customer.php?id=" . $customer_id . "\">" .  $row["first_name"] . " " . $row["last_name"] . "</a></h2>";

        $orders = "SELECT order_time, product_id, quantity, tax, donation, total_cost FROM ORDERS WHERE customer_id = $customer_id";

        $order = $conn->query($orders);

        $total_customers++;

        while($print_field = $order->fetch_assoc()){
          $total_orders++;


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
        
          echo "    <p>Order: " . $print_field["order_time"] . " " . $final_product["name"] . " " . ":" . $print_field["quantity"] . " X $" . $final_product["price"] . " + Tax ($" . $print_field['tax'] . ") + Donation ($" . $print_field['donation'] . ") Order Total = $" . $print_field['total_cost'] . "</p>";
        }

    }
  } else {
    echo "<h2>No orders submitted</h2>";
  }

  echo "</div><br /> <h2 id=\"table_header\"> Order Statistics</h2>";
$grand_total = round($grand_total, 2);
  $total_subtotal = round($total_subtotal, 2);
  $total_tax = round($total_tax, 2);
  $total_donations = round($total_donations, 2);

 echo "<table id=\"totals\">
            
            <thead>
                <tr>
                    <th></th>
                    <th>Total Amount</th>
                    <th>Average per Order</th>
                    <th>Average per Customer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Customers</td>
                    <td>" . $total_customers . "</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>Orders</td>
                    <td>" . $total_orders . "</td>
                    <td>N/A</td>
                    <td>" . round($total_orders / $total_customers, 2) . "</td>
                </tr>
                <tr>
                    <td>Units</td>
                    <td>" . $total_units . "</td>
                    <td>" . round($total_units / $total_orders,2) . "</td>
                    <td>" . round($total_units / $total_customers,2) . "</td>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td>$" . $total_subtotal . "</td>
                    <td>$" . round($total_subtotal / $total_orders,2) . "</td>
                    <td>$" . round($total_subtotal / $total_customers,2). "</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$" . $total_tax . "</td>
                    <td>$" . round($total_tax / $total_orders,2). "</td>
                    <td>$" . round($total_tax / $total_customers,2) . "</td>
                </tr>
                <tr>
                    <td>Donations</td>
                    <td>$" . $total_donations . "</td>
                    <td>$" . round($total_donations / $total_orders, 2) . "</td>
                    <td>$" . round($total_donations / $total_customers,2) . "</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>Total</td>
                    <td>$" . $grand_total . "</td>
                    <td>$" . round($grand_total / $total_orders, 2) . "</td>
                    <td>$" . round($grand_total / $total_customers, 2) . "</td>
                </tr>
            </tfoot>
        </table>";
?>

</body>
</html>