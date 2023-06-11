@extends('theme.default')

@section('head')
<link href="{{asset('theme/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<style>

</style>
@endsection

@section('heading')
عرض المنتجات
@endsection

@section('content')
    <a href="{{route('admin.products.create')}}" role="button" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        أضف منتجا جديـدا
    </a>
    <hr />
    <div class="row">
        <div class="col-md-12 overflow-scroll">
            <table id="products-table" class="table table-striped table-bordered text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>الاسم</th>
                        <th>الوصف</th>
                        <th>الكميـة</th>
                        <th>سعر الشراء</th>
                        <th>سعر البيع</th>
                        <th>السعر بعض التخفيض</th>
                        <th>عدد الطلبات</th>
                        <th>عدد المبيعات</th>
                        <th>خيـارات</th>
                    </tr> 
                </thead>

                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="text-center">
                                <a href="{{route('products.show', $product)}}" class="text-center">
                                    <img style="width: 60%; border-radius: 50%;border:2px solid rgba(0,0,0, .1);" src="{{asset('storage/'.$product->img_one_path)}}" alt=""  width="50" height="40">
                                </a>
                            </td>  
                            <td>
                                <a href="{{route('products.show', $product)}}">{{$product->name}}</a>
                            </td>
                            <td>
                                <p style="
                                display: -webkit-box;
                                -webkit-box-orient: vertical;
                                -webkit-line-clamp: 2;
                                overflow: hidden;">{{$product->description}}</p>
                            </td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->price_of_buying}} د.ج</td>
                            <td>{{$product->price_of_selling}} د.ج</td>  
                            <td>{{$product->price_after_discount}} د.ج</td>  
                            <td>{{$product->orders_number}}</td>  
                            <td>{{$product->sold}}</td>  


                            <td class="d-flex gap-2">
                                <a href="{{route('admin.products.edit', $product)}}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i>
                                    تعديـل  
                                </a>
                                <form action="{{route('admin.products.destroy', $product)}}" class="d-inline-block" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متـأكـد؟')">
                                        <i class="fa fa-trash"></i>
                                        حـذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
<!-- Page level plugins -->
<script src="{{asset('theme/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script>
    $(document).ready(() => {
        $('#products-table').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"
            }
        })
    })
</script>
@endsection