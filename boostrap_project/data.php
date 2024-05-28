<?php
include "/opt/lampp/htdocs/php_files_practice/boostrap_project/database.php";
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$day=$_POST['date'];
$package=$_POST['package'];
$sql="insert into info (Name,Email,Phone,Date,Package) values ('$name','$email','$phone','$day','$package');";
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
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$day=$_POST['date'];
$package=$_POST['package'];
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
      <h2 class='text-center'>Sucessfully Booked your Destination!!</h2><br><br><br>
      <u><h3 class='text-center'>customer details</h3></u>
      <table style='width:100%'>
  <tr>
    <th>Customer</th>
    <th>PhoneNumber</th>
    <th>Email</th>
    <th>Day</th>
    <th>Package</th>
  </tr>
  <tr>
    <td>$name</td>
    <td>$phone</td>
    <td>$email</td>
    <td>$day</td>
    <td>$package</td>
  </tr>
  
</table>
    </body>
</html>
";?>
