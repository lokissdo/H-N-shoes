var buttonSearch=document.querySelector("#search_form_button");
buttonSearch.onclick=(e)=>{
    let inputt=document.querySelector("#search");
    if(inputt.value==""){
        if(inputt.classList.contains('showInput')){
            inputt.classList.remove("showInput");
        }
       else inputt.classList.add("showInput");
        e.preventDefault();
        console.log("here");   
    }
   
}