<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use App\Helpers\currencyTransactionHelper;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $transactions = Transaction::all();

            foreach ($transactions as $transaction) {
                if ($transaction->currency != 'eur') {
                $transaction->price = currencyTransactionHelper::currencyConverter($transaction->currency, $transaction->price);
                $transaction->currency = 'eur';
                }
            }
            return response(['transactions' => $transactions]);
        }catch(\Exception $e) {
            return response([
                'message' => 'Error with the request: TransactionController->index()'
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        try{
            //return response($transaction->customer->name);
            if ($transaction->currency != 'eur') {
                $transaction->price = currencyTransactionHelper::currencyConverter($transaction->currency, $transaction->price);
                $transaction->currency = 'eur';
            }
            return response(['transaction' => $transaction]);
        }catch(\Exception $e) {
            return response([
                'message' => 'Error with the request: TransactionController->show()'
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    /*
     * @param  value from collection get()
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     * da metodo del TransactionController a Helpers
     */

//    public static function currencyConverter($currency, $amount){
//        if($currency == 'dollar') //USD
//        {
//            return number_format($amount / 1.2,2);
//        }
//        else if($currency == 'pound') //JPY
//        {
//            return number_format($amount / 1.5, 2);
//        }
//        else //EUR
//        {
//            $amount;
//        }
//
//    }

}
