<?php
    /*This page will add values that will be coming from showitems.php to the cart with the userid
     *User id will be obtained by cookie set at the time of login
     * Item code will be passed from the showitem page
     */ 
    $code = $_GET['icode'];
    $quantity = $_GET['quant'];
    if (isset($_COOKIE['user']))
    {
    $user = 'root';
    $password = '';
    $dbname = 'shopping';
    //Conection with database
    $db = new mysqli('localhost', $user, $password, $dbname);
    $user=$_COOKIE['user'];
    //Name and price will be obtained from the product table
     $sql= "SELECT * FROM product WHERE item_code LIKE '$code'";
            $result=$db->query($sql,MYSQLI_STORE_RESULT);
            if($result->num_rows>0)
            {  
                while($row=$result->fetch_assoc())
                {
                         $name=$row['item_name'];
                         $price=$row['price'];
                         $quan=$row['quantity'];
                         if($quan<0)
                                 echo "Item is out of stock";
                }
            }
        /*To check whether the user have same item in the cart
         *If it is present then value will be updated          
         */
    $query= "SELECT * from cart where cart_itemcode LIKE '$code' AND user_id LIKE '$user'";
    $result = $db->query($query,MYSQLI_STORE_RESULT);
     if ($result->num_rows > 0) 
          {
            $query="UPDATE cart SET cart_qty=cart_qty+$quantity WHERE cart_itemcode=$code";
            $db->query($query);
            $query="UPDATE cart SET cart_price=cart_price+$quantity*$price WHERE cart_itemcode=$code";
            $db->query($query);
            $query="UPDATE product SET quantity=quantity-$quantity";
            $db->query($query);
            header("location:checklogin.php");
          }
    //If not present new entry will be done
     else
     {   
         $query = "INSERT INTO cart VALUES ('$code', '$quantity', '$name', '$price','$user')";
    $db->query($query);
       $query="UPDATE product SET quantity=quantity-'$quantity'";
       $db->query($query);
       header("location:checklogin.php");
     }     }
//If user is not logged in hence cookie is not set. Login will be required to add to the cart
     else 
    {
     header("location:login.php");    
    }
?>
