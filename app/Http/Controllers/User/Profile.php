<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelCart;
use App\ModelProduct;
use App\ModelInvoice;
use App\ModelUser;
use Session;
use DB;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;
use Log;

class Profile extends Controller
{
    public function ModelCart(){
        return ModelCart::where('id_user',Session::get('UserID'))->where('nomor_invoice',101)->join('tb_product', 'tb_product.id_product', '=', 'tb_cart.id_product')->get();
    }

    public function index(){
        $totalCart = 0;
        $price=0;
        $bank= [];
        $va= [];
        $transaction= [];
        
        if (Session::get("Login")){
            $cart = $this->ModelCart();
            $totalCart = count($cart);
            for ($i=0;$i<$totalCart;$i++){
                $price = $cart[$i]->productPrice+$price;
            }
        }

        $product = ModelProduct::select('productCategories','parentCategories')->groupBy('productCategories','parentCategories')->get();
        $orders = ModelInvoice::where('id_user',Session::get('UserID'))->get();
        for ($i=0;$i<count($orders);$i++){
            $url_midtrans = "https://api.sandbox.midtrans.com/v2/".$orders[$i]->nomor_invoice."/status/b2b";

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL,$url_midtrans);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                            'Authorization: '.base64_encode('SB-Mid-server-8_QHHC-6YFk5Ka84NCctvMkA:'),
                            'Accept: application/json',
                            'Content-Type: application/json'
                        ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $result = json_decode($result);
            // dd($result);
            if ($result->status_code=="200"){
                $transaction[] = $result->transactions[0]->transaction_status;
            
                $bank[] = $result->transactions[0]->va_numbers[0]->bank;
                
                $va[] = $result->transactions[0]->va_numbers[0]->va_number;
            }else{
                $transaction[] = "no transaction";
            
                $bank[] = "no bank";
                
                $va[] = "no virtual account";
            }

            
            curl_close ($ch);
        }
        
        return view('profile',['bank'=>$bank,'va'=>$va,'orders'=>$orders,'product' => $product,'totalCart'=>$totalCart,'price'=>$price,'transaction'=>$transaction]);
    }

    public function changePassword(Request $request){
        $fullName = $request->fullName;
        $email = $request->email;
        $phone = $request->phone;

        $oldPassword = md5($request->currentPassword);

        if ($request->newPassword == "" || $request->newPassword == null){
            
            ModelUser::where('id_user',$request->id_user)->update(['userFullName'=>$fullName,'userPhone'=>$phone,'userEmail'=>$email]);
            return redirect('profile')->with('profileChanged',"<font style='color:green;'> <u>Changes the profile Success!</u></font>");
        }else{
            $newPassword = md5($request->newPassword);

            $searchOld = ModelUser::where('id_user',$request->id_user)->where('userPassword',$oldPassword)->first();

            if ($searchOld){
                ModelUser::where('id_user',$request->id_user)->update(['userFullName'=>$fullName,'userPhone'=>$phone,'userEmail'=>$email,'userPassword'=>$newPassword]);
                return redirect('profile')->with('passwordChanged',"<font style='color:green;'> <u>Changes the password and profile Success!</u></font>");
            }else{
                return redirect('profile')->with('passwordFailed',"<font style='color:red;'> <u>Changes the password Failed!</u> <br> Your Current password is wrong</font>");
            }
        }
    }

    public function cancelPayment($nomor_invoice){
        $url_midtrans = "https://api.sandbox.midtrans.com/v2/".$nomor_invoice."/cancel";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$url_midtrans);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Authorization: '.base64_encode('SB-Mid-server-8_QHHC-6YFk5Ka84NCctvMkA:'),
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close ($ch);
        
        return redirect('profile')->with('cancelPayment',"<font style='color:green;'> <u>Canceling Payment for Invoice ".$nomor_invoice." Success!</u> </font>");
    }
}
