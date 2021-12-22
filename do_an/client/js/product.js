var item=document.querySelector("#add-to-cart")
var tagQuantity=document.querySelector(".cart_text");
var countQuantity=Number(tagQuantity.textContent);
item.onclick=(e)=>{
    e.preventDefault();
    fetch(item.attributes.datalink.value)
    .then(response => response.json())
    .then(data => console.log(data));
    countQuantity++;
    tagQuantity.textContent=countQuantity;
}
