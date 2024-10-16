<?php

namespace App\Http\Controllers\Api\v1\Client;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\Client\VendorCategoryResource;
use App\Http\Resources\Api\v1\Client\VendorResource;
use App\Http\Resources\Api\v1\ErrorResource;
use App\Models\Vendor;
use App\Models\VendorCategory;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    /*
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $vendors = Vendor::with([
            "data" => function ($query) use ($request) {
                $query->where("lang_id", Lang::getSelectedLangId())->get();
            },"media"
        ])->paginate(config("app.pagination"));


        return Count($vendors) > 0
            ? VendorResource::collection($vendors)
            : new ErrorResource(__('admin.not_found', ['attribute' => __('attributes.vendor')]));
    }

    /*
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function show(Request $request, $id)

    {
       $vendor_category  = Vendor::with([
            "data" => function ($query) use ($request) {
                $query->where("lang_id", Lang::getSelectedLangId())->get();
            },"media"
        ])->find($id);

        if($vendor_category){
            return $vendor_category
                ? ($request->has("simple") && $request->simple === "true"
                    ? new VendorResource($vendor_category)
                    : new VendorResource($vendor_category->load("media" , "categories" , "categories.products" , "categories.products.media" , "categories.products.additions")))
                : new ErrorResource(__('admin.not_found', ['attribute' => __('attributes.vendor')]));
        }
        else{
            return new ErrorResource(__('admin.not_found', ['attribute' => __('attributes.vendor')]));
        }
    }
}
