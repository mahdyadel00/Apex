<?php

namespace App\Http\Controllers\Api\v1\Client;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\Client\ProductAdditionResource;
use App\Http\Resources\Api\v1\Client\ProductResource;
use App\Http\Resources\Api\v1\ErrorResource;
use App\Models\Product;
use App\Models\ProductAddition;
use Illuminate\Http\Request;

class ProductAdditionController extends Controller
{


    public function show(Request $request, $id)
    {
        $productAddition = ProductAddition::with([
            "data" => function ($query) use ($request) {
                $query->where("lang_id", Lang::getSelectedLangId())->get();
            },
        ])->where('product_id',$id)->get();

        return  ProductAdditionResource::collection($productAddition);
    }
}
