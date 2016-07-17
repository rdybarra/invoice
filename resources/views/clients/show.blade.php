@extends('clients.layout')

@section('client-detail-header')
  @include('clients.partials.client-detail-header')
@endsection

@section('client-detail-content')
  <section class="invoices">
    <h2>Invoices</h2>
    @include('invoices.partials.invoice-list')
  </section>
@endsection