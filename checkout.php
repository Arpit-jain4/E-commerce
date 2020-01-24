<html>
<head> 
<link rel="stylesheet" href="project.css">
</head>
    <header id='topheader'>
        <a href='homepage.html'>E-SHOPPING</a>
   
    <a href="viewcart.php"><img src="image/download.png" style="height: 70px;width: 70px;margin-top:0px;float:right;"></a>
    </header>
   <body>
       <aside style="float: left" id="dialogue_box">
       <form action="showitems.php" method="get">
      Category:
       <select name="item">
           <option>SELECT PRODUCTS CATEGORY</option>
           <option>CAMERA</option>
           <option>MOBILE</option>
           <option>BOOK</option>
       </select><br>
       <?php
       //To check whether the cookie is set or not
       if(!isset($_COOKIE['user']))
       { 
           echo"<a href=login.php>Login</a><br>";
       }
       else
       {
       echo "<a href=logout.php>Logout</a><br>";
       }
       ?>
       <a href="createaccount.php">Create Account</a><br>
       <a href="contactus.php">Contact Us</a><br>
       <input type="submit" value="Search">
       </form>
       </aside>
       <section id="main_section">
           <?php
            if(!empty($_POST))
            {
                $num=0;
                $user='root';
                $password='';
                $dbname='shopping';
                $db=new mysqli('localhost',$user,$password,$dbname);
                $query="SELECT * from orders";
                $result = $db->query($query,MYSQLI_STORE_RESULT);
            //Get the number order number from orders table
                while($row = $result->fetch_assoc()) 
             { 
             $temp=$row["order_no"];
             if($temp>$num)
                 $num=$temp;
             }
             //Will get the maximum order number from table orders and then increase it by one to set the current order number
              $num++;
              $add=$_POST['Address'];
              $user=$_COOKIE['user'];
              $city=$_POST['city'];
              $state=$_POST['State'];
              $country=$_POST['Country'];
              $zip=$_POST['Zcode'];
              $paymode=$_POST['mode'];
              $date=date('d/m/y');
              //Inserting the values in order_details table
              $query="INSERT INTO `orders` (`order_no`, `order_date`, `shipping_add`, `shipping_city`, `shipping_state`, `shipping_country`, `paymode`, `shipping_zipcode`, `user_id`) VALUES ('$num', '$date', '$add', '$city', '$state', '$country', '$paymode', '$zip', '$user')";
              $db->query($query);
              //transfering information from cart table to orders table
              $sql = "SELECT * FROM `cart` WHERE user_id LIKE '$user' ";
              $result = $db->query($sql,MYSQLI_STORE_RESULT);
              if ($result->num_rows > 0) 
    { 
    
    while($row = $result->fetch_assoc()) 
            {        
             $code=$row['cart_itemcode'];
             $cquantity=$row['cart_qty']; 
             $cprice=$row['cart_price'] ;
             $cname=$row['item_name'];
             $price=$cprice*$cquantity;
             $query="INSERT INTO `order_details` (`order_no`, `item_code`, `item_name`, `quantity`, `price`) VALUES ('$num', '$code', '$cname', '$cquantity', '$price')";
             $db->query($query); 
            $query="DELETE FROM cart WHERE 1 AND user_id LIKE '$user'";
            $db->query($query);
            }
             echo "Your order is received and we will deliver it soon<br>Remember your order number is $num";
            
            }}
 else {
     ?>
           <form method="POST">
               <table>
               <tr><td>Address to deliver at:</td><td><input type="text" name="Address"></td></tr>
               <tr><td>City:</td><td><input type="text" name="city"></td></tr>
               <tr><td>State:</td><td><input type="text" name="State"></td></tr>
               <tr><td>Country:</td><td><input type="text" name="Country"></td></tr>
               <tr><td>Zip code:</td><td><input type="text" name="Zcode"></td></tr>
               <tr><td>Payment mode</td><td>
                       <select name="mode"><option>Cash</option>
                           <option>Paytm</option>
                       </select>
                   </td></tr>
               <tr><td colspan="2"><input type="submit" value="Submit"></td></tr>
               </table> 
              </form>
<?php               }
?>
