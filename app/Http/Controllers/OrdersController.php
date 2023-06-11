<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['show', 'message']);
    }
    public function index() {
        $orders = Order::all();
        $wilayasJson = file_get_contents('storage/wilayas.json'); 
        $wilayas = json_decode($wilayasJson);
        
        $baladiyasJson = file_get_contents('storage/baladiyas.json'); 
        $baladiyas = json_decode($baladiyasJson);

        return view('orders.index',  compact('orders', 'wilayas', 'baladiyas'));
    }

    public function message(Order $order) {
        $wilayasJson = file_get_contents('storage/wilayas.json'); 
        $wilayas = json_decode($wilayasJson);
        
        $baladiyasJson = file_get_contents('storage/baladiyas.json'); 
        $baladiyas = json_decode($baladiyasJson);
        return view('orders.message', compact('order', 'wilayas', 'baladiyas'));
    }

    public function store(Request $request, Order $order) {
        $request->validate([
            'name_of_client' => 'required|string|max:255',
            'phone_number' => 'required',
            'client_wilaya' => 'required',
            'client_baladiya' => 'required',
            'quantity_ordered' => 'required',
            'product_id' => 'required'
        ]);

        
        $newOrder = Order::create([
            'name_of_client' => $request->name_of_client,
            'phone_number' => $request->phone_number,
            'client_wilaya' => $request->client_wilaya,
            'client_baladiya' => $request->client_baladiya,
            'quantity_ordered' => $request->quantity_ordered,
            'product_id' => $request->product_id
        ]);
        

        return redirect(route('orders.message', $newOrder));
    }

    public function destroy(Order $order) {
        $order->delete();

        session()->flash('flash_message', 'تم حذف الطلب بنجاح');
        return redirect(route('admin.orders'));

    }
}
