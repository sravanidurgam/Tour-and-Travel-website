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
    let package=document.getElementById("package");
    let validpack=false;
    if(package.value=="package"){
        setError(package,"*please select a package");
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
