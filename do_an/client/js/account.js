const warning=document.querySelector(".success-update");
document.forms[1].onsubmit=(e)=>{
    e.preventDefault();
    const params = new URLSearchParams([...new FormData(e.target).entries()]);
    console.log(params.toString())
     fetch("./api/updateaccount.php",{
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
         if(mess==0)
            errorUpdate();
         else successUpdate()
       
    })
}

// Get province in VN
window.onload=()=>{
    fetch("https://provinces.open-api.vn/api/?depth=1")
    .then(response => response.json())
    .then(data => {
        var html="";
        province=province.slice(1);
        for (let i=0;i<data.length;i++){
            if(province==data[i].name) html+=` <option selected value="${data[i].name}"> ${data[i].name} </option>`
            else html+=` <option  value="${data[i].name}"> ${data[i].name} </option>`
        }
        document.querySelector("#select_pro").innerHTML+=html;
        console.log(province)
    })
}

// handle events
function errorUpdate(){
    warning.textContent="Vui lòng điền đầy đủ thông tin";
    warning.classList.remove("hidden")
    setTimeout(()=>{
       warning.classList.add("hidden")
   },3000);
}
function successUpdate(){
    warning.textContent="Cập nhật tài khoản thành công";
    warning.classList.remove("hidden")
}
