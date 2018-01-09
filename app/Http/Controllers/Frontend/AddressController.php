<?php

namespace App\Http\Controllers\Frontend;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProvinceModel;

class AddressController extends Controller
{
    static public function addressData()
    {
        return ProvinceModel::with(['child', 'child.child'])->get()->toArray();
    }

    public function getAddressData()
    {
        return response()->json([
            'msg' => '成功',
            'data' => $this::addressData(),
        ], 200);
    }
}