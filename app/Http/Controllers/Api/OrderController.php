<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $orders = Order::where('driver_id', $request->user()->id)->get();

        return $orders->isNotEmpty()
            ? OrderResource::collection($orders)
            : response()->json([
                "message" => "No Orders Found"
            ], 200);
    }

    public function accepted(Request $request)
    {

        $order = Order::where([
            'driver_id'     => $request->user()->id,
            'status'        => 'accepted',
            'is_accepted'   => 1
        ])->get();

        if ($order) {

            return response()->json([
                "message" => "All Order Accepted",
                "data"    => OrderResource::collection($order)
            ], 200);
        } else {
            return response()->json([
                "message" => "Order Not Found"
            ], 200);
        }
    }
    public function rejected(Request $request)
    {
        $order = Order::where([
            'driver_id'     => $request->user()->id,
            'status'        => 'rejected',
            'is_accepted'   => 0
        ])->get();

        if ($order) {

            return response()->json([
                "message" => "All Rjected Order",
                "data"    => OrderResource::collection($order)
            ], 200);
        } else {
            return response()->json([
                "message" => "Error Order Not Found    Mahdy  "
            ], 200);
        }
    }

    public function update(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();

        if ($order) {
            //image upload
            $image_in_db = $order->image;
            if ($request->has('image')) {
                $path = public_path() . '/uploads/orders';
                $image = request('image');
                $image_name = time() . request('image')->getClientOriginalName();
                $image->move($path, $image_name);
                $image_in_db = '/uploads/orders/' . $image_name;
            } else {
                $image_in_db = $order->image_final_signature;
            }
            $order->update([

                'image_final_signature'  => $image_in_db,
                'status'                 => 'compleated',
            ]);
            return response()->json([
                'message'  => "Successfully Uploaded File",
            ]);
        }
    }

    public function acceptedUpdated(Request $request, $id)
    {

        $order = Order::where('driver_id', $request->user()->id)->where('id', $id)->first();
        // dd($order);
        if ($order && $request->is_accepted == 1) {
            $order->update([
                'is_accepted'   => 1,
                'status'        => 'accepted'
            ]);
            return response()->json([
                "message" => "Successfully Order Updated",
            ], 200);
        } else {
            $order->update([
                'is_accepted'   => 0,
                'status'        => 'rejected'
            ]);
            return response()->json([
                "message" => "Successfully Order Updated",
            ], 200);
        }
    }
}
