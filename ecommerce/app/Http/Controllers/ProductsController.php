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
                $Product = new Product;
                $Product->seller_id=$req->userId;
                $Product->name=$req->name;
                $Product->description=$req->description;
                $Product->save();
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
        $Product = Product::find($req->ProductId);
        if (!$Product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        // Update the Product details
        $Product->name = $req->name;
        $Product->total_amount = $req->total;
        $Product->save();
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
}
