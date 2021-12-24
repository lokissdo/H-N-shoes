let button=document.querySelector("#button_login");
var warning=document.querySelector("#warning_signin");
function buttonclick(e){
    let input=document.querySelectorAll("input")
    if(!input[0].value ||!input[1].value){
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
function error(mess){
     warning.textContent=mess;
     console.log(mess);
     setTimeout(()=>{
        warning.textContent="";
    },3000);
    //console.log(mess);
}
var string = "Chào mừng các bạn đến với website của chúng tôi! Hãy đăng nhập để có những trải nghiệm tốt nhất"; /* type your text here */
var array = string.split("");
var loopTimer;
function frameLooper () {
	if (array.length > 0) {
		var text=document.querySelector(".intro_description").textContent 
        text=text.slice(0,-1);
        console.log(text);
        document.querySelector(".intro_description").textContent = text+array.shift()+'|';
	    loopTimer = setTimeout(frameLooper,70); 
	} else {
        document.querySelector(".intro_description").textContent=document.querySelector(".intro_description").textContent.slice(0,-1);
		clearTimeout(loopTimer);
    }
}
frameLooper();

