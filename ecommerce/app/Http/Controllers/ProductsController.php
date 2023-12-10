<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
class ProductsController extends Controller
{
    public function insertProduct(Request $req)
    {
            $user = Auth::user();
            if($user->message){
                echo json_encode([
                    'message'=>$user->message
                ]);
            }else{
                $product = new Product;
                $product->seller_id=$req->userId;
                $product->name=$req->name;
                $product->description=$req->description;
                $product->price=$req->price;
                $product->save();
                echo json_encode([
                    'message'=>'Product was created'
                ]);
            }
    }
    public function updateProduct(Request $req){
    $user = Auth::user();
    if ($user->message) {
        return response()->json(['message' => $user->message], 403);
    } else {
        $product = Product::find($req->productId);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        // Update the Product details
        $product->name = $req->name;
        echo json_encode([
            'product price'=>$product->price
        ]);
        $product->price = $req->price;
        $product->save();
        return response()->json(['message' => 'Product updated successfully']);
    }
}
    public function deleteProduct(Request $req){
        $user=Auth::user();
        if($user->message){
            return response()->json(['message'=>$user->message],403);
        }else{
            $Product=Product::find($req->ProductId);
            if(!$Product){
                return response()->json(['error' => 'Product not found'], 404);
            }
            $Product->delete();
            return response()->json(['message' => 'Product deleted successfully']);
        }
    }
    public function getAllProducts(Request $req){
        $user=Auth::user();
        if($user->message){
            return response()->json(['message'=>$user->message],403);
        }else{
            $products=Product::all();
            return response()->json(['orders' => $products]);
        }
    }
}
