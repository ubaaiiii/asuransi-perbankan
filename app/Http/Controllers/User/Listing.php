<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelProduct;
use App\ModelCart;
use Session;
use DB;

class Listing extends Controller
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
        
        $frozen = ModelProduct::where('parentCategories',"TRADING")->where('productCategories',"Frozen Food")->orderBy('productName', 'ASC')->get();
        $elektronik = ModelProduct::where('parentCategories',"TRADING")->where('productCategories',"Elektronik")->orderBy('productName', 'ASC')->get();
        
        
        
        return view('list',['frozen'=>$frozen,'elektronik'=>$elektronik,'product' => $product, 'totalCart'=>$totalCart,'price'=>$price]);
    }
}
