<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$product->name}}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <header class="top-header">
        <div class="container">
            👇 اطلب الآن ! وادفع عند الاستلام 🙏 توصيل الى 58 ولاية 🇩🇿 
        </div>
    </header>

    <header class="main-header">
        <div class="container">
            <nav class="nav-menu">
                <button class="nav-collapse">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <ul class="nav-list">
                    <li class="nav-item">
                        Menu
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
            <h3 class="product-title">{{$product->name}}</h3>
            <div class="product-price">
                <span class="selling-price price">{{$product->price_of_selling}} د.ج</span>
                <span class="discount-price price">{{$product->price_after_discount}} د.ج</span>
            </div>
            <div class="product-images">
                <div class="main-img-wrapper">
                    <img src="{{asset('storage/'.$product->img_one_path)}}" alt="" class="active-img {{$product->price_after_discount != null ? 'discount' : ''}}" lazy>
                    <span class="discount-text">تخفيض!</span>
                    <span class="zoom-icon">
                    </span>
                </div>

                <div class="images-list">
                    <img src="{{asset('storage/'.$product->img_one_path)}}" alt="" class="product-img active" >
                    <img src="{{asset('storage/'.$product->img_two_path)}}" alt="" class="product-img">
                    <img src="{{asset('storage/'.$product->img_three_path)}}" alt="" class="product-img">
                    <img src="{{asset('storage/'.$product->img_four_path)}}" alt="" class="product-img">
                </div>
            </div>

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
                        <h3 class="order-summary-title">
                            <i class="fa-solid fa-cart-shopping"></i>
                            ملخص الطلـب
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

    <div class="order-fixed-btn">
        <button type="submit" form="orderForm">اطلب الآن</button>
    </div>
    
    <div>
        <footer class="footer">
            <div class="container">
                <p>لديك سؤال ما؟ اتصل بنا حالا.</p>
                <h3>الهاتـف: +213 792857913</h3>
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