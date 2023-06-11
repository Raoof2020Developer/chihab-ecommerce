<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\Product;
use App\Traitments\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class ProductsController extends Controller
{

    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function __construct() {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'price_of_selling' => 'required|numeric',
            'price_of_buying' => 'required|numeric',
            'price_after_discount' => 'required|numeric',
            'quantity' => 'required',
            'category' => 'nullable',
            'img_one_path' => 'required',
            'img_two_path' => 'required',
            'img_three_path' => 'required',
            'img_four_path' => 'required',
            'description' => 'nullable'
        ]);

        if ($request->description != null) {
            $editorBlocks = json_decode($request->description)->blocks; 
        $header = '';
        $paragraph = '';
        $image = '';
        $list = '';
        $description = '';
        foreach($editorBlocks as $key => $block) {
            if ($block->type == 'header') {
                $header = $block->data->text;
                $description .= '<h3>' . $header .  '</h3>';
            }

            if ($block->type == 'paragraph') {
                $paragraph = $block->data->text;
                $description .= '<p>' . $paragraph .  '</p>';
            }

            if ($block->type == 'list') {
                $list = $block->data->items;
                $listItems = '';
                foreach($list as $listItem) {
                    $listItems .= '<li>'. $listItem . '</li>';
                }
                $description .= '<ul style="list-style-type: circle;">' . $listItems . '</ul>';
            }

            if  ($block->type == 'image') {
                $image = $block->data->file->url;
                $description .= "<img src=\"". asset($image) ."\" alt='' width=\"200\" height=\"auto\" />";
                
            }
        }
        }
        
        $newProduct = Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'price_of_buying' => $request->price_of_buying,
            'price_of_selling' => $request->price_of_selling,
            'price_after_discount' => $request->price_after_discount,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'img_one_path' => $this->uploadImg($request->img_one_path),
            'img_two_path' => $this->uploadImg($request->img_two_path),
            'img_three_path' => $this->uploadImg($request->img_three_path),
            'img_four_path' => $this->uploadImg($request->img_four_path),
            'description' => $description,
        ]);

        session()->flash('flash_message', 'تمت إضافة المنتج بنجاح');


        return redirect(route('admin.products.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        if ($request->has('img_one_path')) {
            Storage::disk('public')->delete($product->img_one_path);
            $product->img_one_path = $this->uploadImg($request->img_one_path);
        }

        if ($request->has('img_two_path')) {
            Storage::disk('public')->delete($product->img_two_path);
            $product->img_two_path = $this->uploadImg($request->img_two_path);
        }

        if ($request->has('img_three_path')) {
            Storage::disk('public')->delete($product->img_three_path);
            $product->img_three_path = $this->uploadImg($request->img_three_path);
        }

        if ($request->has('img_four_path')) {
            Storage::disk('public')->delete($product->img_four_path);
            $product->img_four_path = $this->uploadImg($request->img_four_path);
        }
    
        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'price_of_buying' => $request->price_of_buying,
            'price_of_selling' => $request->price_of_selling,
            'price_after_discount' => $request->price_after_discount,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'description' => '',
        ]);

        session()->flash('flash_message', 'تم تعديل المنتج بنجاح');


        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->img_one_path);
        Storage::disk('public')->delete($product->img_two_path);
        Storage::disk('public')->delete($product->img_three_path);
        Storage::disk('public')->delete($product->img_four_path);

        $product->delete();

        session()->flash('flash_message', 'تم حذف المنتج بنجاح');
        return redirect(route('admin.products.index'));
    }

}
