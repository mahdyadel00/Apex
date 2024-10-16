<?php

namespace App\Http\Controllers\Api\v1\Client;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\Client\ProductResource;
use App\Http\Resources\Api\v1\ErrorResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with(["data" => fn($q) => $q->where("lang_id", Lang::getSelectedLangId())->get()])->paginate(config("app.pagination"));

        return count($products) > 0
            ? ProductResource::collection($products)
            : new ErrorResource(__('admin.not_found', ['attribute' => __('attributes.product')]));
    }


    public function show(Request $request, $id)
    {
        $product = Product::with([
            "data" => function ($query) use ($request) {
                $query->where("lang_id", Lang::getSelectedLangId())->get();
            },
            "additions"
        ])->find($id);

        return $product
            ? ($request->has("simple") && $request->simple === "true"
                ? new ProductResource($product)
                : new ProductResource($product->load(["vendor", "media"])))
            : new ErrorResource(__('admin.not_found', ['attribute' => __('attributes.product')]));
    }
}
