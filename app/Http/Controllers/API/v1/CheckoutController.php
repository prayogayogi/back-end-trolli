<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ResponseFormatter;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $transaction = Transaction::create([
            "user_id" => Auth::user()->id,
            "address" => $request->input("address"),
            "payment" => $request->input("payment"),
            "price_amount" => $request->input("price_amount"),
            "shipping_price" => $request->input("shipping_price"),
            "status" => $request->input("status")
        ]);

        foreach ($request->input("items") as $product) {
            TransactionItem::create([
                "user_id" => Auth::user()->id,
                "product_id" => $product["id"],
                "transaction_id" => $transaction->id,
                "quantity" => $product["quantity"]
            ]);
        }

        return ResponseFormatter::success($transaction->load("Items.product"), "Transaksi berhasil");
    }
}
