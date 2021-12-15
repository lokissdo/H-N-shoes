let button=document.querySelector("#button_login");
var warning=document.querySelector("#warning_signin");
function buttonclick(e){
    let input=document.querySelectorAll("input")
    if(!input[0].value ||!input[0].value){
        e.preventDefault();
        warning.textContent="Vui lòng điền đầy đủ thông tin!"
        setTimeout(()=>{
            warning.textContent="";
        },3000);
        return;
    } 
    // e.preventDefault();
    // console.log(countGender," ",check)
        
}
button.addEventListener('click',buttonclick)