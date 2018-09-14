
<?php
$code=$_GET['icode'];
$user='root';
    $pass='';
    $dbname='shopping';
    $db=new mysqli('localhost',$user,$pass,$dbname);
    $sql= "SELECT * FROM product WHERE item_code LIKE '$code'";
    $result=$db->query($sql,MYSQLI_STORE_RESULT);
    if($result->num_rows>0)
    {   echo " <table><th><td>Item code</td><td>Name of item</td><td>Description</td><td>Price</td></th>";
       
    while($row=$result->fetch_assoc())
        {
                 $itemcode=$row['item_code'];
                 $itemname=$row['item_name'];
                 $description=$row['description'];
                 $quantity=$row['quantity'];
                 $price=$row['price'];
                 $imgname=$row['imagename'];
                 echo "<img src=image/$imgname.jpg>";
                 echo "<tr><td>$itemcode </td>$itemname</td> <td>$description</td> <td>$quantity</td> <td>$price</td></tr>";
                 echo "<input type='text' name='quantity' id='quant'><button onclick='set()'>Add to cart</button>";
                 echo "<input type='hidden' id='icode' value=$itemcode>";
                 echo "<input type='hidden' id='iname' value=$itemname>";
                 echo "<input type='hidden' id='iprice' value=$price>";
                     
                ?> 
                <script>
          function set()
          {   var cquant=0;
              var ccode=document.getElementById("icode").value;
              var cprice=document.getElementById("iname").value;
              var cname=document.getElementById("iprice").value;
              var cquant=document.getElementById("quant").value;
              window.location.href="addcart.php?icode="+ccode+"&iprice="+cprice+"&iname="+cname+"&quant="+cquant+"";
          }
          
        </script>
           
        <?php  }}
    ?>
        
