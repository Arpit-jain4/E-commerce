<html>
<head> 
<link rel="stylesheet" href="project.css">
</head>
    <header id='topheader'>
        <a href='homepage.html'>E-SHOPPING</a>
   
    <img src="image/download.png" style="height: 70px;width: 70px;margin-top:0px;float:right;">
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
       <a href="login.php">Login</a><br>
       <a href="createaccount.php">Create Account</a><br>
       <a href="contactus.php">Contact Us</a><br>
       <input type="submit" value="Search">
       </form>
       </aside>

<?php
    $user='root';  
    $pass='';
    $dbname='shopping';
    $db= new mysqli('localhost',$user,$pass,$dbname) ;
    $user=$_COOKIE;
    $sql = "SELECT * FROM `cart` WHERE user_id LIKE '$user'";
    $result = $db->query($sql,MYSQLI_STORE_RESULT);
    $user=$_COOKIE;
    $tprice=0;
if ($result->num_rows > 0) 
    { 
    // output data of each row
    while($row = $result->fetch_assoc()) 
            { 
             $code=$row["cart_itemcode"];       
             $cquantity=$row['cart_qty']; 
             $cprice=$row['cart_price'] ;
             $cname=$row['item_name'];
             $tprice+=$cprice;
             echo $code."      ".$cquantity."     ".$cprice."      ".$cname."<br>" ."<a href=delete.php?icode=$code>Delete item</a><br>";
            
            }  
    }
        echo "<br>Total price of cart=$tprice<br>";  
        echo "<a href=delete.php?icode=9919>Delete all</a><br>";
        echo "<a href=checkout.php>Check out</a>";
?>