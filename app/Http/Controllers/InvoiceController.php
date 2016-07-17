<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Invoice;
use App\Client;
use Illuminate\Support\Facades\Input;

class InvoiceController extends Controller
{
    public function index(Request $request) {
        $invoices = Invoice::orderBy('created_at', 'asc')->get();

        return view('invoices/index', [
            'invoices' => $invoices
        ]);
    }

    public function create(Request $request) {
        $invoice = new Invoice();
        $clients = Client::orderBy('name', 'asc')->get();

        return view('invoices/create', [
            'invoice' => $invoice,
            'clients' => $clients
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $invoice = new Invoice(Input::all());
        $invoice->save();

        $request->session()->flash('success', 'Your invoice has been created!');
        return redirect('/invoices');
    }

    public function show(Request $request, $id) {
        $invoice = Invoice::find($id);

        return view('invoices/show', [
            'invoice' => $invoice
        ]);
    }

    public function print(Request $request, $id) {
        $invoice = Invoice::find($id);

        return view('invoices/print', [
            'invoice' => $invoice
        ]);
    }

    public function edit(Request $request, $id) {
        $invoice = Invoice::find($id);
        $clients = Client::orderBy('name', 'asc')->get();

        return view('invoices/edit', [
            'invoice' => $invoice,
            'clients' => $clients
        ]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $invoice = Invoice::find($id);

        $invoice->update(Input::all());

        $request->session()->flash('success', 'Invoice &ldquo;' . $invoice->name . '&rdquo; has been updated!');
        return redirect('/invoices/' . $id);
    }

    public function destroy(Request $request, $id) {
        $invoice = Invoice::find($id);
        $invoice->delete();

        $request->session()->flash('success', 'Invoice &ldquo;' . $invoice->name . '&rdquo; has been obliterated!');
        return redirect('/invoices');
    }
}
