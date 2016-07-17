@extends('invoices/layout')

@section('invoice-detail-header')
  @include('invoices.partials.invoice-detail-header')

  <section class="invoice-detail__header__info">
    @if ($invoice->client)
      <div class="invoice-detail__header__info__item">
        <span class="invoice-detail__header__info__item__label">Client</span>
        <span class="invoice-detail__header__info__item__value"><a href="/clients/{{ $invoice->client->id }}">{{ $invoice->client->name }}</a></span>
      </div>
    @endif

    <div class="invoice-detail__header__info__item">
      <span class="invoice-detail__header__info__item__label">Delivery Status</span>
      <span class="invoice-detail__header__info__item__value">{{ $invoice->delivery_status }}</span>
    </div>
    <div class="invoice-detail__header__info__item">
      <span class="invoice-detail__header__info__item__label">Payment Status</span>
      <span class="invoice-detail__header__info__item__value">{{ $invoice->payment_status }}</span>
    </div>

    @if ($invoice->payment_status == 'partial')
      <div class="invoice-detail__header__info__item">
        <span class="invoice-detail__header__info__item__label">Amount Paid</span>
        <span class="invoice-detail__header__info__item__value">${{ number_format($invoice->amount_paid, 2) }}</span>
      </div>
    @endif

  </section>
@endsection

@section('invoice-detail-content')
  <section class="invoice">
    @include('invoices.partials.invoice-header')

    <section class="invoice__line-items">
      @include('line_items.partials.list-in-invoice')
    </section>

    @include('invoices.partials.invoice-footer')
  </section>
@endsection
