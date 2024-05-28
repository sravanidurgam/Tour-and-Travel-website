<?php
include "/opt/lampp/htdocs/php_files_practice/boostrap_project/database.php";
$name=$_POST['name'];
$hotel=$_POST['hotel'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$day=$_POST['date'];
$sql="insert into Stay (Name,Hotel,Phone,Email,Date) values ('$name','$hotel','$phone','$email','$day');";
$result=mysqli_query($conn,$sql);
if($result){
echo "ok";
}
else{
echo "sorry";
}
?>
