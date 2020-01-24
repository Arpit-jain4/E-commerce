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
       <SECTION id="main_section">
<?php
    if(isset($_COOKIE['user']))
    {
    $user='root';  
    $pass='';
    $dbname='shopping';
    $db= new mysqli('localhost',$user,$pass,$dbname) ;
    $user=$_COOKIE['user'];
    $sql = "SELECT * FROM `cart` WHERE user_id LIKE '$user'";
    $result = $db->query($sql,MYSQLI_STORE_RESULT);
    $user=$_COOKIE['user'];
    $tprice=0;
if ($result->num_rows > 0) 
    { 
    echo "<table id='cart'><tr><th>Item code</th><th>Quantity</th><th>Name of item</th><th>Price</th><th>DELETE</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) 
            { 
             $code=$row["cart_itemcode"];       
             $cquantity=$row['cart_qty']; 
             $cprice=$row['cart_price'] ;
             $cname=$row['item_name'];
             $tprice+=$cprice*$cquantity;
             echo "<tr><td>$code</td><td>$cquantity</td><td>$cname</td><td>$cprice</td><td><a href=delete.php?icode=$code>Delete item</a></td></tr>";
            }  
    echo "</table>";
    echo "<br>Total price of cart=$tprice<br>";
    }
    else echo"Looks like you have not selected anything till now<br>";
        echo "<a href=orders.php>View orders</a><br>";
        echo "<a href=delete.php?icode=9919>Delete all</a><br>";
        echo "<a href=checkout.php>Check out</a>";
    }
    else
        header("location:login.php");
?>
       </SECTION>
       </html>