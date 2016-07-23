<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Client;
use App\Invoice;


class DashboardController extends Controller
{
    public function index(Request $request) {
        $invoices = Invoice::outstanding()->orderBy('created_at', 'asc')->get();
        $clients = Client::orderBy('name', 'asc')->get();

        return view('dashboard/index', [
            'invoices' => $invoices,
            'clients' => $clients,
            'outstandingInvoiceAmount' => $this->getOutstandingInvoiceAmount()
        ]);
    }

    private function getOutstandingInvoiceAmount() {
        $outstandingAmount = 0;

        foreach(Invoice::outstanding()->get() as $invoice) {
            $outstandingAmount += $invoice->amountDue();
        }

        return $outstandingAmount;
    }
}
