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
       <main style="float:middle">
    <h1>For amazing Shopping Experience</h1>
    <h5>You can contact us at following address:</h5>
    <h5><b>PHP shopping Cart site<br>www.onsol.in</b></h5>
    <h5><b>(Delhi)India<br>Phone : 91-8750149169,987654321</b></h5>
    Email:<a href=ashishmittal.id@gmail.com></a>
    </main>
</html>    
            

