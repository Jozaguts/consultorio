<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentMethodStoreRequest;
use App\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $payment_methods = PaymentMethod::all();
            return response()->json(['payment_methods' => $payment_methods],200);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()],400);
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
    public function store(PaymentMethodStoreRequest $request)
    {
        try {
            $payment_method = PaymentMethod::create($request->all());
            return response()->json(['success' => 'Método de pago registrado', 'data' => $payment_method], 201);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $payment_method = Payment::find($id);
            return response()->json(['payment_method' => $payment_method],200);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()],400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $payment_method = PaymentMethod::find($id);
            $payment_method->update($request->all());
            return response()->json(['success' => "Método de pago {$payment_method->name} Actualizado"],200);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $payment_method = PaymentMethod::find($id);
            $payment_method->delete();
            return response()->json(['success' => "Método de pago {$payment_method->name} ha sido eliminado"],200);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()],400);
        }
    }
}
