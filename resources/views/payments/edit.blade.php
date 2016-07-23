@extends('payments.layout')

@section('payment-detail-header')
    @include('payments.partials.payment-detail-header')
@endsection

@section('payment-detail-content')
    <h2>You&rsquo;re editing the payment info.</h2>

    @include('common.errors')
    <form class="placeholder-label" action="/payments/{{ $payment->id }}" method="POST">
      {{-- Spoof the PUT method for this form --}}
      <input type="hidden" name="_method" value="PUT">
      @include('payments.partials.payment-form')

      <div>
        <button type="submit">Save Changes</button>
      </div>
    </form>
@endsection


