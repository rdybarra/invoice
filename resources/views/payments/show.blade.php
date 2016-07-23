@extends('payments.layout')

@section('payment-detail-header')
  @include('payments.partials.payment-detail-header')
@endsection

@section('payment-detail-content')

  <div class="payment-context">

    <div class="payment-detail-client">
      <h3>Client</h3>
      @if ($payment->client)
        <div>
          @include('clients.partials.client-list-item', ['client' => $payment->client])
        </div>
      @else
        <p>No client specified.</p>
      @endif
    </div>

    <div class="payment-detail-invoice">
      <h3>Invoice</h3>
      @if ($payment->invoice)
        <div>
          @include('invoices.partials.invoice-list-item', ['invoice' => $payment->invoice])
        </div>
      @else
        <p>No invoice was specified.</p>
      @endif
    </div>

  </div>

  <h3>Payment Method</h3>
  @if ($payment->payment_method)
    <p>{{ $payment->payment_method }}</p>
  @else
    <p>No payment method was specified.</p>
  @endif

  @if ($payment->notes)
    <h3>Notes</h3>
    <p>{{ $payment->notes }}</p>
  @endif
@endsection
