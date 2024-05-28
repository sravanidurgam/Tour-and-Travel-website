<!DOCTYPE html>
<html lang="en">
<head>
  <link href="bootstrap-5.2.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
  .centerform{
    margin: 40px 50px;
    border:2px solid black;
    padding:30px;
  }
</style>
<body>
    <center>

        <img src="allfood.jpg" height="200" width="1500">
  
  
    </center>
    <u><center><h3 class="text-primary">Food Booking Form</h3></u></center>
      <div class="centerform">
      <form class="bg-secondary" method="POST" name="form" action="foodata.php" id="form" class="container-fluid" style="justify-content: center;">
       <table align="center">
        <tr>
          <td>CustomerName</td>
          <td><div><input type="text" name="name" id="uname">
            <small></small>
            </div></td>
        </tr>
        <tr>
            <td>  <p>Select your food</p></td>
            <td>
              <div>
                <select name="fooditem" id="fooditem">
                  <option  value="item">order items</option>
                  <option   value="vegsoup">veg-soup</option>
                  <option  value="pasta">pasta</option>
                  <option  value="paneer">paneer</option>
                  <option  value="icecream">icecream</option>
                  <option  value="juice">juice</option>
                  <option  value="panipoori">panipoori</option>
                  </select>
                  <small></small></div>
            </td>
          </tr>
        <tr>
          <td>PhoneNumber</td>
          <td><div><input type="text" name="phone" id="phone">
            <small></small>
            </div></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><div>
            <textarea rows="5" cols="50" name="address"  required>
            </textarea>
            </div></td>
        </tr>
        <tr>
          <td>Date</td>
          <td><input type="date" name="date" required></td>
        </tr>
        
        <tr>
          <td>Book my order</td>
          <td><input  class="bg-warning" type="submit" name="submit" value="order"></td>
        </tr>
       </table>
      
      </form>
      </div>
      <script>
let form=document.getElementById('form');
form.addEventListener('submit',(e)=>{
    e.preventDefault();
    validate();
})
function validate(){
    let validname=false;
    let name_pattern=/^[a-zA-Z]+$/;
    let uname=document.getElementById('uname');
    if(uname.value.trim()==""){
        setError(uname,"*empty");
        validname=false;
    }
    else if(!(name_pattern.test(uname.value.trim()))){
        setError(uname,"*please check your name once");
        validname=false;
    }
    else{
        setSuccess(uname);
        validname=true;
    }
    let validphone=false;
    let phone=document.getElementById('phone');
    if(phone.value.trim()==""){
        setError(phone,"*empty");
        validphone=false;
    }
    else if(phone.value.length<10 || phone.value.length>10){
        setError(phone,"*please check your mobile number once");
    }
    else if(isNaN(phone.value.trim())){
        setError(phone,"enter digits only");
    }
    else{
        setSuccess(phone);
        validphone=true;
    }
    
    let package=document.getElementById("fooditem");
    let validpack=false;
    if(package.value=="item"){
        setError(package,"*please select a fooditem");
        validpack=false;
    }
    else{
        setSuccess(package);
        validpack=true;
    }
  if(validname && validphone && validpack){
    const submitFormFunction = Object.getPrototypeOf(form).submit;
        submitFormFunction.call(form);
  }
}

function setError(input,msg){
    let parent=input.parentElement;
    let small=parent.querySelector('small');
    small.innerText=msg;
    small.style.color="red";
    }
function setSuccess(input){

    let parent=input.parentElement;
    let small=parent.querySelector('small');
    small.style.visibility="hidden";
}

  </script>

</body>
</html>
<?php
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
