<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentDetailStoreRequest;
use App\Http\Requests\PaymentDetailUpdateRequest;
use App\PaymentDetail;
use Illuminate\Http\Request;

class PaymentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $payment_details = PaymentDetail::all();
            return response()->json(['payment_details' => $payment_details], 200);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
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
    public function store(PaymentDetailStoreRequest $request)
    {
        try {
            $payment_detail = PaymentDetail::create($request->all());
            return response()->json(['success' => "El detalle del pago {$payment_detail->id} ha sido registrado"], 201);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()], 400);
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
            $payment_detail = PaymentDetail::find($id);
            return response()->json(['payment_detail' => $payment_detail],200);
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
    public function update(PaymentDetailUpdateRequest $request, $id)
    {
        try {
            $payment_detail = PaymentDetail::find($id);
            $payment_detail->update($request->all());
            return response()->json(['success' => 'Detalle de pago ha sido actualizado', 'payment_detail' => $payment_detail], 200);
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
            $payment_detail =  PaymentDetail::find($id);
            $payment_detail->delete();
            return response()->json(['success' => "Detalle de pago {$payment_detail->id} ha sido elimino"]);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()],400);
        }
    }
}
