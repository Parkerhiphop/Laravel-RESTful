<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::has('products')->get();

        return response(['data' => $sellers], 200);
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
            $sellers = Seller::has('products')->findOrFail($id);
        } catch (ModelNotFoundException) {
            return response(['error' => 'Seller not found'], 404);
        }

        return response(['data' => $sellers], 200);
    }
}
