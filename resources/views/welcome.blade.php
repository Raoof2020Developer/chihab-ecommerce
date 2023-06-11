<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CHIHAB SHOP</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">


    <style>
        * {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-5">قائمة المنتجات:</h1>
        <hr>
            <div class="row ">
                @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('storage/'.$product->img_one_path)}}" alt="" class="card-img-top border">
                        <div class="card-body">
                            <h3 class="card-title">{{$product->name}}</h3>
                            <p style="
                            display: -webkit-box;
                            -webkit-box-orient: vertical;
                            -webkit-line-clamp: 2;
                            overflow: hidden;" class="card-text">{{$product->description}}</p>
                            <a href="#" class="btn btn-primary">تفاصيل المنتج</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </div>

    <script>
        
    </script>
</body>
</html>