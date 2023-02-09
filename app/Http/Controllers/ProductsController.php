<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required',
        ]);

        try {

            $product = new Products;
            $product->title = $request->input('title');
            $product->description = $request->input('description');
            $product->amount = $request->input('amount');

            $product->save();

            //return successful response
            return response()->json(['product' => $product, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'Product Registration Failed!'], 409);
        }

    }
}