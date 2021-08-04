<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order as Order;
use App\order_details as order_details;
use Session;

class OrderController extends Controller
{
    
    public function __construct(Order $order,order_details $orderDetails){
        $this->order=$order;
        $this->order_details=$orderDetails;

    }

    public function addOrder(Request $request , Order $order,order_details $orderDetails){
        $data=[];
      
        
        if(session()->get('client') != null){

            if($request->isMethod('post')){

                $order= new Order([
                    'id_client'=>$request->input('id_client'),
                    'montant'=>$request->input('total')
                ]);
    
                $saved=$order->save();

                if($saved){
                    $orders=[];
                    $id_client=$request->input('id_client');

                    $order = $this->order->getOrder($id_client);
                    $id_order=$order->get(0)->id;

                 
                    
                    foreach (session()->get('cart') as $pro ){

                        $orderDetails= new order_details([
                        'id_product'=>$pro['product']->get(0)->id_product,
                        'id_order'=>$id_order,
                        'quantity'=>$pro['qty']
                        
                    ]);
                    $orderDetails->save();
                    }                    
                    

                    $total = Session::get('total');
                    $cart = Session::get('cart');

                    Session::forget('cart', $cart);
                    Session::put('count', 0);
                    Session::put('total', $total);

                    return redirect('/')->with('success','The card is validated');
                }
    
                
    
            }

        }
        else{
            return redirect('/')->with('error','The card is not validated you must Log in first !');
          
        }

        

        return view('index',$data);

    }

}
