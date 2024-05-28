<?php
include "/opt/lampp/htdocs/php_files_practice/boostrap_project/database.php";
$name=$_POST['name'];
$food=$_POST['fooditem'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$day=$_POST['date'];
$sql="insert into food (Name,Food,Phone,Address,Date) values ('$name','$food','$phone','$address','$day');";
$result=mysqli_query($conn,$sql);
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(empty($_POST['name'])){
    echo "username is not recognized<br>";
    echo "<a href='booking.html'>please fill details</a>";
  }
 else{
  session_start();
  $_SESSION['name']=$_POST['name'];
  echo "
    Thank you dear  ".$_SESSION['name'];
  echo " please check your details below";
 }

}
if($_SERVER['REQUEST_METHOD']=="POST"){
$name=$_POST['name'];
$phone=$_POST['phone'];
$day=$_POST['date'];
$address=$_POST['address'];
echo "
<html>
<head>
  <link href='bootstrap-5.2.3-dist/css/bootstrap.min.css' rel='stylesheet'>
  <script src='bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js'></script>
  <style>
table, th, td {
  border:1px solid black;
}
</style>
</head>
    <body>
      <center><img src='success.jpg' height='200' width='200'></center>
      <h2 class='text-center'>Sucessfully Booked your Order!!</h2><br>
      <u><h3 class='text-center'>customer details</h3></u>
      <table style='width:100%'>
  <tr>
    <th>Customer</th>
    <th>PhoneNumber</th>
    <th>Day</th>
    <th>Address</th>
  </tr>
  <tr>
    <td>$name</td>
    <td>$phone</td>
    <td>$day</td>
    <td>$address</td>
  </tr>
  
</table>
    </body>
</html>
";
}
?>
