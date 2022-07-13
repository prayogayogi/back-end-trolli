<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input("id");
        $limit = $request->input("limit", 6);
        $status = $request->input("status");

        if ($id) {
            $transaction = Transaction::with(["Items.Product"])->find($id);
            if ($transaction)
                return ResponseFormatter::success(
                    $transaction,
                    "Data Transaksi berhasil diambil"
                );
            else
                return ResponseFormatter::error(
                    null,
                    "Data Transaksi tidak ada",
                    404
                );
        }

        $transaction = Transaction::with(["Items.Product"])->where("user_id", Auth::user()->id);
        if ($status) {
            $transaction->where("status", $status);
        }

        return ResponseFormatter::success(
            $transaction->paginate($limit),
            "Data List Trancation berhasil diambil"
        );
    }
}
