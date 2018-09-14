<?php
$code = $_GET['icode'];
$price = $_GET['iprice'];
$name = $_GET['iname'];
$quantity = $_GET['quant'];
$user = 'root';
$password = '';
$dbname = 'shopping';
$db = new mysqli('localhost', $user, $password, $dbname);
$user=implode($_COOKIE);
echo $user;
/*$query= "SELECT cart_itemcode from cart where cart_itemcode LIKE $code";
$result = $db->query($query,MYSQLI_STORE_RESULT);
 if ($result->num_rows > 0) 
      {
     $query="UPDATE cart SET cart_qty=cart_qty+$quantity WHERE cart_itemcode=$code";
     $db->query($query);
     $query="UPDATE cart SET cart_price=cart_price+$quantity*$price WHERE cart_itemcode=$code";
     $db->query($query);
    header("location:checklogin.php");
      }
 
 else
$query = "INSERT INTO `cart` (`cart_itemcode`, `cart_qty`, `item_name`, `cart_price`,`user_id`) VALUES ('$code', '$quantity', '$name', '$price','')";
$db->query($query);
 header("location:checklogin.php");
*/
//echo mysqli_error($db);
?>
