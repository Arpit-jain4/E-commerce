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
$code=$_GET['icode'];
$user='root';
    $pass='';
    $dbname='shopping';
    $db=new mysqli('localhost',$user,$pass,$dbname);
    $sql= "SELECT * FROM product WHERE item_code LIKE '$code'";
    $result=$db->query($sql,MYSQLI_STORE_RESULT);
    if($result->num_rows>0)
    {   
    while($row=$result->fetch_assoc())
        {        
                 $itemcode=$row['item_code'];
                 $itemname=$row['item_name'];
                 $description=$row['description'];
                 $quantity=$row['quantity'];
                 $price=$row['price'];
                 $imgname=$row['imagename'];
                 echo "<img src=image/$imgname.jpg height='100px' width='100px'>";
                 echo " <table id='cart'><tr><th>Item code</th><th>Name of item</th><th>Description</th><th>Price</th><th>Enter quantity</th><th>Add to cart</th></tr>";
                 echo "<tr><td>$itemcode </td><td>$itemname</td> <td>$description</td><td>$price</td>";
                 echo "<td><input type='text' name='quantity' id='quant'></td><td><button onclick='set()'>Add to cart</button></td></tr>";
                 echo "<input type='hidden' id='icode' value=$itemcode>";
                 echo "<input type='hidden' id='iname' value=$itemname>";
                 echo "<input type='hidden' id='iprice' value=$price>";
                     
                ?> 
       <!Values are passed from the database to java script>         
       <script>
          function set()
          {   var cquant=0;
              var ccode=document.getElementById("icode").value;
              var cprice=document.getElementById("iprice").value;
              var cname=document.getElementById("iname").value;
              var cquant=document.getElementById("quant").value;
              window.location.href="addcart.php?icode="+ccode+"&quant="+cquant+"";
          }
          
        </script>
           
        <?php  }}
    ?>
        
</main>
       </html>