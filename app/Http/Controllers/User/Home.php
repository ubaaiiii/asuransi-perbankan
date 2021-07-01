<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelProduct;
use App\ModelCart;
use App\ModelContact;
use Session;

class Home extends Controller
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

        $shopNow = ModelProduct::inRandomOrder()->first();
        $name = $shopNow->productCategories;
        $parent = $shopNow->parentCategories;
        // dd($shopNow);
        $product = ModelProduct::select('productCategories','parentCategories')->groupBy('productCategories','parentCategories')->get();
        
        return view('index',['name'=>$name,'parent'=>$parent,'product'=>$product, 'totalCart'=>$totalCart,'price'=>$price]);
    }

    public function contact(){
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
        return view('contact',['product'=>$product,'totalCart'=>$totalCart,'price'=>$price]);
    }

    public function faq(){
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
        return view('faq',['product'=>$product,'totalCart'=>$totalCart,'price'=>$price]);
    }
    
    public function documentation(){
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
        return view('documentation',['product'=>$product,'totalCart'=>$totalCart,'price'=>$price]);
    }


    public function logout(){
        Session::flush();
        return redirect ('/');
    }

    public function subscribe(Request $request){

        $tb_contact = new ModelContact;
        $tb_contact->name = $request->name;
        $tb_contact->email = $request->email;
        $tb_contact->subject = $request->subject;
        $tb_contact->message = $request->message;
        $tb_contact->save();

        return redirect('/contact')->with('successContact',"<font style='color:green;'> <u>Your message has been submitted!</u></font>");
        
    }

    public function subs(Request $request){

        $tb_contact = new ModelContact;
        $tb_contact->email = $request->EMAIL;
        $tb_contact->save();
        return redirect('/');
    }
}
