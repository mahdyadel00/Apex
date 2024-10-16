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

class VendorCategoryController extends Controller
{

    /*
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $vendorCategories = VendorCategory::with(["data" => fn($q) => $q->where("lang_id", Lang::getSelectedLangId())->get()])->paginate(config("app.pagination"));

        return count($vendorCategories) > 0
            ? VendorCategoryResource::collection($vendorCategories)
            : new ErrorResource(__('admin.not_found', ['attribute' => __('attributes.vendor_category')]));
    }

    /*
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function show(Request $request, $id)
    {
        $vendorCategory = VendorCategory::with([
            "data" => function ($query) use ($request) {
                $query->where("lang_id", Lang::getSelectedLangId())->get();
            },
        ])->find($id);

        return $vendorCategory
            ? ($request->has("simple") && $request->simple === "true"
                ? new VendorCategoryResource($vendorCategory)
                : new VendorCategoryResource($vendorCategory->load(["vendors" , 'vendors.media' , 'vendors.categories'])))
            : new ErrorResource(__('admin.not_found', ['attribute' => __('attributes.vendor_category')]));
    }

}
