@extends('theme.default')

@section('head')
<link href="{{asset('theme/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('heading')
عرض الطلبات
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table id="orders-table" class="table table-striped table-bordered text-right" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>اسم الزبون</th>
                        <th>رقم الهاتف</th>
                        <th>الولاية</th>
                        <th>البلديـة</th>
                        <th>المنتج المطلوب</th>
                        <th>الكمية المطلوبة</th>
                        <th>سعر التوصيل</th>
                        <th>خيـارات</th>
                    </tr> 
                </thead>

                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->name_of_client}}</td>
                            <td>{{$order->phone_number}}</td>
                            <td>{{$wilayas[$order->client_wilaya - 1]->ar_name}}</td>
                            <td>{{$order->client_baladiya}}</td>
                            <td>{{$order->product->name}}</td>  
                            <td>{{$order->quantity_ordered}}</td>  
                            <td>{{$order->delivery_price}} د.ج</td>  


                            <td class="d-flex gap-2">
                                <a href="{{--route('orders.edit', $order)--}}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i>
                                    تعديـل  
                                </a>
                                <form action="{{route('orders.destroy', $order)}}" class="d-inline-block" method="POST">
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
        $('#orders-table').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json"
            }
        })
    })
</script>
@endsection