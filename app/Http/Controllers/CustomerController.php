<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Transaction;
use Illuminate\Http\Request;
use App\Helpers\currencyTransactionHelper;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $customers = Customer::all();
            return response(['customers' => $customers]);
        }catch(\Exception $e) {
            return response([
                'message' => 'Error with the request: CustomerController->index()'
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
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        try{
            //$customer = Customer::find($customer);
            return response(['customer' => $customer]);
        }catch(\Exception $e) {
            return response([
                'message' => 'Error with the request: CustomerController->show()'
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * report delle transazioni per singolo cliente
     */
    public function showCustomerTransactions(Request $request)
    {
        try{
            $customer = Customer::findOrFail($request->id);

            $transactions = Transaction::where('customer_id', $customer->id)->get();

            foreach ($transactions as $transaction) {
                if ($transaction->currency != 'eur') {
                    $transaction->price = currencyTransactionHelper::currencyConverter($transaction->currency, $transaction->price);
                    $transaction->currency = 'eur';
                }
            }

            return response(['customer' => $customer, 'transactions' => $transactions]);
        }catch(\Exception $e) {
            return response([
                'message' => 'Error with the request: CustomerController->showCustomerTransactions()',
                'error' => $e
            ], 500);
        }
    }
}
