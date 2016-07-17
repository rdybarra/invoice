@extends('layouts.full-width')

@section('content')
  <section class="client-detail">
    <section class="client-detail__header">
      <div class="container">
        @yield('client-detail-header')
      </div>
    </section>
    <section class="client-detail__content">
      <div class="container">
        @yield('client-detail-content')
      </div>
    </section>
  </section>
@endsection