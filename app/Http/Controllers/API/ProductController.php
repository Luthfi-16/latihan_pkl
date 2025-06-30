<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){
        $product = Product::select('id', 'name', 'slug', 'description', 'price', 'stock')
            ->latest()->get();
        $res = [
            'success' => true,
            'message' => 'List Product',
            'data' => $product,
        ];

        return response()->json($res, 200);
    }

    public function show($id) {
        $product = Product::find($id);

        if (!$product) {
            $res = [
                'success' => false,
                'message' => 'Product Not Found',
            ];

            return response()->json($res, 404);
        }

        $res = [
            'success' => true,
            'message' => 'Product Detail',
            'data' => $product,
        ];

        return response()->json($res, 200);
    }
}
