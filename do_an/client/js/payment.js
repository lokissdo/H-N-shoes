

var province=document.querySelector("#select_pro")
var district=document.querySelector("#select_dis")
var town=document.querySelector("#select_town")
var warning=document.querySelector(".error")
var btn=document.querySelector("#sumbit_form")
var warning=document.querySelector(".error")
var success=document.querySelector(".payment_sucess_wrap")
var address,namee,phone;
var defaultAddress={
    "province":` <option data-code="null" value="null"> Chọn tỉnh / thành </option>`,
    "district":`<option data-code="null" value="null"> Chọn quận / huyện </option>`,
    "town":`<option data-code="null" value="null">Chọn phường / xã </option>`
}
var data=[]
window.onload=()=>{
    fetch("https://provinces.open-api.vn/api/?depth=3")
    .then(response => response.json())
    .then(res => {
       // console.log(res);
        data=res
        var html=province.innerHTML;
        for (let i=0;i<data.length;i++){
            html+=` <option data-code="${data[i].code}" value="${i}"> ${data[i].name} </option>`
        }
        province.innerHTML=html;

         // Select districts when province changes
        province.onchange=()=>{
            if(province.value!="null"){
             let html=defaultAddress.district;       
             let temp=data[province.value].districts;
             for (let i=0;i<temp.length;i++){
                 html+=` <option data-code="${data[i].code}" value="${i}"> ${temp[i].name} </option>`
             }
             district.innerHTML=html;
             town.innerHTML=defaultAddress.town
            }
            else{
                district.innerHTML=defaultAddress.district
                town.innerHTML=defaultAddress.town
            }
         }

         // Select area when district changes
         district.onchange=()=>{
            if(district.value!="null"){
             let html=defaultAddress.town;       
             let temp=data[province.value].districts[district.value].wards;
             for (let i=0;i<temp.length;i++){
                 html+=` <option data-code="${data[i].code}" value="${i}"> ${temp[i].name} </option>`
             }
             town.innerHTML=html;
            }
            else{
                town.innerHTML=defaultAddress.town
            }
         }
    });
}
var price=document.querySelectorAll(".money");
price.forEach(e=>{
    e.innerText=new Intl.NumberFormat().format(e.innerText)+" đ";
})
function error(){
    warning.textContent="Vui lòng điền đầy đủ thông tin";
    setTimeout(()=>{
       warning.textContent="";
   },3000);
}
btn.onclick=(e)=>{
    e.preventDefault();
   if(district.value=="null"||province.value=="null"||town.value=="null") {
       error()
       return;
   }
    init();
     fetch("./api/process_checkout.php",{
        headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/x-www-form-urlencoded'
        },
        method: "POST",
        body: `name=${namee}&address=${address}&phone=${phone}`
    })
     .then(response => response.json())
     .then(message => {
         console.log(message)
        if(message==0){
            error();
        }
        else isSuccess();
     });
}
function isSuccess(){
    success.classList.remove("hidden");
}
function init(){
     address=document.querySelector("#address").value+
    ','+ document.querySelector("#select_town").selectedOptions[0].innerText+
    ','+ document.querySelector("#select_dis").selectedOptions[0].innerText+
    ','+ document.querySelector("#select_pro").selectedOptions[0].innerText;
    namee=document.querySelector("#name").value
    phone=document.querySelector("#phone").value
}
