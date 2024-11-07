<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the transactions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())->get();
        return response()->json($transactions);
    }

    public function transactionsView(){
        $transactions = Transaction::where('user_id', Auth::id())->where('status', "Pending")->get();
        $title = "Sangkuriang Mart | Transactions";
        return view('transactions', compact('transactions', 'title'));
    }

    public function historyView(){
        $transactions = Transaction::where('user_id', Auth::id())
                                    ->where('status', "Paid")
                                    ->orderBy('created_at', 'desc')  // Sort by created_at in descending order
                                    ->limit(10)                     // Set a limit (adjust the number as needed)
                                    ->get();
        $title = "Sangkuriang Mart | Transactions History";
        return view('history', compact('transactions', 'title'));
    }
    
    

    /**
     * Update the specified transaction in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $data = $request->validate([
            'products' => 'sometimes|required|array',
            'products.*.product_id' => 'sometimes|required|string',
            'products.*.name' => 'sometimes|required|string',
            'products.*.quantity' => 'sometimes|required|integer|min:1',
            'products.*.price' => 'sometimes|required|numeric|min:0',
            'total_price' => 'sometimes|required|numeric|min:0',
            'status' => 'sometimes|required|string|in:Pending,InProgress,Delivered,Cancelled',
            'shipping_address' => 'sometimes|required|array',
            'shipping_address.address_line' => 'sometimes|required|string',
            'shipping_address.city' => 'sometimes|required|string',
            'shipping_address.postal_code' => 'sometimes|required|string',
        ]);

        $transaction->update($data);

        return response()->json($transaction);
    }

    /**
     * Update the status of the specified transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $transactionId
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        // Validate the status input
        $data = $request->validate([
            'id' => 'required|string',
            'status' => 'required|string|in:Pending,Paid',
        ]);

        // Find the transaction
        $transaction = Transaction::findOrFail($data['id']);

        // Check if the authenticated user is the owner of the transaction
        if ($transaction->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Update the transaction status
        $transaction->update(['status' => $data['status']]);

        return redirect('/history');
    }


    /**
     * Remove the specified transaction from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function removeTransaction($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);

        // Check if the authenticated user is the owner of the transaction
        if ($transaction->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $transaction->delete(); // Menghapus produk dari keranjang

        return redirect()->route('transaction')->with('success', 'Transaksi berhasil dibatalkan.');
    }
}