@extends('layouts.app')

@section('content')

    <section class="content-list-header">
      <a href="/payments/create" class="button">Record new Payment</a>
    </section>
    @include('payments.partials.payment-list')

@endsection