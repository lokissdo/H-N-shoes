const $=document.querySelector.bind(document);
const warning=$(".success-update");
$(".update-account-form").onsubmit=(e)=>{
    e.preventDefault();
    if($("input[name=\"new_password\"]").value!=$("input[name=\"new_password_again\"]").value) {
        errorUpdate(-2);
        return;
    }
    const params = new URLSearchParams([...new FormData(e.target).entries()]);
    console.log(params.toString())
     fetch("./api/change_pass.php",{
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
         else successUpdate()
    })
}
// handle messages
function errorUpdate(mess){
   if (mess==0) warning.textContent="Vui lòng điền đầy đủ thông tin";
   else if(mess==-1)warning.textContent="Mật khẩu không chính xác"
   else warning.textContent="Mật khẩu không trùng khớp"
    warning.classList.remove("hidden")
    setTimeout(()=>{
       warning.classList.add("hidden")
   },3000);
}
function successUpdate(){
    warning.textContent="Cập nhật mật khẩu thành công";
    warning.classList.remove("hidden")
}
