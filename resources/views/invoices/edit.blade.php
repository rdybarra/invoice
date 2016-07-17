@extends('invoices.layout')

@section('invoice-detail-header')
    @include('invoices.partials.invoice-detail-header')
@endsection

@section('invoice-detail-content')
    <h2>You&rsquo;re editing the basic info.</h2>

    @include('common.errors')
    <form class="placeholder-label" action="/invoices/{{ $invoice->id }}" method="POST">
      {{-- Spoof the PUT method for this form --}}
      <input type="hidden" name="_method" value="PUT">
      @include('invoices.partials.invoice-form')

      <div>
        <button type="submit">Save Changes</button>
      </div>
    </form>
@endsection
