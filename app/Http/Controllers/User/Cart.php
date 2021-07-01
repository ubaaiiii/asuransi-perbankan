<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelCart;
use App\ModelProduct;
use Session;
use DB;

class Cart extends Controller
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
        $allCart = ModelCart::where('id_user',Session::get('UserID'))->where('nomor_invoice',101)->join('tb_product', 'tb_cart.id_product', '=', 'tb_product.id_product')->get();
        
        // dd($allCart);
        return view('cart',['allCart'=>$allCart,'product'=>$product, 'totalCart'=>$totalCart,'price'=>$price]);
    }
    
    public function cartUpdate(Request $request)
    {
        $quantity = $request->quantity;
        $id_cart = $request->id_cart;
        $minimumPurchase = $request->minimumPurchase;
        
        // dump($quantity);
        // dump($minimumPurchase);
        // die();
        
        if($quantity[0] < $minimumPurchase[0]){
            return redirect('cart')->with('updateCartError',"<font style='color:red;'> <u>Error update cart!</u> </font> <br> minimum purchase ".$minimumPurchase[0]);
            die();
        }else{
            for ($i=0; $i<count($quantity); $i++)
            {
                if ($quantity[$i] == '0'){
                    $woi = ModelCart::where('id_cart',$id_cart[$i])->delete();
                }else{
                    
                    $kuantitas=(int)$quantity[$i];
                    $aw = ModelCart::where('id_cart',(int)$id_cart[$i])->update(array('quantity' => (int)$quantity[$i])); 
                    
                }
            }    
        }
        
        

        return redirect('cart')->with('updateCartSuccess',"<font style='color:green;'> <u>Update cart success!</u> </font> <br> Cart has been updated");
    }

    public function deleteCart($id_cart){
        $product = ModelCart::where('id_cart',$id_cart)->join('tb_product', 'tb_cart.id_product', '=', 'tb_product.id_product')->first();
        
        $productName = $product->productName;
        $productQuantity = $product->quantity;

        ModelCart::where('id_cart',$id_cart)->delete();

        return redirect('cart')->with('deleteCartSuccess',"<font style='color:green;'> <u>Deleting product success!</u> </font> <br> ".$productQuantity." product ".$productName." succesfully removed from cart");
    }

    public function addCartPost(Request $request){
        $productName = $request->productName;

        
        if(Session::get('Login')){
            
            $checkIdProduct = ModelCart::where('id_product',$request->id_product)->where('id_user',Session::get('UserID'))->where('nomor_invoice',101)->first();

            if ($checkIdProduct){
               $tes =  ModelCart::where('id_product',$request->id_product)->where('id_user',Session::get('UserID'))->where('nomor_invoice',101)
               ->update(['quantity'=> DB::raw("quantity + ".$request->quantity)]);
            }else{
                $tb_cart = new ModelCart;
                $tb_cart->id_product = $request->id_product;
                $tb_cart->id_user = Session::get('UserID');
                $tb_cart->quantity = $request->quantity;
                $tb_cart->nomor_invoice = 101;
                $tb_cart->save();
            }

            return redirect('cart')->with('addCartSuccess',"<font style='color:green;'> <u>Adding product success!</u> </font> <br> ".$request->quantity." product ".$productName." succesfully added to cart");
        
        }else{
            return redirect('/sign')->with('needLogin',"<font style='color:red;'> <u>Login needed!</u> </font> <br> You must login before buying our product");
        }
    }  
}
