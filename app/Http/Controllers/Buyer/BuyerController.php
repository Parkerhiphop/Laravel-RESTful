<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::has('transactions')->get();

        return response(['data' => $buyers], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $buyers = Buyer::has('transactions')->findOrFail($id);
        } catch (ModelNotFoundException) {
            return response(['error' => 'Buyer not found'], 404);
        }

        return response(['data' => $buyers], 200);
    }
}
