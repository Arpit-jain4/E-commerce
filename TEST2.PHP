<?php
if (isset($_COOKIE['user']))
{         $item_code=$_GET['code'];

    $con=new mysqli('localhost','root','');
    $con->select_db("shopping");
    $query="select price from products where item_code = '$item_code'";
    $result = $con->query($query,MYSQLI_STORE_RESULT);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc())
        { $price=$row['price'];
        }
    }
    $quantity=$_GET['quantity'];
    $item_name=$_GET['name'];

    $new_price=$quantity*$price;
    $sess=0.05*$new_price;
    $update_price=$sess+$new_price;

    $sql="update cart set cart_sess=$sess,cart_qty=$quantity,cart_price=$update_price where cart_itmcode='$item_code'";
    $con->query($sql);
    header("location:cart.php");
    echo $con->error;
    $con->close();
}
else
{ echo"please log in";
    header("Refresh:3,url=login.php");
}
?>