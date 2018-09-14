<html>
<head> 
<link rel="stylesheet" href="project.css">
</head>
    <header id='topheader'>
    E-SHOPPING
   
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
$test=isset($_COOKIE);
echo "If you have finished shopping.<a href=viewcart.php> Click here</a> to view your cart"
?>