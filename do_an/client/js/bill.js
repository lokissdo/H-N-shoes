const $$=document.querySelectorAll.bind(document);
var moreBillButton;
var cancelButton;
const offsetToItemProduct=3
const MaxBillsOnePage=8;
const displayingListBils=$$(".bill-item");
refreshButtonsEvents();
function clickMoreProducts(e){
    var billTarget=e.target.parentNode.children;
    for (let i=2;i<billTarget.length-offsetToItemProduct;i++){
       if(billTarget[i].classList.contains("hidden")) billTarget[i].classList.remove("hidden");
       else billTarget[i].classList.add("hidden");
    }
    e.target.textContent=e.target.textContent=="Xem thêm"?"Ẩn bớt":"Xem thêm";
}
function clickCancelBill(e){
    if(!confirm("Bạn có chắc chắn muốn hủy đơn này ?")) return;
        
        var idBillTarget=e.target.parentNode.parentNode.parentNode.id;
        fetch("./api/cancelBill.php",{
            headers: {
                    'Accept': 'application/json, text/plain, */*',
                    'Content-Type': 'application/x-www-form-urlencoded'
            },
            method: "POST",
            body: `id=${idBillTarget}`
        })
        .then(r=>r.json())
        .then(mess=>{
            if(mess=1){
                e.target.textContent="ĐÃ HỦY";
                e.target.parentNode.children[0].textContent="ĐÃ HỦY"
            }
        })
       
    }
    //refresh event click
function refreshButtonsEvents(){
    moreBillButton=$$(".bill-view-more")
     cancelButton=$$(".bill-cancel")
    moreBillButton.forEach(ele=>{
        ele.onclick=clickMoreProducts;
    })
    cancelButton.forEach(ele=>{
        ele.onclick=clickCancelBill;})
}
// Load more bills
if(displayingListBils.length < MaxBillsOnePage) $(".load-more").style.display="none";

$(".load-more").onclick=()=>{
    fetch("./api/loadmore/bill.php",{
        headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/x-www-form-urlencoded'
        },
        method: "POST",
        body: `offset=${displayingListBils.length}`
    })
    .then(i=>i.json())
    .then(data=>{
     console.log(data)
     var html=``;
     var count=0;
     for (let id in data ){
         count++;
         let checkFirstPro=-1, sumOneBill=0;
        html+=`
        <div class="bill-item" id="${id}">
        <div class="row name-table-container ">
            <div class="tb-name-product c-4 m-4 l-4 l-o-2 col"> TÊN SẢN PHẨM</div>
            <div class="l-2 c-2 m-2 col" >SỐ LƯỢNG</div>
            <div class="l-2 c-2 m-2 col">GIÁ</div>
            <div class="l-2 c-2 m-2 col" >THÀNH TIỀN</div>
        </div>
      `
      data[id]['product'].forEach(e=>{
          if(checkFirstPro==-1) {
              checkFirstPro=0
                html+=`<div class="row bill-one-product" >`
          }
          else{
            html+=` <div class="row bill-one-product hidden">`
          }
             html+=`   <div class="product-img c-2 m-2 l-2">  
                    <img src="${e.photo}"alt="">   
                </div> 
                <div class="c-4 m-4 l-4 col">  
                    <div class="product-name ">  
                        ${e.name} 
                    </div> 
                    <div class="product-co-size-del">  
                            <div class="color">Màu: Đen</div>  
                            <div class="size">Size: 39</div>   
                    </div> 
                
                </div> 
                <div class="quantity c-2 m-2 l-2 col"> 
                    ${e.quantity}    
                </div> 
                <div class="one-price c-2 m-2 l-2 col"> ${new Intl.NumberFormat().format(e.price)}   ₫</div>   
                <div class="sum-price c-2 m-2 l-2 col"> 
                ${new Intl.NumberFormat().format(e.price*e.quantity)}   ₫</div>
                <div class="barrier"> </div>   
        </div> 
        `;
        sumOneBill+=e.price*e.quantity;
    })
         html+=`
        <div class="bill-view-more">Xem thêm</div>   
        <div class="infor_delivery">
             <div>Người nhận: <span>${data[id].receiver_name}</span></div>
             <div>Địa chỉ: <span>${data[id].receiver_address}</span></div>
             <div>Số điện thoại liên hệ:<span>${data[id].receiver_phone} </span></div>
         </div>
        <div class="bill-total">
            <div>
                <div class="shipping-fee">Phí ship: 1000</div>
                <div class="total-bill-item">Tổng tiền:  ${new Intl.NumberFormat().format(sumOneBill)} VNĐ</div>
            </div>             
            <div>`;
            if(data[id].receipt_stat=="Mới"){
                html+=` <div class="bill_status">
                                CHƯA ĐƯỢC DUYỆT 
                        </div>
           <div class="bill-cancel">HỦY ĐƠN</div>'`;
            }
            else if(data[id].receipt_stat=="Đã hủy"){
                html+=` <div class="bill_status">
                ĐÃ HỦY
        </div>`;}
        else  html+=` <div class="bill_status"> ĐÃ DUYỆT</div>`
           
        html+=`</div>      
        </div>
    </div>`;
      }
    $(".wrap_bill").innerHTML+=html;
    for(let k=0;k<$$(".load-more").length-1;k++)
    $$(".load-more")[k].classList.add("hidden");
    if(count<MaxBillsOnePage) $(".load-more").style.display="none";
    console.log(count)
    refreshButtonsEvents();
    })
}

