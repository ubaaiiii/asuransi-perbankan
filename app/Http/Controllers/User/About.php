<?php

namespace App\Http\Controllers\User;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ModelCart;
use App\ModelProduct;

class About extends Controller
{
    public function ModelCart(){
        return ModelCart::where('id_user',Session::get('UserID'))->where('nomor_invoice',101)->join('tb_product', 'tb_product.id_product', '=', 'tb_cart.id_product')->get();
    }
    
    public function index(){
        $totalCart = 0;
        $price=0;
        
        if (Session::get("Login")){
            $cart = $this->ModelCart();
            $totalCart = count($cart);
            for ($i=0;$i<$totalCart;$i++){
                $price = $cart[$i]->productPrice+$price;
            }
        }

        $product = ModelProduct::select('productCategories','parentCategories')->groupBy('productCategories','parentCategories')->get();
        return view('about',['product' => $product, 'totalCart'=>$totalCart,'price'=>$price]);
    }

}
