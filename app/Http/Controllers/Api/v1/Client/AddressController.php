<?php

namespace App\Http\Controllers\Api\v1\Client;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Address\StoreAddressRequest;
use App\Http\Resources\Api\v1\Client\AddressResource;
use App\Http\Resources\Api\v1\ErrorResource;
use App\Http\Resources\Api\v1\SuccessResource;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    /*
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $address = Address::query()->where('client_id',auth()->user()->id)->get();

        return count($address) > 0
            ? AddressResource::collection($address)
            : new ErrorResource(__('admin.not_found', ['attribute' => __('attributes.addresses')]));
    }


    public function store(StoreAddressRequest $request)
    {
        $address = Address::create([
            'client_id' => auth()->user()->id,
            'address' => $request->address,
            'lat' => $request->lat,
            'lon' => $request->lon,
        ]);

        return new AddressResource($address);

    }

    public function update(StoreAddressRequest $request,$id)
    {
        $address = Address::find($id);

        if ($address):
            $address->update([
                'address' => $request->address,
                'lat' => $request->lat,
                'lon' => $request->lon,
            ]);

            return new AddressResource($address);
        else:
            return new ErrorResource(__('api.address not fount'));
        endif;
    }


}
