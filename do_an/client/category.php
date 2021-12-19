
<head>
    <link rel="stylesheet" href="asset/category.css">
</head>
<body>
    <div class="categories">
        <div class="cate_top">
            <div class="cate_top_itemLR"></div>
            <div class="cate_top_text">Popular item</div>
            <div class="cate_top_itemLR"></div>
        </div>
        <div class="cate_mid">
            <div class="cate_mid_item cate-men" >
                <h2>
                    Men
                </h2>
                <div>
                </div>
                <a href="#"></a>
            </div>
            <div class="cate_mid_item cate-women">
                <h2>
                    Women
                </h2>
                <div>
                    
                </div>
                <a href="#"></a>

            </div>
            <div class="cate_mid_item cate-kid">
                <h2>
                    Kid
                </h2>
                <div>
                    
                </div>
                <a href="#"></a>

            </div>
        </div>
        <div class="cate_bot"></div>
        <div class="cate_arrow-down"></div>
        

        <!-- <div class="cate_arrow-down"></div> -->
    </div>
    <script>
        var arrow=document.querySelector(".cate_arrow-down");
        var catemen=document.querySelector(".cate-men")
        var catewomen=document.querySelector(".cate-women")
        var catekid=document.querySelector(".cate-kid")
        catemen.addEventListener('mouseover', event => {
            arrow.style['margin-left']="17%";
        })
        catewomen.addEventListener('mouseover', event => {
            arrow.style['margin-left']="45%";
        })
        catekid.addEventListener('mouseover', event => {
            arrow.style['margin-left']="75%";
        })
        console.log(catemen)
    </script>
</body>