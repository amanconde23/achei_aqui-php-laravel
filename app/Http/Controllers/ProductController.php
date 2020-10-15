<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use App\UserRating;


class ProductController extends Controller
{
    /**
     * Mostra lista com produtos do usuário
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

    /**
     * Mostra um produto em detalhes
     *
     */
    public function showOneProduct(Product $product)
    {
        $user = $product->user->name;
        $userRating = UserRating::where(['avaliado' => $user])->get();
        return view('produto/verProduto', [
            'product' => $product,
            'userRating' => $userRating
        ]);
    }

    /**
     * Mostra todos os produtos cadastrados
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
        Alert::success('Sucesso!', 'Produto Cadastrado com Sucesso!');
        $userId = Auth::user()->id;
        $product = new Product();
        $product->user_id = $userId;
        $product->name = $request->name;
        $product->category = $request->category;
        $product->statusProduto = $request->statusProduto;

        if($request->hasfile('image')){
            $file = $request->file('image');            
            $product->image = $file->store('produtos');
        } else {
            $product->image = '';
        }
        
        $product->save();
        
        return redirect()->route('products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function editProductForm(Product $product)
    {
        if (Gate::denies('update', $product)) {
            return view('admin/acessoNegado');
        }

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
        Alert::success('Sucesso!', 'Produto Alterado com Sucesso!');
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category = $request->category;
        $product->statusProduto = $request->statusProduto;
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
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['status'=>'Produto excluído com sucesso!']);
    }

    /**
     * Barra de pesquisa por produtos
     * 
    */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = Product::where('name', 'LIKE', '%'.$search.'%')->get();
        if(count($products) > 0){
            return view('produto/resultadoBuscaProduto')->withDetails($products)->withQuery($search);
        }else{
            return view('produto/resultadoBuscaProduto')->withMessage('Nenhum resultado encontrado');
        }
    }
}
