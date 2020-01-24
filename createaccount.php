<html>
    <head>
        <script>
             var check = function() 
             {
               if (document.getElementById('password').value ==document.getElementById('confirm_password').value) 
                 {
                    document.getElementById('message').style.color = 'green';
                    document.getElementById('message').innerHTML = 'matching';
                 }
               else 
                 {
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = 'not matching';
                 }
             }
                var check1=function()
                {
                    if (document.getElementById('password').value.length<8)
                    {
                        document.getElementById('message1').style.color='red';
                        document.getElementById('message1').innerHTML='Length should be more than 8';
                    }
                }
               var check2=function()
               {
                   if(document.getElementById('phone').value.length!=10)
                   {
                       document.getElementById('message2').style.color='red';
                       document.getElementById('message2').innerHTML='Phone number invalid';
                   }
                   else
                   {
                       document.getElementById('message2').innerHTML=' ';
                   }
               }
        </script>
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
       //To check whether the cookie is set or not. If cookie is set a user is already logged in.
       if(isset($_COOKIE['user']))
       { //If cookie is set then login option will be provided
           echo"<a href=login.php>Login</a><br>";
       }
       else
       { //If cookie is set. A user is already logged in hence logout will be the option
       echo "<a href=logout.php>Logout</a><br>";
       }
       ?>
       <a href="createaccount.php">Create Account</a><br>
       <a href="contactus.php">Contact Us</a><br>
       <input type="submit" value="Search">
       </form>
       </aside>
       <main style="float: middle"> 
           <h1><b>Welcome to our Shopping Mall</b></h1>
      <h4><b> We provide a wide range of items ranging from luxury items to electronic items</b></h4>
      </main>
    </body>
</html>
<?php
setcookie('user','10929',time()-86400);
if(!empty($_POST))
{
    $userid=$_POST['userid1'];
    $pass=$_POST['password'];
    $fname=$_POST['fname1'];
    $lname=$_POST['lname1'];
    $add11=$_POST['add1'];       
    $add22=$_POST['add2'];
    $city=$_POST['city1'];        
    $state=$_POST['state1'];        
    $country=$_POST['country1'];        
    $zcode=$_POST['zipcode1'];        
    $email=$_POST['emailid1'];
    $phno=$_POST['phnno1'];  
    $user='root';
    $password='';
    $dbname='shopping';
    $flag=0;
    $db=new mysqli('localhost',$user,$password,$dbname);
    /*while($flag==0)
    {
        $sql= "SELECT userid FROM customers WHERE category LIKE '$userid'";
    $result=$db->query($sql,MYSQLI_STORE_RESULT);
    if($result->num_rows>0)
    {
        echo "User id already exist";  
        $flag=1;
    }
    }*/
       $sql= "INSERT INTO customers  VALUES ('$userid','$fname', '$lname', '$add11', '$add22', '$city', '$state','$zcode', '$email','$pass','$phno','$country')";
       $db->query($sql); 
       $cookiename=$userid;
                $cookievalue=session_id();
                setcookie('user',$userid,time()+86400);
                header("location:accounthome.php?name=$userid");
                
}
else
    {
?><main style="float:middle">
<form method="post">
    <table>
<tr><td>User id:</td><td><input type="text" name="userid1"></td></tr>
<tr><label><td>Password</td> 
    <td><input name="password" id="password" type="password" onkeyup='check();' onblur='check1();' /><span id='message1'></span></td>
</label></tr>
<tr>
<label><td>Confirm password</td>
 <td> <input type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' /> 
  <span id='message'></span></td>
</label></tr>
    <tr>
<td>First name:</td><td><input type="text" name="fname1"></td>
    </tr>
    <tr>
        <td>Last name:</td><td><input type="text" name="lname1"></td>
    </tr>
    <tr>
<td>Address1:</td><td><input type="text" name="add1"></td>
     </tr>
     <tr>
    <td>Address2:</td><td><input type="text" name="add2"></td>
</tr>
<tr><td>City:</td><td><input type="text" name="city1"></td></tr>
<tr><td>State:</td><td><input type="text" name="state1"></td></tr>
<tr><td>Country:</td><td><input type="text" name="country1"></td></tr>
<tr><td>Zip code:</td><td><input type="text" name="zipcode1"></td></tr>
<tr><td>Email Id:</td><td><input type="text" name="emailid1"></td></tr>
<tr><td><label>Phone no.:</td><td><input type="text" name="phnno1" id="phone" onkeyup="check2();" ></td><td><span id='message2'></span></td></tr>
<tr><td colspan='2'><input type="submit" value="Submit"></td></tr>
</table>
</main>
<?php
}
?>