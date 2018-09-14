<html>
<head> 
<link rel="stylesheet" href="project.css">
</head>
    <header id='topheader'>
    E-SHOPPING
    </header>
    <img src="image/download.png" style="height: 70px;width: 70px;margin-left: 1000px;margin-top:0px;">
    
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
       <a href="contact.php">Contact Us</a><br>
       <input type="submit" value="Search">
       </form>
       </aside>
<?php
    $user='root';
    $pass='';
    $dbname='shopping';
    $db=new mysqli('localhost',$user,$pass,$dbname);
    $choice=$_GET['item'];
    $sql= "SELECT * FROM product WHERE category LIKE '$choice'";
    $result=$db->query($sql,MYSQLI_STORE_RESULT);
    if($result->num_rows>0)
    {   echo " <table ><th><td>Item code</td><td>Name of item</td><td>Description</td><td>Price</td></th>";
        while($row=$result->fetch_assoc())
        {
                 $itemcode=$row['item_code'];
                 $itemname=$row['item_name'];
                 $description=$row['description'];
                 $quantity=$row['quantity'];
                 $price=$row['price'];
                 $imgname=$row['imagename'];
                 echo "<tr><td>$itemcode </td>$itemname</td> <td>$description</td> <td>$quantity</td> <td>$price</td><td></td></tr></table>";         ;
                 echo "<a href=itemdetails.php?icode=$itemcode>Details</a><br>";
                
            }   echo "</table";
            }
           
    ?>