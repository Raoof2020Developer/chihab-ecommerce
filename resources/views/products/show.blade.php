<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$product->name}}</title>

    <style>
        @font-face {
    font-family: 'noto_kufi_arabicregular';
    src: url('/kit/notokufiarabic-variablefont_wght.woff2') format('woff2'),
         url('/kit/notokufiarabic-variablefont_wght.woff') format('woff');
    font-weight: normal;
    font-style: normal;

}
        
* {
            font-family: 'noto_kufi_arabicregular' !important;
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

button, button:hover, button:active, button:focus {
    border: none;
    background: none;

}

.top-header {
    text-align: center;
    font-size: .875rem;
    font-weight: 500;
    background-color: #54B435;
    padding: 0 2rem;
}

.main-header {
    padding: .5rem;
    background-color: #F3F3F3;
}

.container {
    max-width: 335px;
    margin: 0 auto;
}

.inline-nav {
    display: none;
}

.logo {
    display: none;
}

.nav-menu .nav-collapse {
    background: unset;
    border: unset;
    outline: unset;
    font-size: 1.085rem;
    font-weight: bold;
    cursor: pointer;
    padding: .5rem;
}

.nav-menu .nav-collapse:active {
    border: 1px dotted black;
}

.nav-list {
    list-style: none;
    background-color: #F3F3F3;
    position: absolute;
    width: 100%;
    top: -100%;
    left: 0;
    padding: .5rem .6rem 1.6rem 0;
    line-height: 1.1;
    transition: .3s;
}

.nav-list.active {
    list-style: none;
    background-color: #F3F3F3;
    position: absolute;
    width: 100%;
    top: 0;
    left: 0;
    padding: .5rem .6rem 1.6rem 0;
    line-height: 1.1;
    transition: .3s;
}

.nav-item:first-child {
    text-align: center;
    color: rgba(0, 0, 0, .5);
}

.nav-item::after {
    content: '';
    display: inline-block;
    width: 100%;    
    height: 1px;
    background-color: rgba(0, 0, 0, .1);
}

.nav-link {
    text-decoration: none;
    color: initial;
    font-size: .8rem;
    font-weight: 600;
}

.product {
    min-height: 100vh;
}

.product-title {
    color: #000000;
    font-size: 1.7rem;
    font-weight: bold;
    padding: 1rem 0;
}


.price {
    color: #54B435;
    font-size: 1.4rem;
    font-weight: 700;
    margin-left: 1rem;
}

.selling-price {
    text-decoration: line-through;
    opacity: .5;
}

.product-images {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.main-img-wrapper {
    border: 1px solid black;
    position: relative;
    width: 342px;
    height: 342px;    
}

.active-img {
    display: inline-block;
    object-fit: cover;
    object-position: center;
}

.discount-text {
    position: absolute;
    left: 0;
    background-color: #54B435;
    font-size: .825rem;
    padding: 0 .67rem;
    color: white;
    font-weight: 500;
}

.images-list {
    display: flex;
    gap: 1rem;
    padding: 1rem 0;
    margin-right: 1rem;

}

.images-list img {
    width: 72px;
    height: 72px;
    cursor: pointer;
    opacity: .5;
}

.images-list img.active {
    cursor: pointer;
    border: 1px solid black;
    opacity: 1;
}

.order-card {
    border: 2px solid black;
    border-radius: .4rem .8rem;
    background-color: #F4F4F4;
    padding: .5rem;
    margin-bottom: 4rem;
    height: 570px;
    overflow: scroll;
    margin: 1rem;
}

.order-card-title {
    text-align: center;
    font-weight: 500;
    background-color: #fff;
    padding: .5rem;
    width: fit-content;
    margin: 0 auto;
    font-size: 1.3rem;
    margin-bottom: 1.5rem;
}

input, select {
    border: 2px solid black;
    display: block;
    width: 98%;
    margin: 0 auto;
    margin-bottom: .5rem;
    padding: 1rem;
    font-size: 1.12rem
    
}

.counter {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.counter > div {
    border: 2px solid black;
    padding: .3rem .6rem;
    font-size: 1.2rem;
    border-radius: .5rem;
}

.counter .plus,
.counter .minus {
    cursor: pointer;
}

.order-summary {
    padding: 1rem;
}

.order-summary hr {
    border: unset;
    height: 2px;
    background: #000000
}

.order-summary-title {
    font-size: .925rem;
    font-weight: 500;
    margin-bottom: .6rem;
}

.order-summary-title i {
    font-size: 1.125rem
}

.order-summary-list {
    list-style-type: none;
    line-height: 1.8;
    max-height: 0;
    overflow: hidden;
}

.order-summary-list li {
    border-bottom: 2px dotted black;
    padding: 1rem;
    font-size: .905rem;
    font-weight: 500;
    display: flex;
    justify-content: space-between
}

.order-summary-btn {
    display: block;
    text-align: center;
    background-color: #54B435;
    padding: 1rem;
    width: 100%;
    margin-top: 1rem;
    color: white;
    font-size: 1rem;
    font-family: 'Noto Kufi Arabic' , sans-serif;
    cursor: pointer;
    transition: .3s;
}

.order-summary-btn:hover {
    background-color: rgba(84, 180, 53, .95);
}

.footer {
    margin-top: 2rem;
    background-color: #f3f3f3;
    padding: 3rem 1.5rem;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: space-around;
    gap: 2rem;
    font-weight: 500;

}

.order-fixed-btn {
    padding: .6rem;
    text-align: center;
}

.order-fixed-btn button {
    padding: .5rem 2rem;
    font-size: 1.1rem;
    font-weight: 500;
    display: inline-block;
    color: white;
    font-family: 'Noto Kufi Arabic';
    background-color: #54B435;
    cursor: pointer;
    position: relative;
    left:1rem;
    text-decoration: none;
    animation-name: move;
    animation-duration: 1.5s;
    transition: .3s;
    animation-iteration-count: infinite;
}

.order-fixed-btn a:hover {
    background-color: #579b41;
}

@keyframes move {
    0% {
        transform: translateX(.6rem);
    }

    25% {
        transform: translateX(-.6rem);
    }

    50% {
        transform: translateX(-.6rem);
    }

    100% {
        transform: translateX(.6rem);
        
    }
}

.copyright {
    background-color: #54B435;
    padding: 1rem
}

.links { 
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1.5rem;
    margin-bottom: 1rem;
    padding-top: 1rem;
}

.links a {
    text-decoration: none;
    color: #000000;
}

.links a:hover {
    text-decoration: underline;
}

.copyright p {
    color: rgb(49, 50, 54);
}

.description {
    margin-right: 1.6rem;
}

.description h3 {
    margin-bottom: 1.5rem;
}

.description div {
    max-width: 300px;
    max-height: 180px;
    overflow: scroll;
    margin-bottom: 2.4rem;
    padding: 1rem;
    width: 95vw;
}
.description div h3{
    color: #54B435;
}

.description div ul {
    margin-bottom: 1.5rem;
    margin-top: 1rem;
}

.description div img {
    width: 180px;
    border: 1px solid black;
    padding: 1rem;
}

.description div ul li {
    display: list-item;
    list-style: square;
    margin-right: 1rem;
    font-size: .975rem;
}
@media screen and (min-width: 375px) {
    .container {
        max-width: 628px;
    }
}

@media screen and (min-width: 981px) {


    .container {
        max-width: 1024px;
        display: flex;
        justify-content: space-between;
    }
    .top-header .container{
        justify-content: center;
        align-items: center;
    }

    .main-header .container {
        align-items: center;
    }

    .nav-menu .nav-collapse {
        display: none !important;
    }
    .logo {
        display: inline-block;
    }

    .nav-menu .inline-nav {
        display: flex;
        gap: 1.5rem;
        list-style-type: none;
        align-items: center;
    }

    .nav-menu ul:first-child a {
        text-decoration: none;
        transition: .2s;
        color: #000000;
    }

    .nav-menu ul:first-child a:hover {
        text-decoration: underline;
        color: #3d3d3d;
    }

    .product {
        margin-top: 2rem;
    }

    .product .container > div:last-child {
        height: 500px;
        overflow-y: scroll;
    }

    .order-card {
        width: 500px;
        margin-top: 3rem;
    }

    .description h3 {
        text-align: center;
        position: relative;
        left: 1.8rem;
        font-size: 1.5rem;
    }
    
    .description div {
        margin-bottom: 2.4rem;
        max-width: 490px;
        overflow: unset;
        text-align: center;

    }
    .description div img {
        width: 260px;
    }
    .footer, .copyright {
        text-align: center;
    }

    #footer .container  {
        display: flex;
        justify-content: center;
    }

    .footer .container {
        display: flex;
        justify-content: space-around;
        align-items: center;
        gap: 2rem;
    }  
}

    </style>
</head>
<body>
    <header class="top-header">
        <div class="container">
            👇 اطلب الآن ! وادفع عند الاستلام 🙏 توصيل الى 58 ولاية 🇩🇿 
        </div>
    </header>

    <header class="main-header">
        <div class="container">
            <h1 class="logo">CHIHAB SHOP</h1>
            <nav class="nav-menu">
                <ul class="inline-nav">
                    <li>
                        <a href="">من نحن؟</a>
                    </li>

                    <li>
                        <a href="">اتصل بنا</a>
                    </li>

                    <li>
                        <a href="">سياسة الخصوصية</a>
                    </li>
                </ul>
                <button class="nav-collapse">
                    <svg height="25px" version="1.1" viewBox="0 0 25 25" width="25px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="TabBar-Icons" stroke="none" stroke-width="1"><g fill="#000000" id="Hamburger-Round"><path d="M0,4 C0,2.8954305 0.889763236,2 2.00359486,2 L22.9964051,2 C24.10296,2 25,2.88772964 25,4 C25,5.1045695 24.1102368,6 22.9964051,6 L2.00359486,6 C0.897039974,6 0,5.11227036 0,4 L0,4 Z M0,12 C0,10.8954305 0.889763236,10 2.00359486,10 L22.9964051,10 C24.10296,10 25,10.8877296 25,12 C25,13.1045695 24.1102368,14 22.9964051,14 L2.00359486,14 C0.897039974,14 0,13.1122704 0,12 L0,12 Z M0,20 C0,18.8954305 0.889763236,18 2.00359486,18 L22.9964051,18 C24.10296,18 25,18.8877296 25,20 C25,21.1045695 24.1102368,22 22.9964051,22 L2.00359486,22 C0.897039974,22 0,21.1122704 0,20 L0,20 Z" id="Hamburger"/></g></g></svg>
                </button>

                <ul class="nav-list">
                    <li class="nav-item">
                        القائمة الرئيسية
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about">
                            من نحن؟
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about">
                            ماذا نبيع؟
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about">
                            اتصل بنا
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        
    </header>

    <div class="product">
        <div class="container">
            <div>
                <h3 class="product-title">{{$product->name}}</h3>
                <div class="product-price">
                    <span class="selling-price price">{{$product->price_of_selling}} د.ج</span>
                    <span class="discount-price price">{{$product->price_after_discount}} د.ج</span>
                </div>
                <div class="product-images">
                    <div class="main-img-wrapper">
                        <img src="{{asset('storage/'.$product->img_one_path)}}" alt="" class="active-img {{$product->price_after_discount != null ? 'discount' : ''}}" lazy width="340" height="340">
                        <span class="discount-text">تخفيض!</span>
                        <span class="zoom-icon">
                        </span>
                    </div>

                    <div class="images-list">
                        <img src="{{asset('storage/'.$product->img_one_path)}}" alt="" class="product-img active"  width="72" height="72">
                        <img src="{{asset('storage/'.$product->img_two_path)}}" alt="" class="product-img" width="72" height="72">
                        <img src="{{asset('storage/'.$product->img_three_path)}}" alt="" class="product-img" width="72" height="72">
                        <img src="{{asset('storage/'.$product->img_four_path)}}" alt="" class="product-img"  width="72" height="72">
                    </div>
                </div>
            </div>

            <div>
                <div class="order-card">
                    <h3 class="order-card-title">للطلب أدخـل معلوماتك</h3>
    
                    <form action="{{route('orders.store')}}" id="orderForm" method="POST">
                        @csrf
                        <input type="text" name="name_of_client" id="name_of_client" placeholder="Nom | الاسم 👨‍🦱">
    
                        <input type="text" name="phone_number" id="phone_number" placeholder="Téléphone | الهاتف 📞">
    
                        <select name="client_wilaya" id="client_wilaya">
                            <option disabled selected>Wilaya | الولاية 📍</option>
                        </select>
                        <input type="text" name="client_baladiya" id="client_baladiya"  placeholder="Comune | البلدية📌"/>
                        
                        <div class="counter">
                            <div class="minus">-</div>
                            <div class="counter-value">1</div>
                            <div class="plus">+</div>
                            
                            <input type="hidden" name="quantity_ordered" id="quantity_ordered" value="1">
                        </div>
                        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
    
                        <input type="hidden" name="delivery_price" id="delivery_price" value="800" >
                        <div class="order-summary">
                            <h3 class="order-summary-title" style="display:flex; align-items:center;gap: .5rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" style="width: 24px;" id="cart"><path d="M8.5,19A1.5,1.5,0,1,0,10,20.5,1.5,1.5,0,0,0,8.5,19ZM19,16H7a1,1,0,0,1,0-2h8.49121A3.0132,3.0132,0,0,0,18.376,11.82422L19.96143,6.2749A1.00009,1.00009,0,0,0,19,5H6.73907A3.00666,3.00666,0,0,0,3.92139,3H3A1,1,0,0,0,3,5h.92139a1.00459,1.00459,0,0,1,.96142.7251l.15552.54474.00024.00506L6.6792,12.01709A3.00006,3.00006,0,0,0,7,18H19a1,1,0,0,0,0-2ZM17.67432,7l-1.2212,4.27441A1.00458,1.00458,0,0,1,15.49121,12H8.75439l-.25494-.89221L7.32642,7ZM16.5,19A1.5,1.5,0,1,0,18,20.5,1.5,1.5,0,0,0,16.5,19Z"></path></svg>                                ملخص الطلـب
                            </h3>
                            <hr>
    
                            <ul class="order-summary-list">
                                <li class="order-summary-item price-of-unit">
                                    <span>سعر المنتج</span>
                                    <span>{{$product->price_after_discount != null ? $product->price_after_discount : $product->price_of_selling }} د.ج</span>
                                </li>
    
                                <li class="order-summary-item quantity">
                                    <span>الكميـة</span>
                                    <span>1</span>
                                </li>
    
                                <li class="order-summary-item price-of-delivery">
                                    <span>سعر التوصيـل</span>
                                    <span>0 د.ج</span>
                                </li>
    
                                <li class="order-summary-item total-price">
                                    <span>السعر الإجمالي</span>
                                    <span>{{$product->price_after_discount}} د.ج</span>
                                </li>
                            </ul>
                        
                            <button type="submit" class="order-summary-btn">Acheter | اشتري الآن 🛒</button>
                        </div>
                    </form>
                </div>
    
                <div class="description">
                    <h3>الوصف</h3>
                    <div>
                       {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="order-fixed-btn">
        <button type="submit" form="orderForm">اطلب الآن</button>
    </div>
    
    <div id="footer">
        <footer class="footer">
            <div class="container">
                <p>لديك سؤال ما؟ اتصل بنا حالا.</p>
                <h3>الهاتـف: 0550</h3>
            </div>
        </footer>
    
        <div>
        <div class="container">
            <ul class="links">
                <li>
                    <a href="">من نحن؟</a>
                </li>
        
                <li>
                    <a href="">اتصل بنا</a>
                </li>
        
                <li>
                    <a href="">سياسة الخصوصية</a>
                </li>
            </ul>
        </div>
        </div>
        <div class="copyright">
    
            <p>CHIHAB SHOP 2023 &copy; جميع الحقوق محفوظة</p>
        </div>
    </div>

    <script>

const collapseBtn = document.querySelector('.nav-collapse')
        const navList = document.querySelector('.nav-list')
        const productArea = document.querySelector('.product')

        collapseBtn.addEventListener('click', () => {
            navList.classList.add('active')
        })

        productArea.addEventListener('click', () => {
            navList.classList.remove('active')
        })

        //

        const minusBtn = document.querySelector('.minus')
        const plusBtn = document.querySelector('.plus')
        const counterValueElement = document.querySelector('.counter-value')
        const quantityElement = document.querySelector('.quantity span:last-child')
        const quantityOrderedInput = document.getElementById('quantity_ordered')
        
        minusBtn.addEventListener('click', () => {
            const counterValue = Number(counterValueElement.textContent)
            if (counterValue > 1) {
                counterValueElement.textContent = counterValue - 1
                quantityElement.textContent = counterValue - 1
                quantityOrderedInput.value = counterValueElement.textContent
                }
        })
        
        plusBtn.addEventListener('click', () => {
            let counterValue = Number(counterValueElement.textContent)
            counterValueElement.textContent = counterValue + 1
            quantityElement.textContent = counterValue + 1
            quantityOrderedInput.value = counterValueElement.textContent
        })

        //
        const productImages = document.querySelectorAll('.product-img')
        const activeImage = document.querySelector('.active-img')

        productImages.forEach(productImage => {
            productImage.addEventListener('click', () => {

                productImages.forEach(productImg => {
                    productImg.classList.remove('active')
                })

                productImage.classList.add('active')
                activeImage.setAttribute('src', productImage.getAttribute('src'))
            })
        })

        //
        const wilayasSelector = document.getElementById('client_wilaya')

        async function getWilayas() {
            const wialaysList = await fetch('{{asset("storage/wilayas.json")}}')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Cannot read \'wialays.json\' file.')
                    }   
                    return response.json()
                }).then(data => {
                    for (let i=0; i<data.length; ++i) {
                        let wilayaOption = document.createElement('option')
                        wilayaOption.setAttribute('value', data[i].id)
                        wilayaOption.textContent = data[i].ar_name
                        wilayasSelector.appendChild(wilayaOption)
                    }
                });
        }
        getWilayas()

        wilayasSelector.addEventListener('change', () => {
            const selectedWilayaId = wilayasSelector.value
        })

        //
        
    </script>
</body>
</html>