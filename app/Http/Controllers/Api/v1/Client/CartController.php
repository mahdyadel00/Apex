<?php

namespace App\Http\Controllers\Api\v1\Client;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\v1\Cart\StoreCartRequest;
use App\Http\Requests\Api\v1\Cart\UpdateQuantityRequest;
use App\Http\Resources\Api\v1\Client\CartResource;
use App\Http\Resources\Api\v1\ErrorResource;
use App\Http\Resources\Api\v1\SuccessResource;
use App\Models\Cart;
use App\Models\CartAddition;
use App\Models\Copun;
use App\Models\Product;
use App\Models\ProductAddition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    /*
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCartRequest $request): SuccessResource|ErrorResource
    {
        $product = Product::where('id',$request->product_id)->first();

        $cart = Cart::query()->where('client_id', auth()->guard('api')->user()->id)->where('product_id', $request->product_id)
            ->first();

        if ($cart) {
            $cart->update([
                'quantity' => $cart->quantity + $request->quantity,
            ]);
        }else{
            $cart = Cart::query()->create([
                'client_id'     => auth()->guard('api')->user()->id,
                'product_id'    => $request->product_id,
                'price'         => $product->price,
                'quantity'      => $request->quantity,
            ]);

            foreach ($request->additions as $addition):

                $productAddition = ProductAddition::where('id',$addition)->first();
                CartAddition::create([
                'cart_id'=> $cart->id,
                'product_addition_id'=> $addition,
                'price'=> $productAddition->price,
            ]);

            endforeach;

        }

        return SuccessResource::make(__('messages.add to cart successfully'),200);

    }

    public function controlItem(UpdateQuantityRequest $request): SuccessResource|ErrorResource
    {
        $cart = Cart::query()->find($request->cart_id);
        if ($cart) {
            if ($request->action == 'delete' || $cart->quantity == 0) {
                $cart->delete();
                return SuccessResource::make(__('messages.deleted successfully'));
            }elseif ($request->action == 'plus'){
                $cart->update([
                    'quantity' => $cart->quantity + 1
                ]);
                return SuccessResource::make(__('messages.update quantity successfully'));
            }elseif ($request->action == 'minus'){
                $cart->update([
                    'quantity' => $cart->quantity - 1
                ]);

                return SuccessResource::make(__('messages.update quantity successfully'));
            }
        }
        return new ErrorResource(__('admin.not_found', ['attribute' => __('attributes.categories')]));
    }

    public function index(Request $request)
    {
        $carts = Cart::query()->where('client_id', auth()->guard('api')->user()->id)->get();

        if (count($carts) > 0):
            $item_total = $this->calc_item_total($carts);
            $total = $this->calc_total($item_total);

            return response()->json([
                "message" => "All Carts",
                "data"    => [
                    'carts' => CartResource::collection($carts),
                    'item_total' => $item_total,
                    'total' => $total,
                ]
            ], 200);
        else:
            response()->json([
                "message" => "Cart Not Found"
            ], 200);
        endif;

    }

    private function calc_item_total($carts)
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

    private function calc_total($item_total , $coupon = 0)
    {
        $total = $item_total;
        if (isset($coupon) && $coupon > 0):
            $total =$total - $coupon;
        endif;

        return $total;

    }

    public function submit_coupon(Request $request)
    {
        $coupon = Copun::where('code',$request->code)->first();

        if ($coupon):
            $total = $this->calc_total($request->item_total,$coupon->price);
            return response()->json([
                "message" => "submit coupon successfully",
                "data"    => [
                    'total' => $total,
                ]
            ], 200);
        else:
            return response()->json([
                "message" => "Coupon Not Found"
            ], 200);
        endif;

    }

}
