var arrayCol=document.querySelectorAll(".row");
var arrayCate=document.querySelectorAll(".cate_mid_item")
arrayCate.forEach(element => {
    element.onclick=(e)=>{
        var id=e.target.id;
        filter(id);
    }
});
function hasCate(category){
    arrayCate.forEach(e=>{
        if(e.innerText==category) filter(e.id)     
    })
}
function filter(id){
    for (let i=0;i<arrayCol.length;i++){
        if(arrayCol[i].classList.contains(`${id}`)) arrayCol[i].classList.remove('hide-container','chosen')
        else  arrayCol[i].classList.add('hide-container','chosen')
    }
    for (let i=0;i<arrayCate.length;i++){
        if(arrayCate[i].id!=id) arrayCate[i].classList.remove('chosen')
        else  arrayCate[i].classList.add('chosen')
        
    }
}