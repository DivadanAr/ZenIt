<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function show(){
        $orders = User::find(auth()->id())->orders;

        return view('myorder', compact('orders'));
    }

    public function detail($id){
        $order = Order::findOrFail($id);

        return view('order-detail', compact('order'));
    }

    public function getTable(Request $request){


        $ordersData = User::find(auth()->id())->orders;

        switch ($request->tabs) {
            case 2:
                $orders = $ordersData->where('status','!=','COMPLETE')->where('status','!=','CANCELED')->where('status','!=','REFUNDED');
                return view('table.myorderTable', compact('orders'));
                break;

            case 3:
                $orders = $ordersData->where('status','COMPLETE');
                return view('table.myorderTable', compact('orders'));
                break;
            
            case 4:
                $orders = $ordersData->where('status','CANCELED');
                return view('table.myorderTable', compact('orders'));
                break;
            
            default:
                $orders = $ordersData;
                return view('table.myorderTable', compact('orders'));
                break;
        }
    }

    public function Completed($id){
        $order = Order::find($id);

        $order->status = 'COMPLETE';

        $order->update();

        foreach($order->orderItem as $item){
            $item->status = 'COMPLETE';

            $item->update();
        }

        return redirect()->back();
    }
}
