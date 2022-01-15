const moreBillButton=document.querySelectorAll(".bill-view-more")
const cancelButton=document.querySelectorAll(".bill-cancel")
const offsetToItemproduct=3
moreBillButton.forEach(ele=>{
    ele.onclick=(e)=>{
        var billTarget=e.target.parentNode.children;
        for (let i=2;i<billTarget.length-offsetToItemproduct;i++){
           if(billTarget[i].classList.contains("hidden")) billTarget[i].classList.remove("hidden");
           else billTarget[i].classList.add("hidden");
        }
        e.target.textContent=e.target.textContent=="Xem thêm"?"Ẩn bớt":"Xem thêm";
    }
})
cancelButton.forEach(ele=>{
    ele.onclick=(e)=>{
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
})

