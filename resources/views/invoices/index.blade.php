@extends('layouts.app')

@section('content')

    <section class="content-list-header">
      <a href="/invoices/create" class="button">Create Invoice</a>
    </section>
    @include('invoices.partials.invoice-list')

@endsection