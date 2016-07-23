@extends('layouts.full-width')

@section('content')
  <section class="payment-detail">
    <section class="payment-detail__header">
      <div class="container">
        @yield('payment-detail-header')
      </div>
    </section>
    <section class="payment-detail__content">
      <div class="container">
        @yield('payment-detail-content')
      </div>
    </section>
  </section>
@endsection