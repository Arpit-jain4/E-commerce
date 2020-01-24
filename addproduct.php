<h1> Add Product </h1>
<?php
if (!empty($_POST))
{
	$category=$_POST['category'];
	$pid=$_POST['id'];
	$iname=$_POST['pname'];
	$desc=$_POST['desc'];
	$quan=$_POST['quan'];
	$price=$_POST['price'];
	$imagename=$_POST['imgname'];
	$user='root';
    $password='';
    $dbname='shopping';
    $db=new mysqli('localhost',$user,$password,$dbname);
    $query="INSERT INTO product values ('$pid','$iname','$desc','$category','$quan','$price','$imagename')";
    $db->query($query);
    header("location:selleraccount.php");
 }
else
{
	?>
	<form method="POST">
		<input type="text" name="pname" placeholder="Enter name">
		<br><input type="text" name="id" placeholder="Enter productid">
		<br><input type='text' name="desc" placeholder="Enter description">
		<br><input type="text" name="quan" placeholder='Enter quantity'>
		<br><input type="text" name="price" placeholder="Enter price">
		<br><input type="hidden" name="imgname" value="NULL">
		<br><select name='category'>
			<option>SELECT PRODUCTS CATEGORY</option>
           <option>CAMERA</option>
           <option>MOBILE</option>
           <option>BOOK</option>
		</select>
		<br><input type="submit" value='submit'>
	</form>
<?php
}

