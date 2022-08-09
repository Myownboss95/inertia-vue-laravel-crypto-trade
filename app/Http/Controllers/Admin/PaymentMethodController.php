<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paymentMethod = PaymentMethod::latest();
        return inertia('admin.payment.index', [
            'payment' => $paymentMethod->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return inertia('admin.payment.create');
    
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
        $data = $request->validate([
            'name' => ['required'],
            'type' => ['required'],
        ]);

        PaymentMethod::create($data);

        return redirect()->route('admin.payment.index')->withSuccess('Asset created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentMethod, $id)
    {
        //
        $paymentMethod = PaymentMethod::findOrFail($id);
        return inertia('admin.payment.edit', compact('paymentMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $paymentMethod, $id)
    {
        //
        $data = $request->validate([
            'name' => ['required', Rule::unique('paymentMethod')->ignore($id)],
            'type' => ['required']
        ]);
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->update($data);
        return redirect()->route('admin.payment.index')->withSuccess('Asset updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        PaymentMethod::where('id', $id)->delete();
        return back()->withSuccess('Asset deleted');
    }
}
