<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use DB;
use Validator;
use Session;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products=Product::whereNull('out')->orderBy('created_at','desc')->paginate(5);
        if(isset($request->src)){
            $src=$request->src;
            $products = Product::where('nameproduct', 'LIKE', '%' . $src . '%')
                                ->orWhere('namesupplier', 'LIKE', '%' . $src . '%')
                                ->orWhere('quantity', 'LIKE', '%' . $src . '%')
                                ->orWhere('keterangan', 'LIKE', '%' . $src . '%')
                                ->orWhere('ukuran', 'LIKE', '%' . $src . '%')
                                ->paginate(5);
        } elseif($request->src==NULL){
            $products=Product::whereNull('out')->orderBy('created_at','desc')->paginate(5);
        }
        return view('admin.index',compact('products'));
    }

    public function create()
    {
        return view('admin.Product.product');
    }

    public function store(Request $request)
    {
        $product = Product::create(request()->all());
        return redirect()->route('product.index')->with('sucMsg', 'Information has been added');
    }

    public function showvalue(product $product,request $request)
    {
        $product = Product::where('idproduct', $request->idproduct)->first();
        return view('admin.Product.value', compact('product'));
    }

    public function edit(product $product)
    {
        $product = Product::where('idproduct', $product->idproduct)->get();
        return view('admin.Product.edit', compact('product'));
    }

    public function update(Request $request, product $product)
    {
        $product = Product::where('idproduct', $product->idproduct)->first();
        $product->nameproduct = $request->nameproduct;
        $product->namesupplier = $request->namesupplier;
        $product->quantity = $request->quantity;
        $product->ukuran = $request->ukuran;
        $product->keterangan = $request->keterangan;
        $product->save();
        return redirect()->route('product.index')->with('sucMsg', 'Data berhasil diubah!');
    }

    public function updatevalue(Request $request, product $product)
    {
        $validator= Validator::make($request->all(),[
            'out' => "required|numeric|max:".$request->quantity
        ]);

        if ($validator->fails()){
            return redirect()->route('product.index')->withErrors($validator->messages());
        }
        $product = Product::where('idproduct', $request->idproduct)->first();
        $product->out = $request->out;
        $product->save();
        return redirect()->route('product.index')->with('message', 'Value berhasil ditambahkan, data telah masuk reports!');        
    }

    public function destroy(product $product)
    {
        $product=product::where('idproduct',$product->idproduct)->firstOrFail();
        $product->delete();
        return redirect()->route('product.index');
    }
}
