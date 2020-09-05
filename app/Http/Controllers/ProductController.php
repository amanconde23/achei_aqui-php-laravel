<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\ProductImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where(['user_id'=>Auth::user()->id])->get();
        return view('produto/listarProdutos', [
            'products' => $products
        ]);
    }

    public function showProductsAdmin(Product $products)
    {
        $products = Product::all();
        return view('produto/listarProdutos', [
            'products' => $products
        ]);
    }

    public function showOneProduct(Product $product)
    {
        return view('produto/verProduto', [
            'product' => $product
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = Product::where('name', 'LIKE', '%'.$search.'%')->get();
        if(count($products) > 0){
            return view('resultadoBusca')->withDetails($products)->withQuery($search);
        }else{
            return view('resultadoBusca')->withMessage('Nenhum resultado encontrado');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto/criarProduto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $product = new Product();
        $product->user_id = $userId;
        $product->name = $request->name;
        $product->category = $request->category;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            
            $product->image = $file->store('produtos');
        } else {
            $product->image = '';
        }
        
        $product->save();
        
        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function showAllProducts(Product $product)
    {
        $products = Product::all();
        return view('produto/listarTodosProdutos', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function editProductForm(Product $product)
    {
        return view('produto/editarProduto', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category = $request->category;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $product->image = $file->store('produtos');
        } 
        
        $product->save();
                
        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products');
    }
    
}
