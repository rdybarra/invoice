@extends('layouts.app')

@section('content')
    <h2>You&rsquo;re editing the site settings</h2>

    @include('common.errors')
    <form class="placeholder-label" action="/settings" method="POST">
      {{-- Spoof the PUT method for this form --}}
      <input type="hidden" name="_method" value="PUT">

      {{ csrf_field() }}

      <div>
        <label for="user-name">Name</label>
        <input type="text" id="user-name" name="name" value="{{ $settings->name }}">
      </div>

      <div>
        <label for="pay_to">Pay To</label>
        <input type="text" id="pay_to" name="pay_to" value="{{ $settings->pay_to }}">
      </div>

      <div>
        <label for="user-email">Email</label>
        <input type="email" id="user-email" name="email" value="{{ $settings->email }}">
      </div>

      <div>
        <label for="user-phone">Phone</label>
        <input type="text" id="user-phone" name="phone" value="{{ $settings->phone }}">
      </div>

      <div>
        <label for="user-address">Address</label>
        <input type="text" id="user-address" name="address" value="{{ $settings->address }}">
      </div>

      <button type="submit">Save Changes</button>
    </form>
@endsection


