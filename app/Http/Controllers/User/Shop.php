<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelProduct;
use App\ModelCart;
use Session;

class Shop extends Controller
{
    public function category(Request $request){
        $product = ModelProduct::select('productCategories','parentCategories')->groupBy('productCategories','parentCategories')->get();
        $categoriesName = $request->name;
        if ($request->sort == "" || $request->sort == null)
        {
            $sort='';
            $showCatProduct = ModelProduct::where('parentCategories',$request->parent)->where('productCategories',$request->name)->get();
        }else{
            $sort = $request->sort;
            if ($sort == "byName"){
                $showCatProduct = ModelProduct::where('parentCategories',$request->parent)->where('productCategories',$request->name)->orderBy('productName', 'ASC')->get();
            }else{
                $showCatProduct = ModelProduct::where('parentCategories',$request->parent)->where('productCategories',$request->name)->orderBy('productPrice', 'ASC')->get();
            }
        }

        if (!$request->price == "" || !$request->price == null)
        {
            $price = $request->price;

            $priceExploded = explode('-',$price);
            $min_price = explode(' ',$priceExploded[0]);
            $min_prices = $min_price[1];

            $max_price = explode(' ',$priceExploded[1]);
            $max_prices = $max_price[2];

            $showCatProduct = ModelProduct::where('parentCategories',$request->parent)->where('productCategories',$request->name)->whereBetween('productPrice', [$min_prices, $max_prices])->get();
        }

        $totalCart = 0;
        $price=0;
        
        if (Session::get("Login")){
            $cart = $this->ModelCart();
            $totalCart = count($cart);
            for ($i=0;$i<$totalCart;$i++){
                $price = $cart[$i]->productPrice+$price;
            }
        }

        if (!$request->search == "" || !$request->search == null)
        {
            $showCatProduct = ModelProduct::where('productName','LIKE','%'.$request->search.'%')->get();
            $categoriesName = $request->search;
        }
        if ($showCatProduct=="[]"){
            
            if ($request->sort == "" || $request->sort == null)
            {
                $sort='';
            }else{
                $sort = $request->sort;
                if ($sort == "byName"){
                    $showCatProduct = ModelProduct::where('productName','LIKE','%'.$request->name.'%')->orderBy('productName', 'ASC')->get();
                }else{
                    $showCatProduct = ModelProduct::where('productName','LIKE','%'.$request->name.'%')->orderBy('productPrice', 'ASC')->get();
                }
            }

            if (!$request->price == "" || !$request->price == null)
            {
                $price = $request->price;

                $priceExploded = explode('-',$price);
                $min_price = explode(' ',$priceExploded[0]);
                $min_prices = $min_price[1];

                $max_price = explode(' ',$priceExploded[1]);
                $max_prices = $max_price[2];

                $showCatProduct = ModelProduct::where('productName','LIKE','%'.$request->name.'%')->whereBetween('productPrice', [$min_prices, $max_prices])->get();
            }
        }
        return view('shop.category',['categoriesName'=>$categoriesName,'showCatProduct'=>$showCatProduct,'product'=>$product,'sort'=>$sort,'totalCart'=>$totalCart,'price'=>$price]);
    }

    public function ModelCart(){
        return ModelCart::where('id_user',Session::get('UserID'))->where('nomor_invoice',101)->join('tb_product', 'tb_product.id_product', '=', 'tb_cart.id_product')->get();
    }

    public function clear(){
        if(Session::get('UserID')){
            ModelCart::where('id_user',Session::get('UserID'))->where('nomor_invoice',101)->delete();
            return redirect('cart')->with('clearCart',"<font style='color:green;'> <u>Clear cart success!</u> </font> <br> all items have been removed");
        }else{
            return redirect('/');
        }
    }
}
