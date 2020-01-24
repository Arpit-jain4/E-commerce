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
<main> 
           <?php
            $user='root';
            $pass='';
            $dbname='shopping';
            $db=new mysqli('localhost',$user,$pass,$dbname);
            $choice=$_GET['item'];
            $sql= "SELECT * FROM product WHERE category LIKE '$choice'";
            $result=$db->query($sql,MYSQLI_STORE_RESULT);
            if($result->num_rows>0)
            {   echo " <table id='cart'><tr><th>Item code</th><th>Name of item</th><th>Description</th><th>Quantity</th><th>Price</th><th>Details</th></tr>";
                while($row=$result->fetch_assoc())
                {
                         $itemcode=$row['item_code'];
                         $itemname=$row['item_name'];
                         $description=$row['description'];
                         $quantity=$row['quantity'];
                         $price=$row['price'];
                         if($quantity>0)
                         {
                             echo "<tr><td>$itemcode </td><td>$itemname</td><td>$description</td> <td>$quantity</td> <td>$price</td><td><a href=itemdetails.php?icode=$itemcode&iprice=$price>Details</a></td></tr>";
                         }   
                         }   echo "</table";
            }

    ?>
       </main>
       </html>