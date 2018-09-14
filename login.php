
<html>
    <header>
    E-SHOPPING
    <img src="image/download.png">
    </header>
   <body>
       <form action="showitems.php" method="get">
       <aside style="float: left">
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
       </aside><?php
session_start();
if(isset($_COOKIE))
    header("location:checklogin.php");
if(!empty($_POST))
{
    $userid=$_POST['user'];
    $pass=$_POST['password'];
    $user='root';
    $password='';
    $dbname='shopping';
    $db=new mysqli('localhost',$user,$password,$dbname);
    $query="SELECT password FROM customers WHERE userid = '$userid'";
    $result = $db->query($query, MYSQLI_STORE_RESULT);
   
                if(mysqli_num_rows($result)==1) 
            {
                $cookiename=$userid;
                $cookievalue=session_id();
               setcookie($cookiename,$cookievalue,time()+86400);                
               header("location:accounthome.php?user=$userid");
             
            }
            else
            {   
                echo'The username or password are incorrect!';
            }     
  
} 
else
{
    ?>
<form method="POST">
    User id<input type="text" name="user"><br>
    Password<input type="password" name="password"><br>
    <input type="submit" value="Login">
<?php } ?>
