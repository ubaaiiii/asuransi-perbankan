<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelCart;
use App\ModelProduct;
use App\ModelInvoice;
use Session;
use DB;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;
use Log;

class Checkout extends Controller
{

    /**
     * Make request global.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;
 
    /**
     * Class constructor.
     *
     * @param \Illuminate\Http\Request $request User Request
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
 
        // Set midtrans configuration
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function ModelCart(){
        return ModelCart::where('id_user',Session::get('UserID'))->where('nomor_invoice',101)->join('tb_product', 'tb_product.id_product', '=', 'tb_cart.id_product')->get();
    }

    public function index()
    {
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
        $allCart = ModelCart::where('tb_cart.id_user',Session::get('UserID'))->where('nomor_invoice',101)->join('tb_product', 'tb_cart.id_product', '=', 'tb_product.id_product')
        ->join('tb_user', 'tb_cart.id_user', '=', 'tb_user.id_user')->get();
        return view('checkout',['allCart'=>$allCart,'product'=>$product, 'totalCart'=>$totalCart,'price'=>$price]);
    }

    /**
     * Submit donation.
     *
     * @return array
     */
    public function submitPayment()
    {
        $date = date("l jS \of F Y h:i:s A");

        $ModelInvoice = ModelInvoice::latest('nomor_invoice')->first();

        $nomorInvoice = $ModelInvoice->nomor_invoice + 1;
        // Save payment ke table tb_invoice
        $tb_invoice = new ModelInvoice;
        $tb_invoice->total = $this->request->amount;
        $tb_invoice->checkoutDate =  $date;
        $tb_invoice->checkoutAddress = $this->request->address;
        $tb_invoice->id_user = Session::get('UserID');
        $tb_invoice->nomor_invoice = $nomorInvoice;

        $itemDetails=[];
        $cart = $this->ModelCart();
        for ($i=0;$i<count($cart);$i++){
            $itemDetails[] = array('id' =>$nomorInvoice, 'price' =>$cart[$i]->productPrice,'quantity'=>$cart[$i]->quantity,'name' =>ucwords(str_replace('_', ' ', $cart[$i]->productName)));
        }

        // Buat transaksi ke midtrans kemudian save snap tokennya.
        $payload = [
            'transaction_details' => [
                'order_id'      => $nomorInvoice,
                'gross_amount'  => $this->request->amount,
            ],
            'customer_details' => [
                'first_name'    => Session::get('FullName'),
                'email'         => Session::get('Email'),
            ],
            'item_details' => $itemDetails
        ];
        $snapToken = Veritrans_Snap::getSnapToken($payload);
        $tb_invoice->snap_token = $snapToken;
        $tb_invoice->save();

        ModelCart::where('id_user',Session::get('UserID'))->where('nomor_invoice',101)->update(['nomor_invoice'=>$nomorInvoice]);
        // Beri response snap token
        $this->response['snap_token'] = $snapToken;
        
        return response()->json($this->response);
    }

    /**
     * Midtrans notification handler.
     *
     * @param Request $request
     * 
     * @return void
     */
    public function notificationHandler(Request $request)
    {
        $notif = new Veritrans_Notification();
        \DB::tb_invoice(function() use($notif) {
 
          $transaction = $notif->transaction_status;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
 
          if ($transaction == 'capture') {
 
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
 
              if($fraud == 'challenge') {
                // TODO set payment status in merchant's database to 'Challenge by FDS'
                // TODO merchant should decide whether this transaction is authorized or not in MAP
                // $donation->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                $donation->setPending();
              } else {
                // TODO set payment status in merchant's database to 'Success'
                // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                $donation->setSuccess();
              }
 
            }
 
          } elseif ($transaction == 'settlement') {
 
            // TODO set payment status in merchant's database to 'Settlement'
            // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
            $donation->setSuccess();
 
          } elseif($transaction == 'pending'){
 
            // TODO set payment status in merchant's database to 'Pending'
            // $donation->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
            $donation->setPending();
 
          } elseif ($transaction == 'deny') {
 
            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
            $donation->setFailed();
 
          } elseif ($transaction == 'expire') {
 
            // TODO set payment status in merchant's database to 'expire'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
            $donation->setExpired();
 
          } elseif ($transaction == 'cancel') {
 
            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
            $donation->setFailed();
 
          }
 
        });
 
        return;
    }
}
