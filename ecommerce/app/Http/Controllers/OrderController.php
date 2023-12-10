<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function insertOrder(Request $req)
    {
            $user = Auth::user();
            if($user->message){
                echo json_encode([
                    'message'=>$user->message
                ]);
            }else{
                $order = new Order;
                $order->user_id=$req->userId;
                $order->name=$req->name;
                $order->total_amount=$req->total;
                $order->save();
                echo json_encode([
                    'message'=>'order was created'
                ]);
            }
    }
    public function updateOrder(Request $req){
    $user = Auth::user();
    if ($user->message) {
        return response()->json(['message' => $user->message], 403);
    } else {
        $order = Order::find($req->orderId);
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }
        // Update the order details
        $order->name = $req->name;
        $order->total_amount = $req->total;
        $order->save();
        return response()->json(['message' => 'Order updated successfully']);
    }
}
    public function deleteOrder(Request $req){
        $user=Auth::user();
        if($user->message){
            return response()->json(['message'=>$user->message],403);
        }else{
            $order=Order::find($req->orderId);
            if(!$order){
                return response()->json(['error' => 'Order not found'], 404);
            }
            $order->delete();
            return response()->json(['message' => 'Order deleted successfully']);
        }
    }
    public function getAllOrders()
    {
        $user = Auth::user();

        if ($user->message) {
            return response()->json(['message' => $user->message], 403);
        }

        // Retrieve all orders
        $orders = Order::all();

        return response()->json(['orders' => $orders]);
    }
}
