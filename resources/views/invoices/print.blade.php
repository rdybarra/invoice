@extends('layouts/print')

@section('content')
  <div class="container--with-padding">
    <section class="invoice">
      @include('invoices.partials.invoice-header')

      <section class="invoice__line-items">
        @include('line_items.partials.list-in-invoice')
      </section>

      @include('invoices.partials.invoice-footer')
    </section>
  </div>
@endsection
