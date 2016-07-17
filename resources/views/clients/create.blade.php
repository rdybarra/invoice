@extends('layouts.app')

@section('content')

  <h2>Create a new client</h2>
  <form class="placeholder-label" action="/clients" method="POST">
    @include('clients.partials.client-form')
    <button type="submit">Add Client</button>
  </form>

@endsection

