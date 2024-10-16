<?php

namespace App\Http\Controllers\Api\v1\Client;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\Client\CategoryResource;
use App\Http\Resources\Api\v1\Client\VendorCategoryResource;
use App\Http\Resources\Api\v1\ErrorResource;
use App\Models\Category;
use App\Models\VendorCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /*
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $categories = Category::with(["data" => fn($q) => $q->where("lang_id", Lang::getSelectedLangId())->get()])->paginate(config("app.pagination"));

        return count($categories) > 0
            ? CategoryResource::collection($categories)
            : new ErrorResource(__('admin.not_found', ['attribute' => __('attributes.categories')]));
    }

    /*
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function show(Request $request, $id)
    {
        $category = Category::with([
            "data" => function ($query) use ($request) {
                $query->where("lang_id", Lang::getSelectedLangId())->get();
            },
        ])->find($id);

        return $category
            ? ($request->has("simple") && $request->simple === "true"
                ? new CategoryResource($category)
                : new CategoryResource($category->load(["products" , 'products.media'])))
            : new ErrorResource(__('admin.not_found', ['attribute' => __('attributes.category')]));
    }


    public function getCategoryByVendor(Request $request,$id)
    {
        $categories = Category::where('vendor_id',$id)->with(["data" => fn($q) => $q->where("lang_id", Lang::getSelectedLangId())->get()])->paginate(config("app.pagination"));

        return count($categories) > 0
            ? CategoryResource::collection($categories)
            : new ErrorResource(__('admin.not_found', ['attribute' => __('attributes.categories')]));
    }


}
