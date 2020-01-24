<html>
<head> 
<link rel="stylesheet" href="project.css">
</head>
    <header id='topheader'>
        <a href='homepage.php'>E-SHOPPING</a>
   
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

<?php
$user='root';
$password='';
$dbname='shopping';
$db=new mysqli('localhost',$user,$password,$dbname);
$user=$_COOKIE['user'];
$query="SELECT order_no,order_date,shipping_add,shipping_city,shipping_state,shipping_country,paymode,shipping_zipcode FROM orders WHERE user_id LIKE '$user'";
$result=$db->query($query,MYSQLI_STORE_RESULT);
$sql="SELECT item_code,item_name,quantity FROM order_details";
$result1=$db->query($sql,MYSQLI_STORE_RESULT);
$i=0;$k=0;
   echo "<table id='cart'><tr><th>Order no</th><th>Date</th><th>Address</th><th>City</th><th>State</th><th>Country</th><th>Payment</th><th>Zipcode</th><th>Itemcode</th><th>Name</th><th>Quantity</th></tr>";
while($row=$result->fetch_assoc())
{        while($row1=$result1->fetch_assoc())
            {   if($i==$k)
                    {
                        $oitemcode=$row1['item_code'];        
                        $oitemname=$row1['item_name'];
                        $oquantity=$row1['quantity'];
                        $k++;break;
                    }
            
            $k++;        
            }
        $oitemname=$row1['item_name'];
        $oquantity=$row1['quantity'];    
        $ono=$row['order_no'];
        $odate=$row['order_date'];
        $oshipadd=$row['shipping_add'];
        $oshipcity=$row['shipping_city'];
        $oshipstate=$row['shipping_state'];
        $oshipcountry=$row['shipping_country'];
        $opaymode=$row['paymode'];$oshipcode=$row['shipping_zipcode'];
      
        $i++;  

      echo "<tr><td>".$ono."</td><td>".$odate."</td><td>".$oshipadd."</td><td>".$oshipcity."</td><td>".$oshipstate."</td><td>".$oshipcountry."</td><td>".$opaymode."</td><td>".$oshipcode."</td><td>".$oitemcode."</td><td>".$oitemname."</td><td>".$oquantity."</td></tr>";     
}

echo "</table>"

?>

