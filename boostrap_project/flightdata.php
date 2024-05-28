<?php
include "/opt/lampp/htdocs/php_files_practice/boostrap_project/database.php";
$name=$_POST['name'];
$flight=$_POST['flight'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$day=$_POST['date'];
$sql="insert into Flight (Name,flight,Phone,Email,Date) values ('$name','$flight','$phone','$email','$day');";
$result=mysqli_query($conn,$sql);
if($result){
echo "ok";
}
else{
echo "sorry";
}
?>
