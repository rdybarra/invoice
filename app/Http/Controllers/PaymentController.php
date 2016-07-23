<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Client;
use App\Invoice;
use App\Payment;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $payments = Payment::orderBy('created_at', 'asc')->get();

        return view('payments/index', [
            'payments' => $payments
        ]);
    }

    public function show(Request $request, $id)
    {
        $payment = Payment::find($id);

        return view('payments/show', [
            'payment' => $payment
        ]);
    }

    public function create(Request $request)
    {
        $payment = new payment();
        $clients = Client::orderBy('name', 'asc')->get();
        $invoices = Invoice::orderBy('name', 'asc')->get();

        return view('payments/create', [
            'payment' => $payment,
            'clients' => $clients,
            'invoices' => $invoices,
            'paymentMethods' => $this->getPaymentMethods()
        ]);
    }

    public function edit(Request $request, $id)
    {
        $payment = Payment::find($id);
        $clients = Client::orderBy('name', 'asc')->get();
        $invoices = Invoice::orderBy('name', 'asc')->get();

        return view('payments/edit', [
            'payment' => $payment,
            'clients' => $clients,
            'invoices' => $invoices,
            'paymentMethods' => $this->getPaymentMethods()
        ]);
    }

    public function store(Request $request)
    {
        $payment = new payment(Input::all());
        $payment->save();

        $request->session()->flash('success', 'Your payment has been stored!');
        return redirect('/payments');
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);

        $payment->update(Input::all());

        $request->session()->flash('success', 'Your payment&rsquo;s info has been updated!');
        return redirect('/payments/' . $payment->id);
    }

    public function destroy(Request $request, $id)
    {
        $payment = Payment::find($id);
        $payment->delete();

        $request->session()->flash('success', 'That payment is gone with the wind!');
        return redirect('/payments');
    }

    private function getPaymentMethods()
    {
        return [
            'Check',
            'Venmo',
            'Gusto'
        ];
    }
}
