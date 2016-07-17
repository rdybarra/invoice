@extends('line_items/layout')

@section('invoice-content')
  <section class="invoice--line-items-focus">
    <section class="invoice__header">
      <h1>Invoice #{{ $invoice->id }}</h1>

      <section class="invoice__header__meta">
        @if ($invoice->client)
          <div class="invoice__header__meta__item">
            <span class="invoice__header__meta__item__label">Prepared for</span>
            <span class="invoice__header__meta__item__value">{{ $invoice->client->name }}</span>
          </div>
        @endif

        @if ($invoice->description)
          <div class="invoice__header__meta__item">
            <span class="invoice__header__meta__item__label">Project</span>
            <span class="invoice__header__meta__item__value">{{ $invoice->description }}</span>
          </div>
        @endif

        <div class="invoice__header__meta__item">
          <span class="invoice__header__meta__item__label">By</span>
          <span class="invoice__header__meta__item__value">Ricky Ybarra</span>
        </div>
      </section>
    </section>

    <section class="invoice__line-items">
      @include('common.errors')
      @include('line_items.partials.edit-list-in-invoice')
    </section>

    <section class="invoice__payment-terms">
      <h3>Payment Terms</h3>
      <p>To be made payable to Richard Ybarra</p>
    </section>

    <section class="invoice__contact-info">
      <div class="invoice__contact-info__item">
        <span class="invoice__contact-info__item__label">Address</span>
        <span class="invoice__contact-info__item__value">16971 Meadowlark Ridge Rd. #1 &middot; San Diego, CA &middot; 92127</span>
      </div>

      <div class="invoice__contact-info__item">
        <span class="invoice__contact-info__item__label">Phone</span>
        <span class="invoice__contact-info__item__value">858-442-8922</span>
      </div>

      <div class="invoice__contact-info__item">
        <span class="invoice__contact-info__item__label">Email</span>
        <span class="invoice__contact-info__item__value">rdybarra@gmail.com</span>
      </div>
    </section>

  </section>

@endsection

@section('invoice-header')
  @include('invoices.partials.invoice-detail-header')

  <section class="invoice-detail__header__info">
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