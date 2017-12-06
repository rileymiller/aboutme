<?php 
  session_start();
 ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>PHP Form</title>
    <meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="form.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
<?php 
        $current = "form";
    ?>
    <?php include '../php/templateHeader.php';?>
    
<hr />
<?php
// define variables and set to empty values
$firstErr = $lastErr = $emailErr = $selectErr = $quantityErr = $donateErr = $costErr = "";
$first = $last = $email = $select = $quantity = $donate = $cost = "";
$success = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["first"])) {
    $firstErr = "First name is required";
    $success = false;
  } else {
    $first = test_input($_POST["first"]);
    if (!preg_match("/^[a-zA-Z  ']*$/",$first)) {
    $firstErr = "Only letters, apostrophes, and white space allowed"; 
    $success = false;
    }
  }
  if (empty($_POST["last"])) {
    $lastErr = "Last name is required";
    $success = false;
  } else {
    $last = test_input($_POST["last"]);
    if (!preg_match("/^[a-zA-Z  ']*$/",$last)) {
    $lastErr = "Only letters, apostrophes, and white space allowed"; 
    $success = false;
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $success = false;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
    $success = false; 
    }
  }
  if (empty($_POST["phones"])) {
    $selectErr = "Item selection required";
    $success = false;
  } else {
    $select = test_input($_POST["phones"]);
  }
  if (empty($_POST["quantity"])) {
    $quantityErr = "Quantity must be greater than 0";
    $success = false;
  } else {
    $quantity = test_input($_POST["quantity"]);
    if((int)$quantity < 1){
      $quantityErr = "Quantity must be greater than 0";
      $success = false;
    }
  }
  if (empty($_POST["donate"])) {
    $donateErr = "Must choose a donation option";
    $success = false;
  } else {
    $donate = test_input($_POST["donate"]);
  }
  if (empty($_POST["cost"])) {
    $costErr = "Must have a cost associated with item";
    $success = false;
  } else {
    $cost = test_input($_POST["cost"]);
  }

  if($success){

  $_SESSION['first'] = $_POST['first'];
  $_SESSION['last'] = $_POST['last'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['phones'] = $_POST['phones'];
  $_SESSION['quantity'] = $_POST['quantity'];
  $_SESSION['donate'] = $_POST['donate'];
  $_SESSION['cost'] = $_POST['cost'];
  $_SESSION['date'] = $_POST['date'];
  var_dump($_SESSION);
  $_POST = array();

  header('Location: form_submit.php');
  exit();
  }

}
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

?>



 <form method="post" id="shop_form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	<h1>PHP Form</h1>
	<p><span class="error">* required field.</span></p>
	<fieldset>
		<legend>Personal Info:</legend>
		First: <input type="text" name="first" value="<?php echo $_POST['first'];?>"><span class="error">* <?php echo $firstErr;?></span> Last: <input type="text" name="last" value="<?php echo $_POST['last'];?>"><span class="error">* <?php echo $lastErr;?></span> <br />
		Email: <input type="email" name="email" value="<?php echo $_POST['email'];?>"><span class="error">* <?php echo $emailErr;?></span> <br />
	</fieldset>
	<fieldset>
		<legend>Item(s)</legend>
		<select id="items" name="phones" value="<?php echo $_POST['phones'];?>">
			<option value=""></option>
			<option value="iphone">iPhone</option>
			<option value="galaxy">Galaxy</option>
			<option value="pixel">Pixel</option>
		</select><span class="error">* <?php echo $selectErr;?></span>
		<h3 id="item_cost"></h3>
		<img id="item_pic" src="" alt="Image for items">
		<input type="hidden" id="cost_val" name="cost" value="<?php echo $_POST['cost'];?>">
		<br />
		Quantity: <input type="number" name="quantity" min="1" value="<?php echo $_POST['quantity'];?>"> <span class="error">* <?php echo $quantityErr;?></span>
		<br />
		Donate: <input type="radio" name="donate" <?php if (isset($_POST['donate']) && $_POST['donate']=="yes") echo "checked";?> value="yes"> Yes <input type="radio" name="donate" <?php if (isset($_POST['donate']) && $_POST['donate']=="no") echo "checked";?> value="no"> No<span class="error">* <?php echo $donateErr;?></span>
		<br />
	</fieldset>
	<input type="hidden" name="date" <?php echo "value=\"" . date("m/d/y H:i") . " MT\""; ?>>
	<input type="submit" name="submit" value="Submit">
	<input type="reset" id="reset" name="reset">
</form>

<?php echo "<script type=\"text/javascript\">

	$('#items').on('change', function() {
		console.log('#items changed');
		if($(this).val() == 'iphone'){
			$('#item_pic').attr('src', '../images/iphone.png');
			$('#item_cost').text('iPhone: $1000');
			$('#cost_val').val('1000');
			$('#item_pic').attr('display', 'block');
			$('#item_cost').attr('display', 'block');
		}
		if($(this).val() == 'galaxy'){
			$('#item_pic').attr('src', '../images/galaxy.png');
			$('#item_cost').text('Galaxy: $900');
			$('#cost_val').val('900');
			$('#item_pic').attr('display', 'block');
			$('#item_cost').attr('display', 'block');
		}
		if($(this).val() == 'pixel'){
			$('#item_pic').attr('src', '../images/pixel.png');
			$('#item_cost').text('Pixel: $800');
			$('#cost_val').val('800');
			$('#item_pic').attr('display', 'block');
			$('#item_cost').attr('display', 'block');
		}
	});
	$('#reset').on('click', function() {
		/*$('#item_pic').hide();
		$('#item_cost').hide();*/
		$('#item_pic').attr('src', '');
		$('#item_cost').text('');
		/*$('#shop_form').trigger('reset');*/
	});
</script>";
/*echo "<script> alert('you suck');</script>";*/
 ?>
 <?php include 'php/form_submit.php';?>
 </body>
 </html>