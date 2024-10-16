<?php

namespace App\Http\Controllers\Api\v1\Client;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\v1\Order\CancelOrderRequest;
use App\Http\Requests\Api\v1\Order\OrderRateRequest;
use App\Http\Requests\Api\v1\Order\StoreOrderRequest;
use App\Http\Resources\Api\v1\Client\OrderDetailResource;
use App\Http\Resources\Api\v1\Client\OrderResource;

use App\Models\Cart;
use App\Models\CartAddition;
use App\Models\Order;
use App\Models\OrderAddition;
use App\Models\OrderProduct;
use App\Models\OrderRate;
use App\Models\Transaction;
use App\Notifications\SendPushNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;


class OrderController extends Controller
{

    public function index(Request $request)
    {
        $orders = Order::query()->where('client_id', auth()->guard('api')->user()->id)->get();

        if (count($orders) > 0):

            return response()->json([
                "message" => "All orders",
                "data"    => [
                    'orders' => OrderResource::collection($orders),
                ]
            ], 200);
        else:
            return response()->json([
                "message" => "orders Not Found"
            ], 200);
        endif;

    }

    /*
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreOrderRequest $request)
    {

        $carts = Cart::query()->where('client_id', auth()->user()->id)->get();
        $user = auth()->user();
        if ($carts->isEmpty()) {
            return response()->json([
                "message" => "Cart is empty"
            ], 400);
        }

        $total = $this->calc_total($carts);
        return $this->saveOrder($user, $request, $total, $carts);

    }


    private function calc_total($carts)
    {
        $total = [];
        for ($i = 0; $i < $carts->count(); $i++) {
            $cart_total = ($carts[$i]->price) * $carts[$i]->quantity;
            array_push($total, $cart_total);
        }
        $total = array_sum($total);


        $additionTotal = $this->calc_addition_total($carts->pluck('id'));

        $allTotal = $total + $additionTotal;

        return $allTotal;
    }

    private function calc_addition_total($cartIds)
    {
        $addition = CartAddition::whereIn('cart_id',$cartIds)->get();

        if ($addition->count() > 0):

            $total = [];
            for ($i = 0; $i < $addition->count(); $i++) {
                $addition_total = ($addition[$i]->price) * $addition[$i]->quantity;
                array_push($total, $addition_total);
            }
            $total = array_sum($total);
        endif;

        return $total ?? 0;

    }

    private function saveOrder($user, $request, $total, $carts)
    {
        $order = Order::create([
            'client_id' => $user->id,
            'order_number' => 'ord_'.rand(1111,9999),
            'order_date' => Carbon::now(),
            'discount' => $request->discount ?? 0,
            'address_id' => $request->address_id,
            'total' => $total,
            'notes'=> $request->notes,
        ]);
        foreach ($carts as $cart) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'price' => $cart->price,
                'quantity' => $cart->quantity,
            ]);
        }

        $addtions = CartAddition::whereIn('cart_id',$carts->pluck('id'))->get();

        foreach ($addtions as $addtion):
            OrderAddition::create([
                'order_id'=>$order->id,
                'product_addition_id'=>$addtion->product_addition_id,
                'price'=>$addtion->price,
                'quantity'=>$addtion->quantity,
            ]);
            endforeach;

        if ($request->payment_method == 'cod'):
            Transaction::create([
                'order_id' => $order->id,
                'status' => 'paid',
                'payment_method' => $request->payment_method,
                'total' => $request->total,
            ]);
        endif;

        Cart::query()->whereIn('id', $carts->pluck('id'))->delete();


//        Notification::send(
//            $tech,
//            new SendPushNotification($title,$message)
//        );
//
//        $notification = [
//            'device_token' => $FcmTokenArray,
//            'title' => $title,
//            'message' => $message,
//            'type'=>'technician',
//            'code'=> 1,
//        ];
//
//        $this->pushNotification($notification);

        return response()->json([
            "message" => "order created successfully",
            "data"    => [
                'order' => OrderDetailResource::make($order)
            ]
        ], 200);
    }


    public function all_order(Request $request)
    {
        $orders = Order::query()->whereNull('driver_id')->where('order_status','pending')->get();
        if (count($orders) > 0):

            return response()->json([
                "message" => "All orders",
                "data"    => [
                    'orders' => OrderResource::collection($orders),
                ]
            ], 200);
        else:
            return response()->json([
                "message" => "orders Not Found"
            ], 400);
        endif;

    }

    public function orderDetail(Request $request,$id)
    {
        $order = Order::with(['products','additions'])->where('id',$id)->first();
        if ($order):

            return response()->json([
                "message" => "order details",
                "data"    => [
                    'orders' => OrderDetailResource::make($order),
                ]
            ], 200);
        else:
            return response()->json([
                "message" => "order Not Found"
            ], 400);
        endif;

    }


    public function rating(OrderRateRequest $request)
    {

        $rate = OrderRate::create([
            'client_id' =>  auth()->guard('api')->user()->id,
            'order_id' => $request->order_id,
            'comment'=> $request->comment,
        ]);

        return response()->json([
            "message" => "rating order created successfully",
        ], 200);

    }


    public function cancel_order(CancelOrderRequest $request)
    {

        $order = Order::where('id',$request->order_id)->first();
        if ($order):

            $order->update([
                'order_status' => 'rejected',
            ]);

            return response()->json([
                "message" => "cancel order successfully",
            ], 200);
        else:
            return response()->json([
                "message" => "order Not Found"
            ], 400);
        endif;

    }


}
