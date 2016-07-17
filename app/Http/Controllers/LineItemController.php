<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Invoice;
use App\LineItem;
use Illuminate\Support\Facades\Input;

class LineItemController extends Controller
{
    public function index(Request $request, $id) {
        $invoice = Invoice::find($id);

        return view('line_items/manage', [
            'invoice' => $invoice
        ]);
    }

    public function store(Request $request, $id) {
        $this->validate($request, [
            'description' => 'required|max:255'
        ]);

        $lineItem = new LineItem(Input::all());
        $lineItem->save();

        $request->session()->flash('success', 'Your line item has been saved!');
        return redirect('/invoices/' . $id . '/line-items#line-items');
    }

    public function update(Request $request, $invoiceId, $id) {
        $this->validate($request, [
            'description' => 'required|max:255'
        ]);

        $lineItem = LineItem::find($id);

        $lineItem->update(Input::all());

        $request->session()->flash('success', 'The line item has been updated!');
        return redirect('/invoices/' . $invoiceId . '/line-items#line-items');
    }

    public function destroy(Request $request, $invoiceId, $id) {
        $lineItem = LineItem::find($id);
        $lineItem->delete();

        $request->session()->flash('success', 'The line item has been eliminated!');
        return redirect('/invoices/' . $invoiceId . '/line-items#line-items');
    }
}
