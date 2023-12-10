<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\OrderedItems;
class OrederedItemsController extends Controller
{
    public function createOrderedItem(Request $req){
            $user = Auth::user();
            if(!$user){
                echo json_encode([
                    'message'=>'Unauthorized'
                ]);
            }else{
                $orderedItem = new OrderedItems;
                $orderedItem->order_id=$req->orderId;
                $orderedItem->product_id=$req->productId;
                $orderedItem->quantity=$req->quantity;
                $orderedItem->save();
                echo json_encode([
                    'message'=>'ordered item was created'
                ]);
            }
    }
    public function updateOrderedItem(Request $req)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $orderedItem = OrderedItems::find($req->orderId);

        if (!$orderedItem) {
            return response()->json(['error' => 'Ordered Item not found'], 404);
        }

        $orderedItem->quantity = $req->quantity;
        $orderedItem->save();

        return response()->json(['message' => 'Ordered Item updated successfully']);
    }
    public function deleteOrderedItem(Request $req)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $orderedItem = OrderedItems::find($req->orderId);

        if (!$orderedItem) {
            return response()->json(['error' => 'Ordered Item not found'], 404);
        }

        $orderedItem->delete();

        return response()->json(['message' => 'Ordered Item deleted successfully']);
    }
}
