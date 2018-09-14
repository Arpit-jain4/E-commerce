<?php
$code=$_GET['icode'];
    $user='root';  
    $pass='';
    $dbname='shopping';
    $db= new mysqli('localhost',$user,$pass,$dbname) ;
    $user=$_COOKIE;
    if($code==9919)
 $query="DELETE from cart WHERE 1 AND user_id LIKE '$user'";
else {
$query="DELETE from cart WHERE cart_itemcode=$code AND user_id LIKE '$user'"; 
}
$db->query($query);
header("location:checklogin.php");
?>