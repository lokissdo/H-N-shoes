var now=0;
let mytimeout;
function recursive(){
var a=document.querySelectorAll(".slide");
var arr=document.querySelectorAll(".slide_button");
for (let i=0;i<a.length;i++){
   if(i!=now) {
      a[i].style.display = "none";
      arr[i].classList.add("hovered");
      arr[i].classList.remove("bordered");
   }
   else {
       a[i].style.display="block";
       arr[i].classList.remove("hovered");
       arr[i].classList.add("bordered");
   }
}
now++;
if(now==3) now=0;
mytimeout=setTimeout(recursive,5000);
}
function click(){
var arr=document.querySelectorAll(".slide_button");
for (let i=0;i<arr.length;i++){
 arr[i].onclick=(e)=>{
    clearTimeout(mytimeout);
    now=e.target.id-1;
    recursive();
   }
   }
}
recursive();
click();