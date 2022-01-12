var buttonSearch=document.querySelector("#search_form_button");
var drop_list=document.querySelectorAll(" .header_drop-list-item")
drop_list.forEach(ele=>{
    ele.onclick=async(e)=>{
       //e.preventDefault();
        await fetch("./api/collection.php",{
            headers: {
                    'Accept': 'application/json, text/plain, */*',
                    'Content-Type': 'application/x-www-form-urlencoded'
            },
            method: "POST",
            body: `cate=${e.target.textContent}`
        })
    }
})
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