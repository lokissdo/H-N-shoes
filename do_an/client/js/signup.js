let button=document.querySelector("#button_signup");
var warning=document.querySelector("#warning_signup");
//let input=document.querySelectorAll("input")
function buttonclick(e){
    let check=1;
    let countGender=0;
    let input=document.querySelectorAll("input")
    console.log(input)
    for (let i=0;i<input.length;i++){
        if(input[i].name=="male" || input[i].name=="female"){
            if(!input[i].checked){
                if (countGender==0) countGender++;
                else {
                    console.log(countGender)
                    check=0;                    
                    break;
                }
            }
        }
        if(!input[i].value && input[i].name!="birthday"){     
                check=0;
                break;
        }
        // console.log(input[i])
        // console.log("hi")
           //else  if(!input[i].value && input[i].name!="gender" &&input[i].name!="birthday")
    }
    if(check && document.querySelector("#signup_password").value!=document.querySelector("#signup_password_again").value)
    {
        e.preventDefault();
        warning.classList.remove("successSignup");
        warning.textContent="Mật khẩu không trùng khớp!";
        countGender=0;
        setTimeout(()=>{
            warning.textContent="";
        },3000);
        return;
    }

    if(!check || countGender==0 ) {
        e.preventDefault();
        warning.classList.remove("successSignup");
        warning.textContent="Vui lòng điền đủ thông tin!"
        countGender=0;
        setTimeout(()=>{
            warning.textContent="";
        },3000);
        return;
    }
    // e.preventDefault();
    // console.log(countGender," ",check)
        
}
button.addEventListener('click',buttonclick)
function success(){
    warning.classList.add("successSignup");
    warning.innerHTML="Đăng ký thành công !  <a href=./login.php>Đăng nhập</a> ";
}
function error(mess){
 warning.textContent=mess;
 setTimeout(()=>{
     warning.textContent="";
 },3000);
}