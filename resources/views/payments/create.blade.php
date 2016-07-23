@extends('layouts.app')

@section('content')

  <h2>Record a new payment</h2>
  <form class="placeholder-label" action="/payments" method="POST">
    @include('payments.partials.payment-form')
    <button type="submit">Record Payment</button>
  </form>

@endsection

