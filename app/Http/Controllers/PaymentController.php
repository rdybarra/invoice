<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Client;
use App\Invoice;
use App\Payment;
use Carbon\Carbon;
use DB;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $selectedYear = $request->input('year') ? $request->input('year') : date('Y');
        $payments = $this->paymentsForYear($selectedYear);
        $paymentsByMonth = $this->paymentsByMonthForYear($selectedYear);
        $sumsPerMonth = $this->getSumsPerMonth($paymentsByMonth);

        return view('payments/index', [
            'payments' => $payments,
            'yearsWithPayments' => $this->getYearsWithPayments(),
            'selectedYear' => $selectedYear,
            'monthIndexes' => $this->getMonthIndexesForYear($selectedYear),
            'paymentsByMonth' => $paymentsByMonth,
            'sumsPerMonth' => $sumsPerMonth
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

    private function paymentsForYear($year)
    {
        return Payment::orderBy('created_at', 'asc')->whereYear('date', '=', $year)->get();
    }

    private function paymentsByMonthForYear($year)
    {
        return $this->paymentsForYear($year)->groupBy(function ($item) {
            $carbonDate = new Carbon($item->date);
            return $carbonDate->format('F');
        });
    }

    private function getSumsPerMonth($collection)
    {
        $sumsPerMonth = [];

        foreach ($collection as $key => $item) {
            $sumsPerMonth[$key] = $item->sum('amount');
        }

        return $sumsPerMonth;
    }

    private function getMonthIndexesForYear($year)
    {
        $year = $year ? $year : date('Y');
        $mostRecentMonthNumber = ($year == date('Y')) ? date('n') : 12;
        $reportStartDate = $mostRecentMonthNumber . '/' . '01' . '/' .  $year;

        $monthIndexes = [];

        for ($i = 0; $i < $mostRecentMonthNumber; $i++) {
            $indexDate = new Carbon($reportStartDate . ' -' . $i . ' months');

            array_push($monthIndexes, $this->formatMonthIndex($indexDate));
        }

        return $monthIndexes;
    }

    private function formatMonthIndex(Carbon $carbonDate)
    {
        return $carbonDate->format('F');
    }

    private function getYearsWithPayments()
    {
        $years = [];

        $payments = Payment::orderBy('created_at', 'asc')->groupBy(DB::raw('YEAR(date)'))->get();
        $dates = $payments->pluck('date');

        foreach ($dates as $date) {
            $carbonDate = new Carbon($date);
            $year = $carbonDate->format('Y');

            array_push($years, $year);
        }

        return $years;
    }
}
