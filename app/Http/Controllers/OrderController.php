<?php

namespace App\Http\Controllers;

use App\Models\MicroJob;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:user']);
    }

    public function order(){
        $orders = Order::all();
        $pageTitle = "All Orders";
        $breadCrumb = [
            array('title' => 'Dashboard',
                'route' => 'dashboard'),
        ];
        $title = "All Orders";

        return view('user.orders', compact('orders', 'title', 'pageTitle', 'breadCrumb'));
    }

    public function payment(Request $request){

        $job = MicroJob::find($request->job_id);
        if($job == null){
            return redirect()->back();
        }
        $title = "Make Payment";

        $job = MicroJob::find($request->job_id);
        $order = New Order();

        $order->job_id = $job->job_id;
        $order->user_id = Auth::user()->id;
        $order->amount = $job->budget;
        $order->payment = 'notPaid';
        $order->quantity = 1;
        $order->duration = $job->job_duration;
        $order->status  = 2;

        if($order->save()){
            return redirect()->route('order.show', $order->id);
        }

        return view('payment', compact('title', 'job'));
    }


    public function create(Request $request){

        $job = MicroJob::find($request->job_id);
        $order = New Order();

        $order->job_id = $job->job_id;
        $order->from_user = Auth::user()->id;
        $order->to_user = $job->user->id;
        $order->amount = $job->budget;
        $order->quantity = 1;
        $order->status  = 2;

        $order->save();
        $order_id = $order->id;

        $payment = New Payment();

        $payment->order_id = $order_id;
        $payment->payment_id = $request->payment_id;
        $payment->transaction_status = $request->payment_id;
        $order->amount = $job->budget;

        $payment->save();


        return response($request);
    }

    public function orderDetails($order){
        $order = Order::where('id', $order)->get()->first();
        if($order == null){
            return redirect()->back();
        }
        $pageTitle = "Order Details";
        $breadCrumb = [
            array('title' => 'Dashboard',
                'route' => 'dashboard'),
        ];
        $title = $order->job->job_title;
        return view('user.single-order', compact('order', 'title', 'pageTitle', 'breadCrumb'));
    }

    public function destroy($order){
        Order::destroy('id', $order);
//        Payment::where('order_id', $order)->destroy();
        return redirect()->back()->with('alert-warning', 'Order Deleted');
    }
}
