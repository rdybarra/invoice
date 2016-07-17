@extends('layouts.full-width')

@section('content')
  <section class="invoice-detail">
    <section class="invoice-detail__header">
      <div class="container">
        @yield('invoice-detail-header')
      </div>
    </section>
    <section class="invoice-detail__content">
      <div class="container">
        @yield('invoice-detail-content')
      </div>
    </section>
  </section>
@endsection