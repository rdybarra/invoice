@extends('layouts.full-width')

@section('content')
  <section class="invoice-detail">
    <section class="invoice-detail__header">
      <div class="container">
        <div class="invoice-detail__header__controls">
          <h1>{{ $invoice->name }}</h1>
          <nav>
              <a class="invoice-detail__header__controls__button" href="/invoices/{{ $invoice->id }}">Back to Invoice</a>
          </nav>
        </div>
      </div>
    </section>
    <a name="line-items"></a>
    <section class="invoice-detail__content">
      <div class="container">
        @yield('invoice-content')
      </div>
    </section>
  </section>
@endsection