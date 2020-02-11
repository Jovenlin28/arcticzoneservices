<?php

namespace App\Http\Controllers\Admin\Maintenance;

use App\Models\PaymentMode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PaymentModeController extends Controller
{
    private $paymentMode;

    public function __construct(PaymentMode $paymentMode)
    {
        $this->paymentMode = $paymentMode;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_modes = PaymentMode::all();

        return view('admin.maintenance.payment')->with('payment_modes', $payment_modes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maintenance.payment_mode');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:payment_mode,name,'
        ]);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        } else {
            try {
                $payment = PaymentMode::create(['name' => $request['name']]);

                return [
                    'type' => 'success',
                    'title' => 'Success',
                    'message' => "Mode of payment information updated successfully",
                    'payment' => $payment
                ];
            } catch (\Exception $e) {
                return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
            }
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
        return $this->paymentMode->get_payment_mode($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment_mode = PaymentMode::find($id);

        return view('admin.maintenance.payment')->with('payment_mode', $payment_mode);
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
        $validator = Validator::make($request->all(), [
            'mode_name' => 'required|string|unique:payment_mode,name,'.$id.',id'
        ]);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        } else {
            try {
                PaymentMode::find($id)->update([
                    'name' => $request['mode_name']
                ]);

                return ['type' => 'success', 'title' => 'Success message','message' => "Mode of payment information updated successfully"];
            } catch (\Exception $e) {
                return ['type' => 'error', 'title' => 'Error message','message' => $e->getMessage()];
            }
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
        PaymentMode::findOrFail($id)->delete();

        return response()->json(['message' => 'Deleted!']);
    }
}
