<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>منتج جديد</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <style>
        img {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container border my-5 mx-auto">
        <h3 class="text-center pt-5">تعديل المنتج</h3>
        <div class="row">
            <div class="col-md-6 mx-auto p-5">
                <form action="{{route('admin.products.update', $product)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row mb-2">
                      <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="name" >اسم المنتج</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$product->name}}" />

                          @error('name')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col">
                          <div class="form-outline">
                              <label class="form-label" for="slug" >الاسم اللطيف</label>
                            <input type="text" id="slug" name="slug" class="form-control" value="{{$product->slug}}"/>
  
                            @error('slug')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>
                        </div>
                      </div>
                  
                    <!-- Text input -->
                    <div class="form-outline">
                        <div class="row mb-2">
                            <div class="col">
                                <label class="form-label" for="price_of_buying" >سعر الشراء</label>
                                <input type="decimal" id="price_of_buying" name="price_of_buying"  class="form-control" value="{{$product->price_of_buying}}"/>
                                @error('price_of_buying')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" for="price_of_selling">سعر البيع</label>
                                <input type="decimal" id="price_of_selling" name="price_of_selling" class="form-control" value="{{$product->price_of_selling}}" />

                                @error('price_of_selling')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" for="price_after_discount">السعر بعد التخفيض</label>
                                <input type="decimal" id="price_after_discount" name="price_after_discount" class="form-control" value="{{$product->price_after_discount}}"/>
                                @error('price_after_discount')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                            </div>
                        </div>
                    </div>
                  
                    <!-- Text input -->
                    <div class="form-outline mb-2">
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="quantity">الكمية المتوفرة</label>
                                <input type="text" id="quantity" name="quantity" class="form-control"  value="{{$product->quantity}}" />
                                @error('quantity')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" for="category">التصنيف</label>
                                <select id="category" class="form-control" value="{{$product->category ? $product->category : ''}}">
                                    <option disabled selected>- اختر التصنيف -</option>
                                </select>
                            </div>
                        </div>
                    </div>
                  
                    <!-- Email input -->
                    <div class="form-outline mb-2">
                        <div class="row">
                            <div class="col">
                                <label for="img_one_path">الصورة 1</label>
                                <input type="file" name="img_one_path" id="img_one_path" class="form-control " onchange="readCoverImg(this, '#product-img-1-thumb')" value="{{$product->img_one_path}}" >
                                @error('img_one_path')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="img_two_path">الصورة 2</label>
                                <input type="file" name="img_two_path" id="img_two_path" class="form-control " onchange="readCoverImg(this, '#product-img-2-thumb')" value="{{$product->img_two_path}}">
                                @error('img_two_path')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="img_three_path">الصورة 3</label>
                                <input type="file" name="img_three_path" id="img_three_path" class="form-control " onchange="readCoverImg(this, '#product-img-3-thumb')" value="{{$product->img_three_path}}">
                                @error('img_three_path')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="img_four_path">الصورة 4</label>
                                <input type="file" name="img_four_path" id="img_four_path" class="form-control " onchange="readCoverImg(this, '#product-img-4-thumb')" value="{{$product->img_four_path}}">
                                @error('img_four_path')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <img id="product-img-1-thumb" class="" src="{{asset('storage/'.$product->img_one_path)}}" alt="">
                            </div>

                            <div class="col">
                                <img id="product-img-2-thumb" class="" src="{{asset('storage/'.$product->img_two_path)}}" alt="">
                            </div>

                            <div class="col">
                                <img id="product-img-3-thumb" class="{{asset('storage/'.$product->img_three_path)}}" src="" alt="">
                            </div>

                            <div class="col">
                                <img id="product-img-4-thumb" class="" src="{{asset('storage/'.$product->img_four_path)}}" alt="">
                            </div>
                        </div>
                    </div>
                  
                    <!-- Message input -->
                    <div class="form-outline mb-2">
                        <label class="form-label" for="description">وصف المنتج</label>
                        <input type="text" name="description_text" id="description-text" class="form-control mb-2" placeholder="نص الوصف">
                            <label for="description-image">صورة الوصف</label>
                            <input type="file" name="description_image" id="description-image" class="form-control mb-2" onchange="readCoverImg(this, '#description-thumb-img')">

                            @error('description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                    </div>
                    
                    <div class="d-flex flex-row-reverse mt-3">
                        <button type="submit" class="btn btn-primary btn-block mb-4">حفظ التعديلات</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
    <script src="{!! asset('theme/vendor/jquery/jquery.min.js') !!}"></script>
  <script src="{!! asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{!! asset('theme/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{!! asset('theme/js/sb-admin-2.min.js') !!}"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        function readCoverImg(input, imgThumbId) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = e => {
                console.log(e.target.result)
                console.log(imgThumbId)
                $(imgThumbId)
                    .attr('src', e.target.result)
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>
</html>