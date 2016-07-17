@extends('clients.layout')

@section('client-detail-header')
    @include('clients.partials.client-detail-header')
@endsection

@section('client-detail-content')
    <h2>You&rsquo;re editing the client info.</h2>

    @include('common.errors')
    <form class="placeholder-label" action="/clients/{{ $client->id }}" method="POST">
      {{-- Spoof the PUT method for this form --}}
      <input type="hidden" name="_method" value="PUT">
      @include('clients.partials.client-form')

      <div>
        <button type="submit">Save Changes</button>
      </div>
    </form>
@endsection


