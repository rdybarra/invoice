@extends('layouts.app')

@section('content')
  <section class="dashboard">

    <section class="dashboard__primary">
      <section class="outstanding-invoices">
        <h2>Outstanding Invoices</h2>
        @include('invoices.partials.invoice-list')
      </section>

      <section class="reports">
        <h2>Amount Outstanding</h2>
        ${{ number_format($outstandingInvoiceAmount, 2) }}
      </section>
    </section>

    <section class="dashboard__sidebar">
      <h2>Clients</h2>
      @include('clients.partials.client-table')
    </section>

  </section>
@endsection