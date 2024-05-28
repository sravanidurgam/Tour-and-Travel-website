<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
    <u><h1>STAY</h1></u>
    <img src="hotelbook.png" height="200" width="200">
    


  </center>
    <marquee scrollamount="20"><h1 class="text-secondary">Book your Hotel here!!</h1></marquee>
    <u><center><h3 class="text-primary">Booking Form</h3></u></center>
      <div class="centerform">
      <form class="bg-secondary" method="POST" action="staydata.php" id="form" class="container-fluid" style="justify-content: center;">
       <table align="center">
        <tr>
          <td>CustomerName</td>
          <td><div><input type="text" name="name" id="uname">
            <small></small>
            </div></td>
        </tr>
        <tr>
          <td>  <p>Hotels</p></td>
          <td>
            <div>
              <select name="hotel" id="hotel">
                <option  value="choose">choose</option>
                <option   value="hotel1">hotel1</option>
                <option  value="hotel2">hotel2</option>
                <option  value="hotel3">hotel3</option>
                <option  value="hotel4">hotel4</option>
                <option  value="hotel5">hotel5</option>
                <option  value="hotel6">hotel6</option>
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
          <td>EmailId</td>
          <td><div><input type="email" name="email" id="email" required>
            <small></small>
            </div></td>
        </tr>
        <tr>
          <td>Date</td>
          <td><input type="date" name="date" required></td>
        </tr>
        
        <tr>
          <td>Booking</td>
          <td><input  class="bg-info" type="submit" name="submit" value="BookMyTickets"></td>
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
    let validmail=false;
    let mail=document.getElementById('email');
    if(mail.value.trim()==""){
        setError(mail,"*empty");
        validmail=false;
    }
    else{
        setSuccess(mail);
        validmail=true;
    }
    let package=document.getElementById("hotel");
    let validpack=false;
    if(package.value=="choose"){
        setError(package,"*please select a hotel");
        validpack=false;
    }
    else{
        setSuccess(package);
        validpack=true;
    }

  if(validname && validphone && validmail && validpack){
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
$email=$_POST['email'];
$day=$_POST['date'];
$hotel=$_POST['hotel'];
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
      <h2 class='text-center'>Sucessfully Booked your Bus Tickets!!</h2><br>
      <u><h3 class='text-center'>customer details</h3></u>
      <table style='width:100%'>
  <tr>
    <th>Customer</th>
    <th>PhoneNumber</th>
    <th>Email</th>
    <th>Day</th>
    <th>hotel</th>
  </tr>
  <tr>
    <td>$name</td>
    <td>$phone</td>
    <td>$email</td>
    <td>$day</td>
    <td>$hotel</td>
  </tr>
  
</table>
    </body>
</html>
";
}
?>
