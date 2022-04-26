<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = [
            'orders' => Order::orderByDesc('created_at')->get(),
        ];

        return view('order.index', $data);
    }

    public function pending()
    {
        $data = [
            'orders' => Order::where('status', 1)->orWhere('payment_status', 1)->orderByDesc('created_at')->get(),
        ];

        return view('order.index', $data);
    }

    public function send_code(Request $request, Order $order)
    {
        $request->validate([
            'radio_code' => ['required', 'string', 'min:2', 'max:125'],
        ]);

        $updated = $order->update([
            'radio_code' => $request->radio_code,
            'status' => 2,
            'payment_status' => 2,
        ]);

        if($updated){
            return redirect()->route('admin.order.index')->withSuccessMessage('The radio code has been sent against order from user <strong>'.$order->name.'</strong> successfully!');
        }
        return redirect()->route('admin.order.index')->withErrorMessage('The server encountered an error while trying to add radio code to an order. Please try again.');
    }

    public function destroy(Order $order)
    {
        $deleted = $order->delete();

        if($deleted){
            return redirect()->route('admin.order.index')->withSuccessMessage('The order from user <strong>'.$order->name.'</strong> has been deleted successfully!');
        }
        return redirect()->route('admin.order.index')->withErrorMessage('The server encountered an error while trying to delete an order. Please try again.');
    }
}
