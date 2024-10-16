<?php

namespace App\Http\Controllers\Api\v1\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\Adv\AdvResource;
use App\Http\Resources\Api\v1\Client\ProductResource;
use App\Http\Resources\Api\v1\ErrorResource;
use App\Models\Adv;
use App\Models\FavouriteUser;
use App\Models\Product;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    protected function add_to_fav(Request $request)
    {
        $product = Product::query()->where('id', $request->product_id)->first();
        if ($product){
            $fav_user = FavouriteUser::query()->where('product_id', $product->id)
                ->where('client_id', auth()->user()->id)->first();
            if ($fav_user){
                $fav_user->delete();
                return ErrorResource::make(__('messages.Removed from from favourites successfully !'));
            }else{
                FavouriteUser::query()->create([
                    'product_id' => $product->id,
                    'client_id' => auth()->user()->id
                ]);
                return ErrorResource::make(__('messages.Added to favourites successfully !'));

            }
        }else {
            return ErrorResource::make(__('messages.Product not founded or an error occurred !'));

        }

    }

    protected function favourites()
    {
        $any = auth()->user()->favourites;
        if ($any){
            $product = ProductResource::collection($any);
            return $product;
        }

        return ErrorResource::make(__('messages.There is no favourites, yet!'));

    }
}
