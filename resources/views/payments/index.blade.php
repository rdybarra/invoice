@extends('layouts.app')

@section('content')

    <section class="content-list-header">
      <a href="/payments/create" class="button">Record new Payment</a>
    </section>

    <h1>Payment info for {{ $selectedYear }}</h1>
    <form method="GET">
      <select name="year">
        @foreach($yearsWithPayments as $year)
          <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : ''}}>{{ $year }}</option>
        @endforeach
      </select>

      <input class="button" type="Submit" value="Change Year">
    </form>

    <h2>Monthly Totals</h2>
    <table>
      <tr>
        <th>Month</th>
        <th>Total</th>
      </tr>
    @foreach ($monthIndexes as $monthIndex)
      <tr>
        <td>{{ $monthIndex }}</td>
        <td>${{ isset($sumsPerMonth[$monthIndex]) ? number_format($sumsPerMonth[$monthIndex], 2) : '0.00' }}</td>
      </tr>
    @endforeach
    </table>

    <h2>Payments</h2>
    @include('payments.partials.payment-list')

@endsection