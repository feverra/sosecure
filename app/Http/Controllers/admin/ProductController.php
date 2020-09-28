<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\DeserializationClass;
use Illuminate\Support\Facades\Auth;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('id','DESC')->paginate(5);
        return view('admin.product.index',compact('products'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required|numeric',
            'in_stock' => 'required|numeric',
        ]);

       
        $products = new Product;
        $products->user_id = Auth::user()->id;
        $products->name = $request->input('name');
        $products->detail = $request->input('detail');
        $products->price = $request->input('price');
        $products->in_stock = $request->input('in_stock');
        if($request->hasFile('file')){
            $filename = time().'.'.$request->file('file')->getClientOriginalExtension();
            $products->photo = 'public/img/product/new-product/' . $filename;
            $request->file('file')->move(public_path('public/img/product/new-product'), $filename);
        }
        $products->save();
       
        return redirect()->route('products.index')
                        ->with('success','product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encrypt_decrypt = encrypt_decrypt('decrypt',$id);
        if($encrypt_decrypt === false){
            abort(403);
        }else{
            $product = Product::find($encrypt_decrypt);
            return view('admin.product.show',compact('product'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find(unserialize($id));
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $encrypt_decrypt = encrypt_decrypt('decrypt',$id);
        if($encrypt_decrypt === false){
            abort(403);
        }else{
            $this->validate($request, [
                'name' => 'required',
                'detail' => 'required',
                'price' => 'required|numeric',
                'in_stock' => 'required|numeric',
            ]);


            $product = Product::find($encrypt_decrypt);
            $product->name = $request->input('name');
            $product->detail = $request->input('detail');
            $product->price = $request->input('price');
            $product->in_stock = $request->input('in_stock');
            if($request->hasFile('file')){
                @unlink($product->photo);
                $filename = time().'.'.$request->file('file')->getClientOriginalExtension();
                $product->photo = 'public/img/product/new-product/' . $filename;
                $request->file('file')->move(public_path('public/img/product/new-product'), $filename);
            }
            $product->save();
        
            return redirect()->route('products.index')
                            ->with('success','product updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encrypt_decrypt = encrypt_decrypt('decrypt',$id);
        if($encrypt_decrypt === false){
            abort(403);
        }else{
            $product = Product::find($encrypt_decrypt);
            $product->delete();

            return redirect()->route('products.index')
                            ->with('success','product deleted successfully');
        }
    }
}

