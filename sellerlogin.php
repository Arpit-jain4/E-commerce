<?php
if(!empty($_POST))
{
    $userid=$_POST['user'];
    $pass=$_POST['password'];
    $user='root';
    $password='';
    $dbname='shopping';
    $db=new mysqli('localhost',$user,$password,$dbname);
    $query="SELECT password FROM seller WHERE userid = '$userid' AND password ='$pass'";
    $result = $db->query($query, MYSQLI_STORE_RESULT);
            
            if(mysqli_num_rows($result)==1) 
            {
                $cookievalue=$userid;
               setcookie('user',$cookievalue,time()+86400);                
               header("location:selleraccount.php?user=$userid");
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
