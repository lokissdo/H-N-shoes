//  0. Khong tồn tại email
// -1. Một ngày gửi quá 2 lần.
// -2. Mật khẩu mới không khớp
// -3. Mã code sai
// -4. Không đủ thông tin
// -5. Quá giờ
//  1. Thành công.


const waiting_time=80000;
const $=document.querySelector.bind(document);
const warning=$("#message");
var timer_out;
$("#forgot_pass").onsubmit=(e)=>{
    e.preventDefault();
    $("#button_forgot").disabled=true;
    if(isDiffPass()!=1) {
        if(isDiffPass()==0)  errorUpdate(-2);
        else errorUpdate(-4);
        $("#button_forgot").disabled=false;
        return;
      }
    const params = new URLSearchParams([...new FormData(e.target).entries()]);
    console.log(params.toString())
    $(".loader").classList.remove('hidden');
     fetch("./api/forgot_pass.php",{
         headers: {
                'Accept': 'application/json, text/plain, */*',
                 'Content-Type': 'application/x-www-form-urlencoded'
         },
         method: "POST",
        body: params
     })
     .then(response=>response.json())
     .then(mess=>{
        console.log(mess)
         if(mess!=1)
            errorUpdate(mess);
         else {      
            $("#button_forgot").classList.add("hidden")
            $("#code").classList.remove("hidden");
            countDown();
            // successUpdate()
         }
         $("#button_forgot").disabled=false;
         $(".loader").classList.add('hidden');

    })
}

$("#code").onsubmit=(e)=>{
    e.preventDefault();
    const params = new URLSearchParams([...new FormData($("#forgot_pass")).entries()]);
    if(isDiffPass()!=1) {
      if(isDiffPass()==0)  errorUpdate(-2);
      else errorUpdate(-4);
        return;
    }
    var code=$("#password_code").value;
    params.append('code',code)
    console.log(params.toString())
     fetch("./api/verify_forgotpass.php",{
         headers: {
                'Accept': 'application/json, text/plain, */*',
                 'Content-Type': 'application/x-www-form-urlencoded'
         },
         method: "POST",
        body: params
     })
     .then(response=>response.json())
     .then(mess=>{
        console.log(mess)
         if(mess!=1)
            errorUpdate(mess);
         else {      
            successUpdate()
         }
    })
}
function isDiffPass(){
    if($("#new_password").value=="" || $("#new_password_again").value=="") return -1;
    if($("#new_password").value!=$("#new_password_again").value) return 0;
    return 1;
}

// handle messages
function errorUpdate(mess){
    clearTimeout(timer_out);
    warning.classList.remove("success");
    switch(mess){
        case 0:
            warning.textContent="Email không tồn tại";
            break;
        case -1:
            warning.textContent="Bạn đã quên mật khẩu quá 2 lần một ngày"
            break;
        case -2:
            warning.textContent="Mật khẩu không trùng khớp"
            break;
        case -3:
            warning.textContent="Mã code không chính xác"
            break;
        case -4:
            warning.textContent="Vui lòng điền đủ thông tin"
            break;
        case -5:
            warning.textContent="Mã đã hết hạn"
            break;
    }
    timer_out=setTimeout(()=>{
        warning.textContent="";
   },3000);
}
function successUpdate(){
    clearTimeout(timer_out);
    warning.classList.add("success");
    warning.textContent="Cập nhật mật khẩu thành công";
    $(".timer-con").classList.add("hidden");
    timer_out=setTimeout(()=>{
        warning.textContent="";
   },3000);
}
function countDown(){
    $(".timer-con").classList.remove("hidden");
    var des=new Date().getTime()+waiting_time;
    var x=setInterval(()=>{
        var now=new Date().getTime();
        $(".timer").textContent=Math.round((des-now)/1000)+'s';
        if(des-now <= 0){
            $(".timer").textContent="EXPIRED"
            clearInterval(x);
        }
    },1000);
}