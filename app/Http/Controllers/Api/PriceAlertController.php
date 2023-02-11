<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePriceAlertRequest;
use App\Models\PriceAlert;
use Illuminate\Http\Request;

class PriceAlertController extends Controller
{
    public function store(CreatePriceAlertRequest $request)
    {
        $alert = new PriceAlert();
        $alert->pair_id = $request->pair_id;
        $alert->email = $request->email;
        $alert->limit = $request->limit;
        $alert->save();

        return response()->json(['alert' => $alert], Response::HTTP_CREATED);
    }
}
