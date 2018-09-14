<html>
    <header>
    E-SHOPPING
    <img src="image/download.png">
    </header>
   <body>
       <form action="showitems.php" method="get">
       <aside style="float: left">
       <select name="item">
           <option>SELECT PRODUCTS CATEGORY</option>
           <option>CAMERA</option>
           <option>MOBILE</option>
           <option>BOOK</option>
       </select><br>
       <a href="login.php">Login</a><br>
       <a href="createaccount.php">Create Account</a><br>
       <a href="contact.php">Contact Us</a><br>
       <input type="submit" value="Search">
       </aside>
<?php
$userid=$_GET['user'];
$test=0;
$test=isset($_COOKIE[$userid]);
echo isset($_COOKIE[$userid]);
if(!isset($_COOKIE['$userid']))
    {
echo "Welcome".$userid."to our shopping Mall<br>You can do purchasing by selecting items from the menu on left side";
    }
else 
    echo $test;


?>



