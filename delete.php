<?php
$code=$_GET['icode'];
    $user='root';  
    $pass='';
    $dbname='shopping';
    $db= new mysqli('localhost',$user,$pass,$dbname) ;
    $user=$_COOKIE['user'];
    //code 9919 represents that whole cart is needed to be deleted
    if($code==9919)
    {
        $query="SELECT cart_itemcode,cart_qty,cart_price FROM cart WHERE user_id LIKE '$user'";
         $result = $db->query($query,MYSQLI_STORE_RESULT);
         while($row = $result->fetch_assoc()) 
            { 
             $code=$row["cart_itemcode"];       
             $cquantity=$row['cart_qty']; 
             $cprice=$row['cart_price'];
             $query="UPDATE product SET quantity=quantity+'$cquantity' WHERE item_code LIKE '$code'";
             $db->query($query);
             $query="UPDATE cart SET cart_price=cart_price-'$cprice' WHERE user_id LIKE '$user'";
             $db->query($query);
            }
            $query="DELETE from cart WHERE 1 AND user_id LIKE '$user'";
    }
 else 
    { 
     $query="SELECT cart_qty,cart_price FROM cart WHERE cart_itemcode LIKE '$code' AND user_id LIKE '$user'";
              $result = $db->query($query,MYSQLI_STORE_RESULT);
         while($row = $result->fetch_assoc()) 
            {      
             $cquantity=$row['cart_qty']; 
             $cprice=$row['cart_price'];
     $query="UPDATE product SET quantity=quantity+'$cquantity' WHERE item_code LIKE '$code'";
     $db->query($query);
     $query="UPDATE cart SET cart_qty=cart_qty-'$cquantity' WHERE cart_itemcode LIKE '$code' AND user_id LIKE '$user'";
            $db->query($query);}
    //Will delete the item of the specific code 
    $query="DELETE from cart WHERE cart_itemcode LIKE '$code' AND user_id LIKE '$user'"; 
    }
$db->query($query);
echo mysqli_error($db);
header("location:viewcart.php");
?>