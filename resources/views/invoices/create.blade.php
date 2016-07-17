@extends('layouts.app')

@section('content')

    <h2>First, provide some basic info.<br>Later, we&rsquo;ll add line items.</h2>
    @include('common.errors')
    <form class="placeholder-label" action="/invoices" method="POST">
      @include('invoices.partials.invoice-form')
      <div>
        <button type="submit">Create Invoice</button>
      </div>
    </form>

@endsection

