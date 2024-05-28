<?php
include "/opt/lampp/htdocs/php_files_practice/boostrap_project/database.php";
$feedback=$_POST['feedback'];

$sql="insert into feedback (suggestion) values ('$feedback');";
$result=mysqli_query($conn,$sql);
if($result){
echo "ok";
}
else{
echo "not ok";
}

?>
