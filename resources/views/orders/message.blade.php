<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تم استلام طلبك!</title>

    <style>

        body {
            background-color: blueviolet;
        }
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 75%;
            border: 2px solid black;
            padding: 1rem;
            background-color: #c9accc;
            color: rgb(56, 44, 44);
            text-align: center;

        }
        a {
            text-decoration: none;
        }

        li {
            list-style: none;
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="container">
        <h3>لقد تم استلام طلبك! سنتصل بك في أقرب وقت</h3>
        <h4>تفاصيل الطلب:</h4>
        <ul>
            <li>
                <span>المنتج المطلوب:</span>
                <span>000000{{$order->product->name}}</span>
            </li>
            <li>
                <span>رقم الطلب:</span>
                <span>000000{{$order->id}}</span>
            </li>

            <li>
                <span>الاسم:</span>
                <span>{{$order->name_of_client}}</span>
            </li>

            <li>
                <span>رقم الهاتف:</span>
                <span>{{$order->phone_number}}</span>
            </li>

            <li>
                <span>العنوان:</span>
                <span>{{$wilayas[$order->client_wilaya - 1]->ar_name}}, {{$order->client_baladiya}}</span>
            </li>

            <li>
                <span>الكمية:</span>
                <span>{{$order->quantity_ordered}}</span>
            </li>
        </ul>
    </div>
</body>
</html>