<?php

namespace App\Http\Controllers;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        return response()->json(['Products' => Products::get()]);
    }

    public function register(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required',
        ]);

        try {

            $product = new Products();
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


    public function show($id)
    {
        try {
            $product = Products::findOrFail($id);
            return response()->json(['product' => $product], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Product not found!'], 404);
        }

    }

    public function update($id, Request $request)
    {
        $product = Products::findOrFail($id);
        $product->update($request->all());
        return response()->json([
            'product' => $product,
            'message' => 'Updated product'
        ], 201);

    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return response()->json(['message'=> 'Product delete!']);
    }

    

}