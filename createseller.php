<?php
setcookie('user','10929',time()-86400);
if(!empty($_POST))
{
    $userid=$_POST['userid'];
    $pass=$_POST['pass'];
    $email=$_POST['email'];
    $name=$_POST['name'];
    $city=$_POST['city'];
    $phone=$_POST['number'];
    $user='root';
    $password='';
    $dbname='shopping';
    $flag=0;
    $db=new mysqli('localhost',$user,$password,$dbname);
    $query="INSERT INTO seller values ('$name','$userid','$phone','$email','$city','$pass')";
    $db->query($query);
    $cookiename=$userid;
    $cookievalue=session_id();
    setcookie('user',$userid,time()+86400);
    header("location:selleraccount.php?name=$userid");
}
else{
    ?>
    <form method="POST">
        <table>
            <tr><td>User id:</td><td><input type="text" name="userid"></td></tr>
            <tr><td>Password</td><td><input type="Password" name="pass"></td></tr>
            <tr><td>Name:</td><td><input type="text" name="name"></td></tr>
            <tr><td>City</td><td><input type="text" name="city"></td></tr>
            <tr><td>Number</td><td><input type="text" name="number"></td></tr>
            <tr><td>Email</td><td><input type="text" name="email"></td></tr>
            <tr><td colspan='2'><input type="submit" value="Submit"></td></tr>
        </table>
    </form>
    <?php
    }?>