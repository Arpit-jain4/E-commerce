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
if(!empty($_POST))
{
    
    $userid=$_POST['user'];
    $pass=$_POST['password'];
    $user='root';
    $password='';
    $dbname='shopping';
    $db=new mysqli('localhost',$user,$password,$dbname);
    $query="SELECT password FROM customers WHERE userid = '$userid' AND password ='$pass'";
    $result = $db->query($query, MYSQLI_STORE_RESULT);
            
            if(mysqli_num_rows($result)==1) 
            {
                $cookievalue=$userid;
               setcookie('user',$cookievalue,time()+86400);                
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
    <table>
    <tr><td>User id</td><td><input type="text" name="user"></td></tr>
    <tr><td>Password</td><td><input type="password" name="password"></td></tr>
    <tr><td><input type="submit" value="Login"></td>
        <td><button><a href="createaccount.php">New user</a></button></td></tr>
    </table>
<?php } ?>
</main>
</html>