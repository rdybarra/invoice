@extends('layouts.app')

@section('content')

    <section class="content-list-header">
      <a href="/clients/create" class="button">Create new Client</a>
    </section>
    @include('clients.partials.client-list')

@endsection
