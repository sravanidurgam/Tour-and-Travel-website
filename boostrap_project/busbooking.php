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
    
    <img src="bus2.jpeg" height="200" width="200">
      <img src="bus1.png" height="200" width="200">
    


  </center>
    <marquee scrollamount="20"><h1 class="text-secondary">Book your Bus tickets here!!</h1></marquee>
    <u><center><h3 class="text-primary">Booking Form</h3></u></center>
      <div class="centerform">
      <form class="bg-secondary" method="POST" action="busdata.php" id="form" class="container-fluid" style="justify-content: center;">
       <table align="center">
        <tr>
          <td>CustomerName</td>
          <td><div><input type="text" name="name" id="uname" class="form-control">
            <small></small>
            </div></td>
        </tr>
        <tr>
          <td>  <p>Buses</p></td>
          <td>
            <div>
              <select name="bus" id="bus">
                <option  value="choose">choose</option>
                <option   value="hyderbad">Hyderbad</option>
                <option  value="bangalore">Bagalore</option>
                <option  value="tirupathi">Tirupathi</option>
                <option  value="vijayawada">Vijayawada</option>
                <option  value="vizag">Vizag</option>
                <option  value="chennai">chennai</option>
                </select>
                <small></small></div>
          </td>
        </tr>
        <tr>
          <td>PhoneNumber</td>
          <td><div><input type="text" name="phone" id="phone" class="form-control">
            <small></small>
            </div></td>
        </tr>
        <tr>
          <td>EmailId</td>
          <td><div><input type="email" name="email" id="email"  class="form-control" required>
            <small></small>
            </div></td>
        </tr>
        <tr>
          <td>Date</td>
          <td><input type="date" name="date" class="form-control" required></td>
        </tr>
        
        <tr>
          <td>Booking</td>
          <td><input  class="form-control bg-info" type="submit" name="submit" value="BookMyTickets"></td>
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
    let package=document.getElementById("bus");
    let validpack=false;
    if(package.value=="choose"){
        setError(package,"*please select a Bus");
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
$bus=$_POST['bus'];
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
    <th>BUS</th>
  </tr>
  <tr>
    <td>$name</td>
    <td>$phone</td>
    <td>$email</td>
    <td>$day</td>
    <td>$bus</td>
  </tr>
  
</table>
    </body>
</html>
";
}
?>
