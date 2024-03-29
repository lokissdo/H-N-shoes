const $$=document.querySelectorAll.bind(document)
const MaxProductsOnePage=8;
var displayingListProducts=$(".grid.wide").lastElementChild;
var arrayCol=$$(".row");
var arrayCate=$$(".cate_mid_item")
arrayCate.forEach(element => {
    element.onclick=(e)=>{
        var id=e.target.id;
        filter(id);
    }
});
function hasCate(category){
    console.log("hehe")
    arrayCate.forEach(e=>{
        if(e.innerText==category) filter(e.id)     
    })
}
async function filter(id){
    console.log(id);
    for (let i=0;i<arrayCate.length;i++){
        if(arrayCate[i].id!=id) arrayCate[i].classList.remove('chosen')
        else  arrayCate[i].classList.add('chosen')
        
    }
    for (let i=0;i<arrayCol.length;i++){
        if(arrayCol[i].classList.contains(`${id}`)) {
            displayingListProducts=arrayCol[i];
            await changeFilter()
        }
    }
    for (let i=0;i<arrayCol.length;i++){
        if(arrayCol[i].classList.contains(`${id}`)) {
            arrayCol[i].classList.remove('hide-container')      
        }
        else  arrayCol[i].classList.add('hide-container')
    }
    resetLoadBtn(displayingListProducts);
    
}

// Load more
$(".load-more").onclick=()=>{
    var cate=$(".chosen.cate_mid_item")
    console.log(cate.innerText)
    var manu=$("#manufactures").value;
    var sortPrice=$("#price").value;
    fetch("../api/loadmore/collection.php",{
        headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/x-www-form-urlencoded'
        },
        method: "POST",
        body: `gender=${genderPage}&cate=${cate.innerText}&offset=${displayingListProducts.children.length}&manufacture=${manu}&price=${sortPrice}`
    })
    .then(i=>i.json())
    .then(data=>{
     console.log(data)
     if(data=='0') {
        $(".load-more").style.display="none";
     }
     else {
        //  data.forEach(element => {
        //     displayingListProducts.innerHTML+=processData(element);
        //  });
        data.forEach(element => {
            let div=document.createElement("div")
            div.classList.add("col", "m-4", "c-6", "l-3")
            div.innerHTML=processData(element);
            displayingListProducts.appendChild(div);
         });
       if(data.length < MaxProductsOnePage)  $(".load-more").style.display="none";
     }
    });
}
function processData(element){
    //  <div class="col m-4 c-6 l-3">
    // </div>
    return `
                       <div class="container_product">      
                          <div class="prod_container_pic">
                                <img src="${element['photo']}" alt="">
                          </div>
                            <div class="name_product">
                                ${element['name']}
                            </div>
                            <h4># 171305V</h4>
                            <div class="price_product">
                            ${new Intl.NumberFormat().format(element['price'])} VND
                            </div>
                            <a href="../product.php?id=${element['id']} "></a>
                       </div>
                    
    `
}
function resetLoadBtn(key){
   if(!key) key=$(".grid.wide").lastElementChild
    if (key.children.length < MaxProductsOnePage) $(".load-more").style.display="none";
    else $(".load-more").style.display="block";
}
resetLoadBtn()

async function changeFilter(){
    var cate=$(".chosen.cate_mid_item")
    var manu=$("#manufactures").value;
    var sortPrice=$("#price").value;
    await fetch("../api/loadmore/collection.php",{
        headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/x-www-form-urlencoded'
        },
        method: "POST",
        body: `gender=${genderPage}&cate=${cate.innerText}&offset=0&manufacture=${manu}&price=${sortPrice}`
    })
    .then(i=>i.json())
    .then(data=>{
     console.log(data)
     if(data=='0') {
        $(".load-more").style.display="none";
        displayingListProducts.innerHTML="<h1>Không có sản phẩm nào </h1>"
     }
     else {
        //  var html=``;
        //  data.forEach(element => {
        //     html+=processData(element);
        //  });
        //  displayingListProducts.innerHTML=html;
        displayingListProducts.innerHTML='';
         data.forEach(element => {
            let div=document.createElement("div")
            div.classList.add("col", "m-4", "c-6", "l-3")
            div.innerHTML=processData(element);
            displayingListProducts.appendChild(div);
         });
        
       if(data.length < MaxProductsOnePage)  $(".load-more").style.display="none";
       else $(".load-more").style.display="block";
     }
    });

}
$("#price").onchange=()=>{
    changeFilter();
}
$("#manufactures").onchange=()=>{
    changeFilter();
}
